<?php include('./functions.php'); ?>
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
        font-family: 'Pacifico', cursive;
      }
      #asterik:after{
          content:'*';
          color:red;
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
      /* .card:hover {
        box-shadow: 8px 8px 8px blue;
        transform: scale(1.2);
      } */
    </style>
  </head>
  <body>
    <nav
      class="navbar navbar-expand-lg navbar-dark bg-light"
      style="height: 80px"
    >
    <img src="./images/teach_and_learn.png" width="90px" height="90px" style="margin-top:5px;">

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                  <a href="#courses"><button class="btn1">View All Courses</button></a>
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
              </div>
            </div>
          </li>
          <li>
              <button
                id="login"
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
                id="register"
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
            id='search'
            placeholder="Search more courses"
            aria-label="Search"
            onchange="searchcourses()"
          />
          <!-- <button
            type="submit"
            class="
              btn-inverse-brand
              form-submit
              edit-submit
              btn btn-brand btn-primary
            "
            style="font-size: 20px"
            onclick="searchcourses()"
          >
            Search
          </button> -->
        </form>
      </div>
    </div>
    <br /><br />
    <h1 style="margin-left: 28px">Explore Top Courses</h1>
    <br />
    <?php 
       $path='../sidenavigationbar/courseimages/';
       $sql2="SELECT * from courseinstructors";
       $result1 = mysqli_query($db,$sql2);
       if($result1){}
       else{
         mysqli_errno($db);
       }
       if (mysqli_num_rows($result1) > 0) {
        // output data of each row
        echo '<div class="card-columns" style="height:400px;margin-left:20px;" id="courses">';
        while ($row = mysqli_fetch_assoc($result1)) {
            $mycourse=$row['title'];
            $fortitle=$row['title'];
            $fortitle=str_replace(' ', '', $fortitle);
            $fortitle=strtolower($fortitle);
            $tags[$fortitle]=$row['tags'];
            echo '<div class="card" name="hello"  id='.$fortitle.' style="width: 25rem;height:20rem;margin-left:10px;">';
            echo '<img class="card-img-top" src=' . $path . $row['image'] . ' style="height:150px;width:150px;margin-top:5px;" alt="course image">';
            echo '<div class="card-body" style="width:350px;"><h5 class="card-title">' . $row['title'] . '</h5>
                    <a href="courseinformation.php?course='.$mycourse.'" class="btn btn-primary">Goto Course</a></div></div>';
            echo '&nbsp;';
        }
        echo '</div>';
    } else {
        echo "0 results";
    }    
    ?>
    <br>
    <h2 style="margin-left:25px;">Contact Form</h2></br>
    <form method="POST" action='./contact_form.php' style='margin-left:25px;'>
      <div class="form-group col-4">
        <label for="name" id="asterik">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
      </div>
      <div class="form-group col-4">
        <label for="email" id="asterik">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group col-6">
        <label for="message" id="asterik">Message</label>
        <textarea class="form-control" id="message" rows="3" name="message" required></textarea>
      </div>
      <button name="details" type="submit" class="btn btn-primary" style='margin-left:15px;'>Submit</button>
    </form>
  </br></br>
    <?php include('./footer.php'); ?>
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
    <script>
        function searchcourses(){
            var courses=[];
            let input = document.getElementById('search').value;
            input=input.toLowerCase();
            input=input.split(' ').join('');
            input='#'+input;
            var jstags = <?php echo json_encode($tags); ?>;
            const entries = Object.entries(jstags);
            for(i=0;i<entries.length;i++){
                var temp1=entries[i][0];
                var temp2=entries[i][1];
                temp2=temp2.split(' ').join('');
                // console.log(typeof temp2);
                if(temp2.indexOf(input)!=-1){
                    courses.push(temp1);       
                }                
            }
            // console.log(courses);

            const e = document.getElementsByName('hello');
            for(i=0;i<e.length;i++){
                if(courses.includes(e[i].id)){
                    e[i].style.display="block";
                }
                else{
                    e[i].style.display="none";
                }
            }
        }
    </script>
  </body>
</html>
