<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="faculty_profile.css" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<?php 
    include_once('connection.php');
    session_start();

    $current_user = $_SESSION['$current_user'];
    $designation = $_SESSION['$designation'];

?>
</head>
<body>
<div class="container">
    
    <div class="name">Name: <?php echo $current_user; ?></div>
    <?php if ($designation == "HOD"): ?>
        <a href="admin_preference.php">Approve preference</a>
        <a href="delete_faculty.php">Delete Faculty</a>
    <?php elseif ($designation == "TTC"): ?>
        <a href="fix_sub.php">Enter fixed subject slots</a>
        <a href="enter_sub.php">Add Subjects</a>
        <a href="generate_tt.php">Generate Time Table</a>
    <?php else: ?>
        <a href="preference_add.php">Enter preference</a>
        <div class="edit"><a href="edit_profile.php">Edit Profile</a></div>
    <?php endif; ?>
</div>

</body>
</html>
<style>
body {
    background: linear-gradient(to bottom, #667eea, #764ba2);
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    padding: 0;
    color: #ffffff;
    font-family: Arial, sans-serif;
}
.edit {
    position: absolute;
    top: 10px;
    right: 10px;
}
.container {
    text-align: center;
}

.name {
    margin-bottom: 50px;
    font-size: 50px;
    font-weight: bold;
}

a {
    display: block;
    margin: 10px;
    padding: 15px 30px;
    border-radius: 50px;
    text-decoration: none;
    color: #ffffff;
    background-color: #4a47a3;
    font-size: 18px;
    transition: background-color 0.3s;
}

a:hover {
    background-color: #2c2961;
}
</style>