<?php 
 $db = mysqli_connect("localhost", "root", "", "multi_login");
 if (!$db) {
     die("Connection failed: " . mysqli_connect_error());
 }
 if(isset($_POST['details'])){
     $mymail='saihemath2000@gmail.com';
     $name = $_POST['name'];
     $email = $_POST['email'];
     $message = $_POST['message'];
     $sql="INSERT into contact_form (mymail,`name`,email,`message`) VALUES ('$mymail','$name','$email','$message')";
     $result=mysqli_query($db,$sql);
     if($result){
         header('location:./homepage.php'); 
     }   
     else{
         echo mysqli_errno($db);
     } 
 }
?>