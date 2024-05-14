<?php
include_once("connection.php");

    $subjects = $conn->prepare("SELECT * FROM sub1");
    $subjects->execute();

    $tt  = $conn->prepare("SELECT * FROM tt1");
    $tt->execute();

    $labs=[];
    $subs=[];
    $tt1=[];
    $thc=[];
    $tutc=[];
    $labc=[];
    $row = array("monday","tuesday","wednesday","thursday","friday");
    $col = array("hr1","hr2","hr3","hr4","hr5","hr6");

    $labx=0;
    $laby=0;

    while($rows=$subjects->fetch(PDO::FETCH_ASSOC)){
        if($rows['type']=='LAB'){
            array_push($labs,$rows['sub_name']);
        }
        else{
            array_push($subs,$rows['sub_name']);
        }
        if($rows['theory']>0){
            array_push($thc,$rows['sub_name']);
        }
        if($rows['tutorial']>0){
            array_push($tutc,$rows['sub_name']);
        }
        if($rows['lab']>0){
            array_push($labc,$rows['sub_name']);
        }
    }

    while($rows=$tt->fetch(PDO::FETCH_ASSOC)){
        array_push($tt1,array($rows['hr1'],$rows['hr2'],$rows['hr3'],$rows['hr4'],$rows['hr5'],$rows['hr6']));
    }

    for($x=0;$x<sizeof($tt1);$x++){
        for($y=0;$y<sizeof($tt1[$x])-1;$y++){
            if($tt1[$x][$y]=='-'){
               if($tt1[$x][$y+1]=='-'){
                
               }
               else{

               }
            }
            else{
                if($tt1[$x][$y+1]!='-'){

                }
            }
        }
    }
    /*for($x=0;$x<sizeof($tt1);$x++){?>
        <tr>
        <?php 
            for($y=0;$y<sizeof($tt1[$x]);$y++){ ?>
            <td><?php echo $tt1[$x][$y]; ?></td>
            <?php   
        } ?>
        </tr>
        <?php   
        } */


?>
 $a = $labs[0];
                $b = $labs[1];
                $c = $a.'+'.$b;
                $tt1[$x][$y]=$c;
                $tt1[$x][$y+1]=$c;
                $slot1 = $col[$y];
                $slot2 = $col[$y+1];
                $day = $row[$x];
                echo $slot1;
                echo $slot2;
                echo $day;
                echo nl2br("\n");
                $qry = $conn->prepare("UPDATE tt1 SET $slot1 = :c, $slot2 = :c WHERE day LIKE :day");
                $qry->bindParam(':c', $c);
                $qry->bindParam(':day', $day);
                $qry->execute();
                $qry = $conn->prepare("UPDATE labtt SET $slot1 = :c, $slot2 = :c WHERE day LIKE :day");
                $qry->bindParam(':c', $c);
                $qry->bindParam(':day', $day);
                $qry->execute();