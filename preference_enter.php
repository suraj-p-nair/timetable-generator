
<?php 
include_once('connection.php');
session_start();
$sub_name = [];
$lab_name = [];
$current_user = $_SESSION['$current_user'];
$sub_tables = ['sub1', 'sub2', 'sub3', 'sub4', 'sub5', 'sub6'];

foreach ($sub_tables as $table) {
    $qry = "SELECT * FROM $table";
    $sub = $conn->query($qry);
    while ($rows = $sub->fetch(PDO::FETCH_ASSOC)) {
        if($rows['type']!='LAB'){$sub_name[] = $rows['sub_name'];}
        else{$lab_name[] = $rows['sub_name'];}
    }
}

$subjects = [];
$labs = [];
$query = "SELECT * FROM faculty_preference";
$current_user_num = $_SESSION['$current_user_num'];
$faculty_count = $_SESSION['$faculty_count'];
$count = 0;
$lcount = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ans = $_POST['sub'];
    $lab = $_POST['lab'];
    for($x=$current_user_num-1;$x<sizeof($ans);$x+=$faculty_count){
        if($ans[$x]==1){
            array_push($subjects,((int)($x/$faculty_count)));
            $count++;
        }
    }
    for($x=$current_user_num-1;$x<sizeof($lab);$x+=$faculty_count){
        if($lab[$x]==1){
            array_push($labs,((int)($x/$faculty_count)));
            $lcount++;
        }
    }
    for($x=$current_user_num-1;$x<sizeof($lab);$x+=$faculty_count){
        if($lab[$x]==2){
            array_push($labs,((int)($x/$faculty_count)));
            $lcount++;
        }
    }
    for($x=$current_user_num-1;$x<sizeof($ans);$x+=$faculty_count){
        if($ans[$x]==2){
            array_push($subjects,((int)($x/$faculty_count)));
            $count++;
        }
    }
    for($x=$current_user_num-1;$x<sizeof($ans);$x+=$faculty_count){
        if($ans[$x]==3){
            array_push($subjects,((int)($x/$faculty_count)));
            $count++;
        }
    }
    for($x=$current_user_num-1;$x<sizeof($ans);$x+=$faculty_count){
        if($ans[$x]==4){
            array_push($subjects,((int)($x/$faculty_count)));
            $count++;
        }
    }
    for($x=0;$x<sizeof($labs);$x++){
        echo $labs[$x];
        echo $lab_name[$labs[$x]];
        echo nl2br("\n");
    }
    while($count<4){
        array_push($subjects,'');
        $count++;
    }
    while($lcount<2){
        array_push($labs,'');
        $lcount++;
    }
    $sub1 = $subjects[0];
    $sub2 = $subjects[1];
    $sub3 = $subjects[2];
    $sub4 = $subjects[3];
    $lab1 = $labs[0];
    $lab2 = $labs[1];

    if (!empty($subjects)) {
        $updateQuery = "UPDATE faculty_preference SET p1 = ?, p2 = ?, p3 = ?, p4 = ?, l1 = ?, l2 = ?  WHERE name = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->execute([
            $sub_name[$subjects[0]] ?? '',
            $sub_name[$subjects[1]] ?? '',
            $sub_name[$subjects[2]] ?? '',
            $sub_name[$subjects[3]] ?? '',
            $lab_name[$labs[0]] ?? '',
            $lab_name[$labs[1]] ?? '',
            $current_user
        ]);
    } else {
        $updateQuery = "UPDATE faculty_preference SET p1 = '', p2 = '', p3 = '', p4 = '',l1 = '', l2 = '' WHERE name = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->execute([$current_user]);
    }
    
    header("location: preference_add.php");
    die();
}
?>