<?php
//written and debugged by: Madhura and Siddhi
session_start();
?>

<html>
<head>
	<title>
		Login
	</title>
</head>

<body id = "bod">
	<head><link rel = "stylesheet" href = "login.css">
		<link rel = "stylesheet" href = "interface.css">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></head>
</head>

<div id = "div1">
	<h1 id = "h1"><b><span id = "s1">Stock</span>
	<span id = "s2">Market</span>
	<span id = "s3">Prediction</span>
</b></h1>
</div>

<form id = "f1" action = "login.php" method = "post">
	<br><br><br><br> 		
	<h class = "u"> Username </h><br> 
	<input type = "text" value = "" name = "name" class = "i1"><br>
	<h class = "u"> Password </h><br> 
	<input type = "password" value = "" name = "password" class = "i1">
	<br> 
	<input id = "button1"  type = "submit" name = "login" value = "Login">
	<br><h id = "nr"> Not an existing user?</h>
	<a href = "register.php" id = "q"> Register Now! </a>
</form>
</body>
</html>

<?php 

$dbc =  mysqli_connect('localhost','root','','login');
if (!$dbc){
	die('Connection Unsuccesful'.mysqli_connect_error());
}
if(isset($_POST['login'])){
	$username = $_POST['name'];
	$password = $_POST['password'];
	
	if (empty($username)){
		echo "<script> alert('Invalid Username')</script>";
		exit();
	}
	if (empty($password)){
		echo "<script> alert('Wrong Password')</script>";
		exit();
	}
	
	$query1 = "SELECT username from register WHERE username = '$username' AND password = '$password'";
	echo $query1;
	$result1 = mysqli_query($dbc, $query1);
	if(mysqli_num_rows($result1)!=0){
		$_SESSION['name'] = $username;
		$_SESSION['password'] = $password;
		$row = $result1->fetch_assoc();
		echo "<script>window.open('interface.php','_self')</script>";
	}
	else {
		echo "<script>alert('Username or password is incorrect')</script>";
	}
	mysqli_close($dbc);
}
?>

