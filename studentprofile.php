
<?php 
$name= $_GET['name'];
if ($name!='') {
  //
}
else{
  echo '<script>alert("Not logged in, login to continue");
        window.location.href = "homepage.php";
        </script>';
}
$path='images/';
$db = mysqli_connect('localhost', 'root', '', 'multi_login');
$sql="SELECT * from users where name='$name'";
$result = mysqli_query($db,$sql);
$result1 = mysqli_fetch_row($result);
$image = $result1[10];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student profile</title>
    <link rel="stylesheet" href="studentprofile.css">
    <link href="<?php echo $path.$image?>" rel="stylesheet">
    <style>
      html,body{
        font-size:20px;
      }
    </style>
</head>
<body>
    <div class="main-content">
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
          <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">User profile</a>
          </div>
        </nav>
        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://raw.githubusercontent.com/creativetimofficial/argon-dashboard/gh-pages/assets-old/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
          <!-- Mask -->
          <span class="mask bg-gradient-default opacity-8"></span>
          <!-- Header container -->
          <div class="container-fluid d-flex align-items-center">
            <div class="row">
              <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-white">Hello <?php echo $name; ?></h1>
                <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with courses in this platform</p>
                <a href="#!" class="btn btn-info">Edit profile</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
          <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
              <div class="card card-profile shadow">
                <div class="row justify-content-center">
                  <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                      <a href="#">
                        <img src="<?php echo $path.$image ;?>" style="width:130px;height:150px;border-radius:50%;">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-body" style="margin-top: 100px;">
                  <div class="text-center">
                    <h3><?php echo $result1[1];?><span class="font-weight-light"></span></h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-8 order-xl-1">
              <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">My account</h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form>
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-username">Username</label>
                            <input type="text" style="color:black;"  id="input-username" disabled="disabled" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $result1[1];?>">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-email">Email address</label>
                            <input type="email" style="color:black;"  disabled="disabled" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com" value="<?php echo $result1[2];?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-4">
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-8">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-address">Address</label>
                            <input id="input-address" style="color:black;"  disabled="disabled" class="form-control form-control-alternative" placeholder="Home Address" value="<?php echo $result1[6];?>" type="text">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-phone">Phone no</label>
                            <input id="input-phone" style="color:black;"  disabled="disabled" class="form-control form-control-alternative" placeholder="phone no" value="<?php echo $result1[5];?>" type="text">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-city">City</label>
                            <input type="text" style="color:black;"  id="input-city" disabled="disabled" class="form-control form-control-alternative" placeholder="City" value="<?php echo $result1[7];?>">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-city">State</label>
                            <input type="text" style="color:black;"  id="input-state" disabled="disabled" class="form-control form-control-alternative" placeholder="City" value="<?php echo $result1[8];?>">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="input-country">Zip code</label>
                            <input style="color:black;" type="number" id="input-postal-code" disabled="disabled" class="form-control form-control-alternative" placeholder="Postal code" value="<?php echo $result1[9];?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-4">
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">Courses Registered</h6>
                    <div class="pl-lg-4">
                      <div class="form-group focused">
                        <label>Courses</label>
                        <textarea rows="4"  style="color:black;" class="form-control form-control-alternative"  disabled="disabled" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
</body>
</html>