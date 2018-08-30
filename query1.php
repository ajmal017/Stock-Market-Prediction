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
</b> </h1>
</div>
</body>
</html>

<?php
	exec('python query1.py',$var_name1);
	echo '<br><br><div id="inside"><font id="predict" color="white">The lastest stock prices of all the companies are: </font><br><br><br><br></div>';
	echo '<table align="center" border="0" style="width:40%">';
	echo '<tr><td><font id="predict" color="white">Apple</font></td><td><font id="predict" color="white">$'.$var_name1[0].'</font></td></tr>';
	echo '<tr><td><font id="predict" color="white">Amazon</font></td><td><font id="predict" color="white">$'.$var_name1[1].'</font></td></tr>';
	echo '<tr><td><font id="predict" color="white">Facebook</font></td><td><font id="predict" color="white">$'.$var_name1[2].'</font></td></tr>';
	echo '<tr><td><font id="predict" color="white">Google</font></td><td><font id="predict" color="white">$'.$var_name1[3].'</font></td></tr>';
	echo '<tr><td><font id="predict" color="white">Microsoft</font></td><td><font id="predict" color="white">$'.$var_name1[4].'</font></td></tr>';
	echo '<tr><td><font id="predict" color="white">Texas Instruments</font></td><td><font id="predict" color="white">$'.$var_name1[5].'</font></td></tr>';
	echo '<tr><td><font id="predict" color="white">Twitter</font></td><td><font id="predict" color="white">$'.$var_name1[6].'</font></td></tr>';
	echo '<tr><td><font id="predict" color="white">Yahoo</font></td><td><font id="predict" color="white">$'.$var_name1[7].'</font></td></tr>';
?>
