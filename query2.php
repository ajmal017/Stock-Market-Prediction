<?php
//written and debugged by: Madhura
session_start();
?>

<!DOCTYPE html>
<html>

<body id="bod">
<head><link rel="stylesheet" href="interface.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></head>

<div id="div">
	<button class="b1" onclick="window.location.href='interface.php'"><i class="glyphicon glyphicon-home"></i>&nbsp Home</button>
	<button class="b1" onclick="window.location.href='about.php'"><i class="glyphicon glyphicon-info-sign"></i>&nbsp About</button>
	<button class="b1" onclick="window.location.href='query.php'"><i class="glyphicon glyphicon-hand-left"></i>&nbsp Back</button>
	<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
	<a href="RSS.php"> <input type="button" id="logout" value="News Feed"/> </a>
	<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome <?php echo $_SESSION['name']; ?>! </button>
</div>

<div id = "div1">
	<h1 id = "h1"><b><span id = "s1">Stock</span>
	<span id = "s2">Market</span>
	<span id = "s3">Prediction</span>
</b> <br> <br> <br> </h1>
</div>

</body>
</html>

<?php

exec('python query2.py YHOO',$var_name1);
echo '<br><br><div id="inside"><font id="predict" color="white">The highest price of Yahoo! in last 10 days: $'.$var_name1[0].'</font></div>';

?>
