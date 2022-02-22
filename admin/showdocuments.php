<html>
    <head>
        <style>
             table {
                counter-reset: tableCount;     
            }
           .counterCell:before {              
                content: counter(tableCount); 
                counter-increment: tableCount; 
            } 
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
    </head>
    <body>
<?php
    $user = "root"; 
    $password = ""; 
    $host = "localhost"; 
    $dbase = "mydata"; 
    $table = "myblob"; 
    $connection= mysqli_connect($host, $user, $password);
    if(!$connection){
        die ('Could not connect:' . mysqli_error($connection));
    }
    mysqli_select_db($connection,$dbase);
    $result= mysqli_query($connection, "SELECT course, module,topic,name FROM $table ORDER BY ID desc" ); 
    print "<table cellpadding='0' cellspacing='0' class='center'>\n";
    print "<tr>\n";
    print "<th>S.NO</th>";
    print "<th>Course</th>";
    print "<th>Module</th>"; 
    print "<th>Topic</th>"; 
    print "<th>Name</th>";
    print "</tr>\n"; 
    while($row = mysqli_fetch_array($result)){ 
        $files_field= $row['name'];
        $files_show= "./documents/$files_field";
        $topicvalue= $row['topic'];
        $modulevalue= $row['module'];
        $coursevalue= $row['course'];
        print "<tr>\n";
        print "<td class='counterCell'></td>";
        print "\t<td>\n"; 
        echo "<font face=arial size=4/>$coursevalue</font>";
        print "</td>\n";
        print "\t<td>\n"; 
        echo "<font face=arial size=4/>$modulevalue</font>";
        print "</td>\n"; 
        print "\t<td>\n"; 
        echo "<font face=arial size=4/>$topicvalue</font>";
        print "</td>\n";
        print "\t<td>\n"; 
        echo "<div align=center><a href='$files_show'>$files_field</a></div>";
        print "</td>\n";
        print "</tr>\n"; 
    } 
    print "</table>\n"; 
?> 
</body>
</html>