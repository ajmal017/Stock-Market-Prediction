<?php
	//written and debugged by: Madhura and Siddhi
	session_start();
?>

<!DOCTYPE html>

<html>
<head>
<title>
	Query
</title>
</head>

<body id="bod">
<head>
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="interface.css">
	<link rel="stylesheet" href="about.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<div id="div">
	<button class="b1" onclick="window.location.href='interface.php'"><i class="glyphicon glyphicon-home"></i>&nbsp Home</button>
	<button class="b1" onclick="window.location.href='about.php'"><i class="glyphicon glyphicon-info-sign"></i>&nbsp About</button>
	<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
	<a href="RSS.php"> <input type="button" id="logout" value="News Feed"/> </a>
	<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome <?php echo $_SESSION['name']; ?>! </button>
</div>
<div id="div1">
	<h1 id="h1"><b><span id = "s1">Rolling the Stock Market</span></b></h1>
</div>

<div id="d03">
	<button id = "button1" onclick = "window.location.href = 'query1.php'"> Latest stock price </button>
	<button id = "button2" onclick = "window.location.href = 'query2.php'"> Highest stock price </button>
	<button id = "button2" onclick = "window.location.href = 'query3.php'"> Average stock price </button>
	<button id = "button1" onclick = "window.location.href = 'query4.php'"> Lowest stock price </button>
	<button id = "button1" onclick = "window.location.href = 'query5.php'"> Comparison of stock price </button>
</div>

</body>
</html>