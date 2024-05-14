<?php
session_start();

// Clear session variables (optional, if needed)
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page or any other desired page
header("Location: index.php");
exit;
?>