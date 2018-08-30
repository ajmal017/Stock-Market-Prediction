<?php
//written and debugged by: Madhura and Siddhi
session_start();
?>

<html>
<head>
	<title>
		Regsiter
	</title>
</head>

<body id = "bod">
<head><link rel = "stylesheet" href = "login.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></head>
</head>

<div id = "div1">
<h1 id = "h1"><b><span id = "s1">Stock</span>
<span id = "s2">Market</span>
<span id = "s3">Prediction</span>
</b></h1>
</div>
	<form id = "f1" action="register.php" method = "post">
		<h id = "log">Register With Us!</h><br>
		<h class = "u"> Email Id </h><br> 
		<input type = "text" name = "email_id" class = "i1"> <br>
		<h class = "u"> Username </h><br> 
		<input type = "text" name = "name" class = "i1"> <br>
		<h class = "u"> Password </h><br> 
		<input type = "password" name = "password" class = "i1"> <br>
		<h class = "u"> Confirm Password </h><br> 
		<input type = "password" name = "conf_password" class = "i1"> <br>
		<br>
		<input id = "button1" type = "submit" value = "Register" name = "register">
		
	</form>
</body>
</html>

<?php 
$dbc =  mysqli_connect('localhost','root','','login');
if (!$dbc){
	die('Connection Unsuccesful'.mysqli_connect_error());
}

if (isset($_POST['register'])){
	$username = $_POST['name'];
	$password = $_POST['password'];
	$email = $_POST['email_id'];
	$conf_pass = $_POST['conf_password'];
	
	if (empty($email)){
		echo "<script> alert('Invalid Email Id ') </script>";
		exit();
	}
	if (empty($username)){
		echo "<script> alert('Invalid Username ') </script>";
		exit();
	}
	if (empty($password)){
		echo "<script> alert('Invalid Password ') </script>";
		exit();
	}
	if (empty($conf_pass)){
		echo "<script> alert('Enter password again') </script>";
		exit();
	}
	if ($password != $conf_pass){
		echo "<script> alert('Passwords do not match! Please enter again.') </script>";
		exit();
	}
	
	$query1 = "SELECT username from register WHERE username = '$username'";
	$result1 = mysqli_query($dbc, $query1) or die('Not inserted');
	
	if(mysqli_num_rows($result1)>0){
		echo "<script> alert ('$username is already registered in the database. Please enter a different username')";
	}
	else {
		$query = "INSERT INTO register (username, password, email) VALUES ('$username', '$password', '$email')";
		$result = mysqli_query($dbc, $query) or die('Not inserted');
		
		if ($result == true){
			$_SESSION['name'] = $username;
			$_SESSION['password'] = $password;
			$row = $result1->fetch_assoc();
			echo "<script> window.open('login.php', '_self')</script>";
		}
		mysqli_close($dbc);
	}	
}

?>