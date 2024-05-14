<?php 
include_once('connection.php');
session_start();
$current_user = $_SESSION['$current_user'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sub = $_POST['sub'];
    $name = [];
    $sql1 = " SELECT * FROM faculty_preference";
    $faculty = $conn->prepare($sql1); 
    $faculty->execute();

    while($rows = $faculty->fetch(PDO::FETCH_ASSOC)){
        array_push($name,$rows['name']);
    }
   
    for($x=0;$x<sizeof($sub);$x+=6){
        $sub1 = $sub[$x];
        $sub2 = $sub[$x+1];
        $sub3 = $sub[$x+2];
        $sub4 = $sub[$x+3];
        $lab1 = $sub[$x+4];
        $lab2 = $sub[$x+5];
        $id = (int)(($x+1)/6);
        $fac_name = $name[$id];
        echo $sub2;
        echo nl2br("\n");
        $qry = $conn->prepare("UPDATE faculty_preference_final set sub1 = '$sub1',sub2 = '$sub2',sub3 = '$sub3',sub4 = '$sub4', l1='$lab1',l2='$lab2' where name = '$fac_name'");
        $qry->execute();

        $qry = $conn->prepare("UPDATE faculty_preference set p1 = '$sub1',p2 = '$sub2',p3 = '$sub3',p4 = '$sub4', l1='$lab1',l2='$lab2' where name = '$fac_name'");
        $qry->execute();

        header("location: admin_preference.php");
        
    }
}
?>