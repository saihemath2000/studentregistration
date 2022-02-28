<?php include('../functions.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        input{
            font-size:20px;
        }
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style> 
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
      <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main" style="background:#484a4a;padding:100px 0;">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="signup.php" enctype="multipart/form-data">
                            <?php echo display_error(); ?>
                            <div class="form-group">
                                <label for="name"><i style="font-size:22px;" class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text"  class="form-control" name="name" id="name" placeholder="Your Name" value="<?php echo $name; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i  style="font-size:22px;" class="zmdi zmdi-email"></i></label>
                                <input type="email"  class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $email; ?>" required/>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                <label for="pass"><i class="fa fa-lock" style="font-size:24px"></i></label>
                                <input 
                                    type="password" 
                                    name="pass" 
                                    id="pass"
                                    class="passwordclass" 
                                    placeholder="Password"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                                    required >
                                <span onmouseover="mouseoverPass();" onmouseout="mouseoutPass();" class="iconify" data-icon="zmdi:eye" style="margin-left:280px;"></span></input>   
</div>    
                            </div>
                            

                            <div class="form-group">
                                <label for="re-pass"><i style="font-size:22px;" class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password"  class="form-control" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <label for="phoneno"><i style="font-size:22px;" class="zmdi zmdi-phone"></i></label>
                                <input type="text"
                                       name="phone" 
                                       class="form-control"
                                       id="phone" 
                                       placeholder="enter your phone no" 
                                       pattern="[0-9]{10}"
                                       title="A phone no number must be 10 digits without any spaces and special characters" required/>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress" style="font-size:22px;"><i class="zmdi zmdi-home"></i></label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="Address" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputCity" style="font-size:22px;"><i class="zmdi zmdi-city"></i></label>
                                  <input type="text" class="form-control" name="City" id="inputCity" placeholder="city" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label style="font-size:22px;"><i class="zmdi zmdi-city"></i></label>
                                    <input type="text" class="form-control" name="State" id="inputCity" placeholder="state" required>
                                </div>
                                <div class="form-group col-md-2">
                                   <label style="font-size:22px;"><i class="fa fa-map-pin" aria-hidden="true"></i></label> 
                                  <input type="text" class="form-control" name="Zipcode" id="inputZip" placeholder="enter zip">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="photo" style="font-size:18px;">Upload your photo</label></br></br></br>
                                <input type="file" class="form-control-file" name="photo" id="customFile" style="font-size:16px;border-bottom:none;"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                            <div class="signup-image">
                                <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                                <a href="signin.php" class="signup-image-link">I am already member</a>
                            </div>
            </div>
        </section>
    </div>
    <div id="message">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>
    <!-- <div id="message1">
        <h3>Phone number must be:</h3>
        <p id="digits" class="invalid">A <b> plus symbol followed by 10 digits without space and special characters</b></p>
    </div>  -->

<script>
    function mouseoverPass(obj){
        var obj = document.getElementById('pass');
        obj.type = "text";
    }
    function mouseoutPass(obj) {
        var obj = document.getElementById('pass');
        obj.type = "password";
    }
    const togglePassword = document.querySelector('span.iconify');
    const password = document.querySelector('input.passwordclass');
    togglePassword.addEventListener('click', function (e){
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('zmdi:eye');
    });
    var myInput = document.getElementById("pass");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var myphone = document.getElementById("phone");
    var digits = document.getElementById("digits");
    // myInput.onfocus = function() {
    //     document.getElementById("message").style.display = "block";
    // }
    // myInput.onblur = function() {
    //     document.getElementById("message").style.display = "none";
    // }
    myInput.onkeyup = function() {
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {  
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        }else{
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {  
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        }else{
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {  
            number.classList.remove("invalid");
            number.classList.add("valid");
        }else{
            number.classList.remove("valid");
            number.classList.add("invalid");
        }
        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        }else{
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
    myphone.onkeyup = function(){
        var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
        if(myphone.value.match(phoneno)){
            digits.classList.remove("invalid");
            digits.classList.add("valid");
        }else{
            digits.classList.remove("valid");
            digits.classList.add("invalid");
        }
    }
</script>


    <!-- JS -->
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>