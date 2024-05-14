
<!DOCTYPE html>

<html lang="en">

	
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href= "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login Page</title>

</head>

<body>
	<h1>
		<img src="logo.png" alt="Logo" class="logo" style="width:100px; background-color:none;"/>

		<img src="logotxt.png" alt="Logo1" class="logo1" style="width:600px; color:white; "/>
	</h1>	
	<form action="validate.php" method="post">
		<div class="login-box">
			
			<h1>Login</h1>
			
			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="Username" name="username">
			</div>
			
			<div class="textbox"> 
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="Password" name="password">
			</div>
			
			<a style="text-decoration:none;color:green;" class="user_register" href="register.php">Add faculty</a>
			
			<input class="button" type="submit" name="login" value="Sign In">
		
		</div>
	</form>
</body>
</html>
<style>
body {
	font-family: sans-serif;
	background-image:url("Layer 2 copy.png");
	background-size: cover;
    background-repeat: no-repeat;
}
.login-box {
	width: 400px;
    height: 350px;
	position: absolute;
	padding: 30px;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	color: #191970;
	background-color: rgba(240, 248, 255, 0.797);
}
.login-box h1 {
	float: left;
	font-size: 40px;
	border-bottom: 4px solid #191970;
	margin-bottom: 50px;
	padding: 13px;
}
.textbox {
	width: 100%;
	overflow: hidden;
	font-size: 20px;
	padding: 8px 0;
	margin: 8px 0;
	border-bottom: 1px solid #191970;
}
.textbox input {
	border: none;
	outline: none;
	background: none;
	font-size: 18px;
	float: left;
	margin: 0 10px;
}
.fa{
	float: left;
	text-align: center;
}
.button {
	width: 100%;
	padding: 8px;
	color: #ffffff;
	background: none #191970;
	border: none;
	border-radius: 6px;
	font-size: 18px;
	cursor: pointer;
	margin: 12px 0;
}
</style>