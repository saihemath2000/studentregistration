<html>
    <head>
        <style>
            form {
              width: 300px;
              margin: 0 auto; 
            }
            input[type=submit]:hover {
              background-color: #45a049;
              padding-top:10px;
            }
            legend{
             font-size:22px;
            }
            label{
             font-size:20px;
            }
            fieldset{
                padding-top:20px;
                padding: 0 2em 2em 4em;
                border:2px solid red;
                border-radius:8px;
            }
            input{
                font-size:18px;
            }
        </style>
        <title>
            Wanna Edit Course Details
        </title>
    </head>
    <body>
    <?php
        $db = mysqli_connect("localhost","root","","courses_db");
        if(!$db){
            die("Connection failed: " . mysqli_connect_error());
        }
    ?>
    <?php
        $id = $_GET['id']; 
        $course = $_GET['coursename'];
        $qry = mysqli_query($db,"select * from `$course` where id='$id'"); 
        $data = mysqli_fetch_array($qry);
        if(isset($_POST['update'])){
            $chapters = $_POST['chapters'];
            $topics = $_POST['topics'];
            $links = $_POST['links'];
            $edit = mysqli_query($db,"update `$course` set chapters='$chapters', topics='$topics', links='$links' where id='$id'");
            if($edit){
                mysqli_close($db);
                header("location:coursenames.php"); 
                exit;
            }
            else{
                echo mysqli_error($db);
            }    	
        }
    ?>

    <form method="POST">    
      <fieldset>
        <legend><b>Update Data</b></legend></br>
        <label for="chapters" style="padding: 1.5em 0 0 0;"><b>Module</b></label></br>
        <input type="text" name="chapters" value="<?php echo $data['chapters'] ?>" placeholder="Enter new module " Required></br></br>
        <label for="topics"><b>Topic</b></label></br>
        <input type="text" name="topics" value="<?php echo $data['topics'] ?>" placeholder="Enter new topic " Required></br></br>
        <label for="links"><b>Link</b></label></br>
        <input type="text" name="links" value="<?php echo $data['links'] ?>" placeholder="Enter new link" Required></br></br>
        <input type="submit" name="update" value="Update" style='background-color:green;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);border-radius:12px;';>
    </fieldset>  
    </form>
</body>
</html>