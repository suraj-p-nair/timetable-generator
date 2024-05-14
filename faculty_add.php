<?php
include_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = test_input($_POST["id"]);
    $username = test_input($_POST["name"]);
    $password = test_input($_POST["pswrd"]);
    $designation = test_input($_POST["desig"]);

    $adminq = "INSERT INTO login VALUES ('$id', '$username', '$password', '$designation')";
    $facultyq = "INSERT INTO faculty (id, name, designation) VALUES ('$id', '$username', '$designation')";
    $facultyp = "INSERT INTO faculty_preference (id, name) VALUES ('$id', '$username')";
    $facultyr = "INSERT INTO faculty_preference_final (id, name) VALUES ('$id', '$username')";

    $conn->query($adminq);
    if ($designation != "HOD" && $designation != "TTC") {
        $conn->query($facultyq);
        $conn->query($facultyp);
        $conn->query($facultyr);
    }
    header("location: index.php");
    die();
}
?>