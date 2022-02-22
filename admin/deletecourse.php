<?php
        $db = mysqli_connect("localhost","root","","courses_db");
        if(!$db){
            die("Connection failed: " . mysqli_connect_error());
        }
?>
<?php 
    $course = $_GET['coursename'];
    $del = mysqli_query($db,"drop table `$course`");
    if($del){
        mysqli_close($db);
        header("location:coursenames.php"); 
        exit;	
    }
    else{
        echo "Error deleting table";
    }
?>