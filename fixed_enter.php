<?php 
    include_once('connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $table = $_POST["varname"];
        $sub = $_POST["fixsub"];
       
        for($x=0;$x<sizeof($table);$x++){
            
            $hr1 = $sub[(6*$x)];
            $hr2 = $sub[(6*$x)+1];
            $hr3 = $sub[(6*$x)+2];
            $hr4 = $sub[(6*$x)+3];
            $hr5 = $sub[(6*$x)+4];
            $hr6 = $sub[(6*$x)+5];
            $id = ($x%5)+1;
            $tname = $table[$x];

            echo $id;
            echo nl2br("\t");
            echo $tname;
            echo nl2br("\t");
            echo $hr1;
            echo nl2br("\t");
            echo $hr2;
            echo nl2br("\t");
            echo $hr3;
            echo nl2br("\t");
            echo $hr4;
            echo nl2br("\t");
            echo $hr5;
            echo nl2br("\t");
            echo $hr6;
            echo nl2br("\n");

            $sql = "UPDATE  $tname set hr1='$hr1',hr2='$hr2',hr3='$hr3',hr4='$hr4',hr5='$hr5',hr6='$hr6' WHERE  id = $id";
            $conn->query($sql);

        }

        header("location: fix_sub.php");
        //die();
    }
?>