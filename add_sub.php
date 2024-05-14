<?php 

include_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $table = test_input($_POST["varname"]);
    $code = test_input($_POST["sub_code"]);
	$name = test_input($_POST["sub_name"]);
    $theo = test_input($_POST["theory_hrs"]);
    $tut = test_input($_POST["tutorial_hrs"]);
    $lab = test_input($_POST["lab_hrs"]);
    $credits = test_input($_POST["credits"]);
    $type = test_input($_POST["type"]);

    $query = "INSERT INTO $table  values ('$code','$name','$theo','$tut','$lab','$credits','$type')";
    $conn->query($query);

    header("location: enter_sub.php");
}
?>