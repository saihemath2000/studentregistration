<?php
  $conn = mysqli_connect('localhost', 'root', '');
  $dbcreate  = mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS courses_db");
  if (!$dbcreate) {
    echo "Database not created ";
  }
  
  mysqli_select_db($conn, 'courses_db');


   $courses = array();
   $coursseid = $_GET['courseid'];
   //echo $coursseid;
  $noofchapters = $_GET['noofchapters'];
  for($i=1;$i<=$noofchapters;$i++){
    $chapter=$_GET['chapter'.$i];   
    $nooftopics = $_GET['nooftopics'.$i];
    $topicarray=array();
    for($j=1;$j<=$nooftopics;$j++){
      $topic = $_GET['topic'.$i.'_'.$j];
      $link = $_GET['link'.$i.'_'.$j];
      $topicarray[$topic]=$link;
    }
    $courses[$chapter]=$topicarray; 
  }

 // sql to create table
$sql = "CREATE TABLE IF NOT EXISTS `$coursseid` (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  course_id VARCHAR(100) NOT NULL,
  chapters VARCHAR(100) NOT NULL,
  topics VARCHAR(100),
  links VARCHAR(100) 
  )";
  
  if (!($conn->query($sql) === TRUE)) {
    echo "Error creating table: " . $conn->error;
  }

  foreach($courses as $x=>$y){
    foreach($y as $a=>$b){
      $sql = "INSERT INTO `$coursseid` (id, course_id, chapters, topics, links)
      VALUES (NUll, '$coursseid', '$x', '$a', '$b')";
      
      if (!(mysqli_query($conn, $sql))){
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  }

  echo "Course Registered Successfully !!";

?>