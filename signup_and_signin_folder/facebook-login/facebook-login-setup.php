<?php
require_once 'facebook-api-setting.php';
require_once 'facebook-profile-data.php';
 // Initialize database connection
    $user = new FB_Users();
if(!session_id()){
    session_start();
}
require_once __DIR__ .$user->FB_API_path;
// Facebook API Liberary
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
// Facebook API
$fb = new Facebook(array(
    'app_id' => $user->FB_APP_ID,
    'app_secret' => $user->FB_APP_SECRET,
    'default_graph_version' => 'v3.2',
));
//echo $FB_APP_ID;
//redirect login helper
$helper = $fb->getRedirectLoginHelper();
// accessing token
try {
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    }else{
          $accessToken = $helper->getAccessToken();
    }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}
if(isset($accessToken)){
    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        // short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        
          // OAuth 2.0 client handler
        $oAuth2Client = $fb->getOAuth2Client();
        
        // short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        
        //default access token
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    
    // Redirect the user back
    if(isset($_GET['code'])){
        header('Location: ./');
    }
    
    // profile info from Facebook
    try {
        $graphResponse = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,picture');
        $fbUser = $graphResponse->getGraphUser();
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // user back to app login page
        header("Location: ./");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    
   
    
    // Getting user's profile data
    $fbUserData = array();
    $fbUserData['oauth_uid']  = !empty($fbUser['id'])?$fbUser['id']:'';
    $fbUserData['first_name'] = !empty($fbUser['first_name'])?$fbUser['first_name']:'';
    $fbUserData['last_name']  = !empty($fbUser['last_name'])?$fbUser['last_name']:'';
    $fbUserData['email']      = !empty($fbUser['email'])?$fbUser['email']:'';
    $fbUserData['gender']     = !empty($fbUser['gender'])?$fbUser['gender']:'';
    
    
    // Insert or update user data to the database
    $fbUserData['oauth_provider'] = 'facebook';
    $userData = $user->validUser($fbUserData);
    
    // Storing user data in the session
    $_SESSION['userData'] = $userData;
    
    // Get logout url
    $logoutURL = $helper->getLogoutUrl($accessToken, $user->FB_REDIRECT_URL.'logout.php');
    
    // Render Facebook profile data
    if(empty($userData)){
        echo  '<script>alert("Error, please try again");</script>';
       
    }else{
        
    }
}else{
    // Get login url
    $permissions = ['email']; // Optional permissions
    $loginURL = $helper->getLoginUrl($user->FB_REDIRECT_URL, $permissions);
    
    // Render Facebook login button
    //<li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
    $fbLoginButton = '<li><a href="'.htmlspecialchars($loginURL).'"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>'; 
    //$fbLoginButton = '<a href="'.htmlspecialchars($loginURL).'" class="fb-login">Login with Facebook</a>';
}
?>