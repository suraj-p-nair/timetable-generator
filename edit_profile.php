<?php
include_once('connection.php');
session_start();

$current_user = $_SESSION['$current_user'];

$sql = $conn->prepare("SELECT * FROM faculty WHERE name LIKE '$current_user'");
$sql->execute();
$faculty = $sql->fetchAll();

function update($oldname, $newid, $newname, $newpswrd, $newdesig)
{
    global $conn;
    $update = $conn->prepare("UPDATE login SET id='$newid', username='$newname', password='$newpswrd', designation='$newdesig' WHERE username like '$oldname'");
    $update->execute();
    $update = $conn->prepare("UPDATE faculty SET id='$newid', name='$newname', designation='$newdesig' WHERE name like '$oldname'");
    $update->execute();
    $update = $conn->prepare("UPDATE faculty_preference SET id='$newid', name='$newname' WHERE name like '$oldname'");
    $update->execute();
    $update = $conn->prepare("UPDATE faculty_preference_final SET id='$newid', name='$newname' WHERE name like '$oldname'");
    $update->execute();
    $_SESSION['$current_user'] = $newname;
    header("location: index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Register</title>
</head>

<body>
    <form method="post">
        <div class="register-box">
            <?php foreach ($faculty as $fac) : ?>
                <div class="id"><?php echo "Faculty ID: " .$fac['id']; ?></div>
                <div class="name"><?php echo "Name: ".$fac['name']; ?></div>
                <div class="desig"><?php echo "Designation: ".$fac['designation']; ?></div>
                <?php
                if (array_key_exists('save', $_POST)) {
                    update($current_user, $_POST['newid'], $_POST['newname'], $_POST['newpswrd'], $_POST['newdesig']);
                }
                ?>
            <?php endforeach; ?>

            <div class="newid">
                <input type="text" name="newid" id="newid" placeholder="Faculty ID" required>
            </div>

            <div class="newname">
                <input type="text" name="newname" id="newname" placeholder="Name" required>
            </div>

            <div class="newpswrd">
                <input type="password" name="newpswrd" id="newpswrd" placeholder="Password" required minlength="1">
            </div>

            <div class="newdesig">
                <input type="text" name="newdesig" id="newdesig" placeholder="Designation" required>
            </div>

            <input type="submit" class="button" name="save" value="Save">
        </div>
    </form>
</body>
<style>
 body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .register-box {
            width: 400px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            margin: 0 auto;
            margin-top: 100px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .register-box input[type="text"],
        .register-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .register-box .button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        .register-box .button:hover {
            background-color: #45a049;
        }

        .register-box .id,
        .register-box .name,
        .register-box .desig {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }



</style>
</html>
