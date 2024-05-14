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
    <form action="faculty_add.php" method="post">
        <div class="register-box">

            <h1>Add Faculty</h1>
            <div class="id">
                <input type="text" name="id" id="id" placeholder="Faculty ID" required>
            </div>

            <div class="name">
                <input type="text" name="name" id="name" placeholder="Name" required>
            </div>

            <div class="pswrd">
                <input type="password" name="pswrd" id="pswrd" placeholder="Password" required minlength="1">
            </div>

            <div class="desig">
                <input type="text" name="desig" id="desig" placeholder="Desgination" required>
            </div>
        
            <input type="submit" class="button" value="Add">

        </div>
    </form>
</body>
<style>
body {
    background-color: #f2f2f2;
    background-image:url("Layer 2.png");
    font-family: Arial, sans-serif;
}
.register-box {
    background-color: rgba(240, 248, 255, 0.600);
    border-radius: 5px;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}
.register-box h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}
.register-box input[type="text"],
.register-box input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}
.register-box input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    padding: 15px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}
.register-box input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
</html>