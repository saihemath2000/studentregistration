<?php
 if(isset($_GET['name'])){
  $name = $_GET['name'];  
 }
 else{
   $name='';
 } 
 $db = mysqli_connect("localhost", "root", "", "course_info");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql1 = "SELECT * from courseinstructors";
$result = mysqli_query($db, $sql1);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="homepage.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


    <title>Homepage</title>
    <style>
      .btn1 {
        background-color: #ddd;
        border: none;
        color: black;
        padding: 16px 32px;
        text-align: center;
        font-size: 16px;
        margin: 4px 2px;
        transition: 0.3s;
      }

      .btn1:hover {
        background-color: #3252a8;
        color: white;
      }
      body {
        font-size: 20px;
      }
      body,
      html {
        height: 100%;
        margin: 0;
      }
      .imagediv {
        background-image: url("/registration/laptop.jpg");
        height: 50%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        text-align: center;
        color: white;
      }
      .text {
        position: absolute;
        z-index: 999;
        margin: 0 auto;
        left: 0;
        right: 50%;
        text-align: center;
        top: 40%;
      }
      .text:hover {
        color: red;
      }
      .buttondiv {
        position: absolute;
        z-index: 999;
        margin: 0 auto;
        left: 70%;
        right: 0%;
        top: 40%;
      }
      .card:hover {
        box-shadow: 8px 8px 8px blue;
        transform: scale(1.2);
      }
    </style>
  </head>
  <body>
    <nav
      class="navbar navbar-expand-lg navbar-dark bg-light"
      style="height: 80px"
    >
    <img src="./mylogo.png"/ width="90px" height="90px" style="margin-top:5px;">

      <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              style="color: black"
            >
              Courses
            </a>
            <div
              class="dropdown-menu mega-menu"
              aria-labelledby="navbarDropdown"
            >
              <div class="row">
                <div class="col-8">
                  <h1><b>Courses</b></h1>
                </div>
                <div class="col-4">
                  <a href="#allcourses"><button class="btn1">View All Courses</button></a>
                </div>
              </div>
              <hr
                style="
                  height: 2px;
                  border-width: 0;
                  color: gray;
                  background-color: gray;
                "
              />
              <div class="row">
                <div class="col-6">
                  <?php
                    $count=0;
                    while ($row = mysqli_fetch_assoc($result)) {
                      if($count==4){
                        break;
                      }
                      else{
                        echo '<p><a style="color:black" href="">'.$row['title'].'</a></p>';
                        $count=$count+1;
                      }
                    }
                  ?>
                </div>
                <!-- <div class="col-6">
                  <p><a style="color: black" href="">Java</a></p>
                  <p><a style="color: black" href="">C++</a></p>
                  <p><a style="color: black" href="">Css</a></p>
                  <p><a style="color: black" href="">Django</a></p>
                </div> -->
              </div>
            </div>
          </li>
          <li>
              <button
                type="button"
                class="btn btn-secondary pull-right"
                style="margin-left:800px;margin-top:5px;"
                data-toggle="modal" 
                data-target="#myModal1"  
              >
                Login
              </button>
            </li>
             <li>
              <button
                type="button"
                class="btn btn-danger"
                style="margin-left:17px;margin-top:5px;"
                data-toggle="modal" 
                data-target="#myModal"  
              >
                Register
              </button>
            </li>
            <li>
            <div class="modal" id="myModal">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Choose</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='./signup_and_signin_folder/signup.php'">Register as a Learner</button>
                    <button type="button" class="btn btn-success" onclick="window.location.href='../teacherregistration/teacher_register.php'">Register as a Teacher</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal" id="myModal1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Choose</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='./signup_and_signin_folder/signin.php'">Login as a Learner</button>
                    <button type="button" class="btn btn-success" onclick="window.location.href='../teacherregistration/teacher_login.php'">Login as a Teacher</button>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <div class="dropdown" style="margin-left:10px;">
            <button 
            type="button" 
            class="btn dropdown-toggle" 
            data-toggle="dropdown"
            style="width:120px;font-size:20px;">
              My Account
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="studentprofile.php?name=<?php echo $name; ?>">Profile</a>
              <a class="dropdown-item" href="./signout.php">Logout</a>
            </div>
          </div>
        </div>
        </ul>
      </div>
    </nav>
    <div class="imagediv">
      <div class="text">
        <center><h1>Start Learning with </h1></center>
      </div>
      <div class="buttondiv">
        <form class="form-inline my-2 my-lg-0">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search more courses"
            aria-label="Search"
          />
          <button
            type="submit"
            class="
              btn-inverse-brand
              form-submit
              edit-submit
              btn btn-brand btn-primary
            "
            style="font-size: 20px"
          >
            Search
          </button>
        </form>
      </div>
    </div>
    <br /><br />
    <h1 style="margin-left: 20px">Explore Top Courses</h1>
    <br />
    <div class="container-fluid" id="allcourses">
      <div class="row">
        <div class="col-3">
          <div
            class="card"
            style="
              width: 220px;
              margin-left: 30px;
              margin-top: 20px;
              height: 300px;
            "
          >
            <img
              class="card-img-top h-50"
              src="./images/c_image.png"
              width="50px"
              height="200px"
            />
            <div class="card-body px-3">
              <h5 class="card-title">Programming in C</h5>
              <a href="#" style="text-decoration: none">Course</a>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div
            class="card"
            style="
              width: 220px;
              margin-left: 20px;
              margin-top: 20px;
              height: 300px;
            "
          >
            <img
              class="card-img-top h-50"
              src="./images/java_image.jpg"
              width="50px"
              height="200px"
            />
            <div class="card-body px-3">
              <h5 class="card-title">Java</h5>
              <a href="#" style="text-decoration: none">Course</a>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div
            class="card"
            style="
              width: 220px;
              margin-left: 20px;
              margin-top: 20px;
              height: 300px;
            "
          >
            <img
              class="card-img-top h-50"
              src="./images/js_image.png"
              width="50px"
              height="200px"
            />
            <div class="card-body px-3">
              <h5 class="card-title">Javascript</h5>
              <a href="#" style="text-decoration: none">Course</a>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div
            class="card"
            style="
              width: 220px;
              margin-left: 20px;
              margin-top: 20px;
              height: 300px;
            "
          >
            <img
              class="card-img-top h-50"
              src="./images/html_image.png"
              width="50px"
              height="200px"
            />
            <div class="card-body px-3">
              <h5 class="card-title">html</h5>
              <a href="#" style="text-decoration: none">Course</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
      integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
      integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
