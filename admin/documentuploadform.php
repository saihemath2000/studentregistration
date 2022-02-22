<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document upload </title>
    <style>
      input[type=text]{
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
      }
      input[type=submit] {
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
      }

      input[type=submit]:hover {
          background-color: #45a049;
      }
      form {
         width: 300px;
         margin: 0 auto; 
      } 
      legend{
        font-size:22px;
      }
      label{
        font-size:20px;
      }
      input{
       font-size:18px;
     }
      fieldset{
        padding-left:30px;
        padding-right:30px;
        padding-bottom:30px;
      } 
    </style>
</head>
<body>
   <form method="POST" enctype="multipart/form-data" action="#file">
      <fieldset style='width:40px; margin-top:50px;'> 
        <legend><b>Upload Documents</b></legend></br>
        <label for="course"><b>Course</b></label></br>
        <input type="text" name="course" placeholder="enter course name"></input></br></br>  
        <label for="module"><b>Module</b></label></br> 
        <input type="text" name="module" placeholder="enter module"></input></br></br>
        <label for="topic"><b>Topic</b></label></br>  
        <input type="text" name="topic" placeholder="enter topic"></input></br></br>  
        <input type="file" name="file"/></br></br>
        <input type="submit" name="submit" value="Upload"/>
    </fieldset> 
   </form> 
</body>
<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php 
    $course = $_POST['course'];
    $module = $_POST['module'];
    $topic = $_POST['topic'];
    $name= $_FILES['file']['name'];
    $tmp_name= $_FILES['file']['tmp_name'];
    $submitbutton= $_POST['submit'];
    $position= strpos($name, "."); 
    $fileextension= substr($name, $position + 1); 
    $fileextension= strtolower($fileextension);
    if(isset($name)) {
     $path= './documents/';
     if (!empty($name)){
        if (move_uploaded_file($tmp_name, $path.$name)) {
            echo 'Uploaded!';
        }
      }
    }
?>
<?php
  $course = $_POST['course'];
  $module = $_POST['module'];
  $topic = $_POST['topic'];
  $name= $_FILES['file']['name'];
  $user = "root"; 
  $password = ""; 
  $host = "localhost"; 
  $dbase = "mydata"; 
  $table = "myblob"; 

  $connection= mysqli_connect($host, $user, $password);
  if(!$connection){
    die ('Could not connect:' . mysql_error());
  }
  mysqli_select_db($connection,$dbase);
  if(!empty($topic)){
    mysqli_query($connection,"INSERT INTO $table (course,module,topic,name) VALUES ('$course','$module','$topic','$name')");
  }
  mysqli_close($connection);
?>

