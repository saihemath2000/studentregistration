<?php 
session_start();

// connect to databa
$db = mysqli_connect('localhost', 'root', '', 'multi_login');

// variable declaration
$name = "";
$email    = "";
$errors   = array(); 

// call the register() function if signup is clicked
if (isset($_POST['signup'])) {
	register();
}


function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name    =  e($_POST['name']);
	$email       =  e($_POST['email']);
	$pass  =  e($_POST['pass']);
	$repass  =  e($_POST['re_pass']);
	$phone  =  e($_POST['phone']);
    $address = e($_POST['Address']);
    $state= e($_POST['State']);
    $city= e($_POST['City']);
    $zip= e($_POST['Zipcode']);
	// $photo = e($_POST['photo']);
	$photoname = $_FILES['photo']['name'];
	$tmp_name = $_FILES['photo']['tmp_name'];
	// form validation: ensure that the form is correctly filled
	if(isset($photoname)) {
		$folder= '../images/';
		if (!empty($photoname)){
		   if (move_uploaded_file($tmp_name, $folder.$photoname)) {
			//    echo 'Uploaded!';
		   }
		 }
	   }
	if (empty($name)) { 
		array_push($errors, "name is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($pass)) { 
		array_push($errors, "Password is required"); 
	}
	if (empty($phone)) { 
		array_push($errors, "Phone number is required"); 
	}
	if ($pass != $repass) {
		array_push($errors, "The two passwords do not match");
	}
	if (empty($address)) { 
		array_push($errors, "Address is required"); 
	}
	if (empty($state)) { 
		array_push($errors, "State name  is required"); 
	}
	if (empty($city)) { 
		array_push($errors, "City name is required"); 
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$sql = "SELECT email FROM users WHERE email='".$email."'";
		$query = mysqli_query($db,$sql);
        if (mysqli_num_rows($query) != 0){
            echo '<script>alert("User already exists")</script>';
        }
		else{
		    $password = md5($pass);//encrypt the password before saving in the database
		    if(isset($_POST['user_type'])) {
			    $user_type = e($_POST['user_type']);
				$current_date = date("Y-m-d H:i:s");
			    $query = "INSERT INTO users (name, email, user_type, password,phoneno,Address,City,State,Zipcode,photo,created_at) 
					  VALUES('$name', '$email', '$user_type', '$password','$phone','$address','$city','$state','$zip','$photoname','$current_date')";
			    mysqli_query($db, $query);
			    $_SESSION['success']  = "New user successfully created!!";
			    header('location: ../home.php');
		    }else{
				$current_date = date("Y-m-d H:i:s");
			    $query = "INSERT INTO users (name, email, user_type, password,phoneno,Address,City,State,Zipcode,photo,created_at) 
					  VALUES('$name', '$email', 'user', '$password','$phone','$address','$city','$state','$zip','$photoname','$current_date')";
			    mysqli_query($db, $query);
			   // get id of the created user
			    $logged_in_user_id = mysqli_insert_id($db);
			    $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			    $_SESSION['success']  = "You are now logged in";
			    header('location:signin.php');				
		    }
    	}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../signin.php");
}
// call the login() function if signup is cli`cked
if (isset($_POST['signin'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $name, $errors;

	// grap form values
	$email = e($_POST['your_email']);
	$password = e($_POST['your_pass']);

	// make sure form is filled properly
	if (empty($email)) {
		array_push($errors, "email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);
        // echo $password; 
		$query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: ../../sidenavigationbar/sidebar.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
                $profilename = $_SESSION['user']['name']; 
				header('location: ../homepage.php?name='.$profilename.'');
			}
		}else {
			array_push($errors, "Wrong name/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
if (isset($_POST['reset-password'])) {
	$email = mysqli_real_escape_string($db, $_POST['email']);
	// ensure that the user exists on our system
	$query = "SELECT email FROM users WHERE email='$email'";
	$results = mysqli_query($db, $query);
  
	if (empty($email)) {
	  array_push($errors, "Your email is required");
	}else if(mysqli_num_rows($results) <= 0) {
	  array_push($errors, "Sorry, no user exists on our system with that email");
	}
	// generate a unique random token of length 100
	$token = bin2hex(random_bytes(50));
  
	if (count($errors) == 0) {
	  // store token in the password-reset database table against the user's email
	  $sql = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
	  $results = mysqli_query($db, $sql);
  
	  // Send email to user with the token in a link they can click on
	  $to = $email;
	  $subject = "Reset your password on Onlinelearning.com";
	  $msg = "Hi there, click on this <a href=\"new_pass.php?token=" . $token . "\">link</a> to reset your password on our site";
	  $msg = wordwrap($msg,70);
	  $headers = "From: saihemath2000@gmail.com";
	  if(mail($to, $subject, $msg, $headers)){

	  }
	  else{
		echo 'false';  
	  }
	  //header('location: pending.php?email=' . $email);
	}
  }
  
  // ENTER A NEW PASSWORD
  if (isset($_POST['new_password'])) {
	$new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
	$new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);
  
	// Grab to token that came from the email link
	$token = $_SESSION['token'];
	if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
	if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
	if (count($errors) == 0) {
	  // select email address of user from the password_reset table 
	  $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
	  $results = mysqli_query($db, $sql);
	  $email = mysqli_fetch_assoc($results)['email'];
  
	  if ($email) {
		$new_pass = md5($new_pass);
		$sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";
		$results = mysqli_query($db, $sql);
		header('location:signin.php');
	  }
	}
  }