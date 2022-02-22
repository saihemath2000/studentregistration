<?php
// Create a new DOMDocument
$dom = new DOMDocument('1.0');
$root = $dom->createElement('html');
$root = $dom->appendChild($root);
$head = $dom->createElement('head');
$head = $root->appendChild($head);
$title = $dom->createElement('title','fetching my courses');
$title = $head->appendChild($title);
$style=$dom->createElement('style','li:before { content: counters(item, ".") " "; counter-increment: item }');		
$style=$head->appendChild($style);
$body = $dom->createElement('body');
$body = $root->appendChild($body);

// Create a heading element
$div = $dom->createElement('div');
$div->setAttribute('id','content');
$div->setAttribute('style','border-style:solid;border-color:red;');
$div = $body->appendChild($div);
$conn = mysqli_connect("localhost","root","","courses_db");
$conn1 = mysqli_connect("localhost","root","","courses_db");
 if($conn->connect_error){
     die('connection failed'.$conn->connect_error);
 }
 $sql = "SELECT course_id,chapters,topics,links from java group by id,chapters";
 $result = $conn->query($sql);
 if($result->num_rows > 0) {
    $ol=$dom->createElement('ol');
    $ol->setAttribute('style','counter-reset: item');
    $ol = $div->appendChild($ol);
    while($row = $result->fetch_assoc()){
        $b=$row["chapters"];
        echo $b;
        echo "<br>";
        $sql1 ="SELECT topics,links from java where chapters=$b";
        $result1 = $conn1->query($sql1);
        $li1=$dom->createElement('li');
        $li1->setAttribute('style','display: block');
        $li1 = $ol->appendChild($li1); 
        $text = $dom->createTextNode($row["chapters"]);
        $text = $li1->appendChild($text);
        if(!empty($result1) && $result1->num_rows>0){
            while($row1=$result1->fetch_assoc()){
                $ol1 = $dom->createElement('ol');
                $ol1->setAttribute('style','counter-reset: item');
                $ol1 = $li1->appendChild($ol1);
                $li2=$dom->createElement('li');
                $li2->setAttribute('style','display: block');
                $a = $dom->createElement('a');
                $a->setAttribute('href',$row1["links"]);
                $a=$li2->appendChild($a);
                $text1 = $dom->createTextNode($row["topics"]);
                $text1 = $a->appendChild($text1);
                $li2 = $ol1->appendChild($li2);
            }
        }
    }
 }

echo $dom->saveHTML();

?>
