<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
    $servername = "localhost:3306";
    $dbname = "project";
    $username = "root";
    $password = "";

    $conn = new PDO(
        "mysql:host=$servername;dbname=$dbname",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
