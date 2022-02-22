<?php
        $db = mysqli_connect("localhost","root","","courses_db");
        if(!$db){
            die("Connection failed: " . mysqli_connect_error());
        }
    ?>
<?php 
    $id = $_GET['id']; 
    $course = $_GET['coursename'];
    $del = mysqli_query($db,"delete from `$course` where id = '$id'");
    if($del){
        mysqli_close($db);
        header("location:coursenames.php"); 
        exit;	
    }
else
{
    echo "Error deleting record";
}
?>