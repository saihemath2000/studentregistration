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
            }
            a:hover{
                color:blue;
            }
        </style>
   </head>
   <body>
<?php
$data=$_GET['course'];
$conn = mysqli_connect("localhost","root","","courses_db");

//$db = mysqli_select_db($conn,'course_db');
$sql = "select chapters,topics,links from `$data` ";
$result= mysqli_query($conn,$sql);
$chapters=array();
$topics=array();
$links=array();
$Edit='Edit';
$Delete='Delete';
while($row=mysqli_fetch_assoc($result)){
  array_push($chapters,$row['chapters']);
  array_push($topics,$row['topics']);
  array_push($links,$row['links']);
}
$arr = array();

# loop over all the sal array
for ($i = 0; $i < sizeof($topics); $i++) {
    $chapterName = $chapters[$i];
    if (!isset($arr[$chapterName])) {
        $arr[$chapterName] = array();
        $arr[$chapterName]['rowspan'] = 0;
    }

    $arr[$chapterName]['printed'] = "no";

    # Increment the row span value.
    $arr[$chapterName]['rowspan'] += 1;
}
//print_r($arr);

echo "<table cellspacing='0' cellpadding='0' class='center' style='background-color:#f5ef42;'>
            <tr>
                <th style='font-size:22;'>S.no.</th> 
                <th style='font-size:22;'>Modules</th>
                <th style='font-size:22;'>Topics</th>
                <th style='font-size:22;'>Edit</th>
                <th style='font-size:22;'>Delete</th>
            </tr>";

    for($i=0; $i < sizeof($topics); $i++) {
        $chapterName = $chapters[$i];
        echo "<tr>";
        if ($arr[$chapterName]['printed'] == 'no') {
            echo "<td style='font-size:18' class='counterCell' rowspan='".$arr[$chapterName]['rowspan']."'></td>";
            echo "<td style='font-size:18' rowspan='".$arr[$chapterName]['rowspan']."'>"."<b>".$chapterName."<b>"."</td>";
            $arr[$chapterName]['printed'] = 'yes';
        }
        $g = $arr[$chapterName]['rowspan'];
        $fer=$i+1;
        echo "<td style='font-size:18'><a href='".$links[$i]."' style='text-decoration:none;'>".$topics[$i]."</a></td>";
        echo "<td><a  style='text-decoration:none'; href='editmodule.php?id=$fer&coursename=$data'>".$Edit."</a></td>";
        echo "<td><a  style='text-decoration:none'; href='deletemodule.php?id=$fer&coursename=$data'>".$Delete."</a></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
</body>
</html>