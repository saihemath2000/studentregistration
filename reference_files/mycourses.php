<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCourses</title>
</head>
<body>
    <div id="content" style="border-style:solid;border-color:red;">
        <ol>
            <li><a href="#">The Tiger</a></li>
            <a><li>The THunder</li></a>
            <a><li>The Man</li></a>
        </ol>
    <?php 
       $conn = mysqli_connect("localhost","root","","courses_db");
       if($conn->connect_error){
           die('connection failed'.$conn->connect_error);
       }
       $sql = "SELECT course_id,chapters,topics,links from java";
       $result = $conn->query($sql);
       if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                    echo "<ol>"."<li><a>". $row["chapters"] . "</a></li>"."<li><a>"
                    . $row["topics"]. "</a></li>";
            }
        } 
        else{ 
            echo "0 results"; 
        }
        echo "</div>";
        $conn->close();
    ?>
</body>
</html>