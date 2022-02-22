<html>
    <head>
        <style>
            table tr td, table tr th{
                border: black 1px solid;;
                padding: 5px;
            }
            table {
                counter-reset: tableCount;     
            }
           .counterCell:before {              
                content: counter(tableCount); 
                counter-increment: tableCount; 
            }
            .center{
              margin-left:auto;
              margin-right:auto;
              margin-top:40px;
            }  
            a:link{
                color:inherit;
                text-decoration:none;
            }
            a:hover{
                color:blue;
            }
        </style>
        <title>List of Courses </title>
    </head>
    <body>    
        <table class="center" cellspacing='0' cellpadding='0' style='background-color:#80b869'>
            <tr>
                <th>S.No</th>
                <th>Course</th>
                <th>Delete</th>
            </tr> 
        <?php
            $conn = mysqli_connect("localhost","root","","courses_db");
            $sql = "show tables";
            $Delete="Delete";
            $result = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_row($result)){
                echo "<tr>";
                echo "<td class='counterCell'></td>";
                $mian = $row[0];
                echo "<td><a href='moduleandtopics.php?course=$mian'>"."{$row[0]}"."</a></td>";
                echo "<td><a href='deletecourse.php?coursename=$mian'>".$Delete."</a></td>";   
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>

