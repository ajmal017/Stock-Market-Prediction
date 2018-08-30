<?php
//written and debugged by: Madhura and Siddhi
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Predict
	</title>
</head>

<body id="bod">
<head><link rel="stylesheet" href="interface.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></head>

<div id="div">
	<button class="b1" onclick="window.location.href='interface.php'"><i class="glyphicon glyphicon-home"></i>&nbsp Home</button>
	<button class="b1" onclick="window.location.href='about.php'"><i class="glyphicon glyphicon-info-sign"></i>&nbsp About</button>
	<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
	<a href="RSS.php"> <input type="button" id="logout" value="News Feed"/> </a>
	<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome <?php echo $_SESSION['name']; ?>! </button>
</div>

<div id = "div1">
	<h1 id = "h1"><b><span id = "s1">Prediction</span>
	<span id = "s2">Zone</span>
	<span id = "s3">!</span>
</b></h1>

<form id= "f1" action="predict.php" method="post">
<br><br><br>
<div id="co">
<label id="comp" for="company">COMPANY</label>
<br>
<select name="company" class="b2">
	<option value="AAPL">Apple</option>
	<option value="AMZN">Amazon</option>
	<option value="FB">FaceBook</option>
	<option value="GOOG">Google</option>
	<option value="INTC">Intel Corporation</option>
	<option value="MSFT">Microsoft</option>
	<option value="T">ATT</option>
	<option value="TWTR">Twitter</option>
	<option value="TXN">Texas Instruments</option>
	<option value="YHOO">Yahoo</option>
</select>
</div>

<div id="pred">
	<h6 id="hpred">Select the type of prediction </h6>
	<input type="submit" value="Next Minute" id="button1" name="minute"/>
	<input type="submit" value="Next Day" id="button1" name="day"/>
	<input type="submit" value="5 Day" id="button1" name="long"/>
</div>
</form>
</div>
</body>
</html>

<?php
//next minute prediction
if(isset($_POST['minute']))
{
$ticker=$_POST['company'];
exec('python bayesian_today.py '.$ticker.'',$var_name);
echo '<div id="inside"><font id="predict" color="white">The next minute predicted value of '.$ticker.' is $'.$var_name[0].'</font></div>';
}

//next day prediction
if(isset($_POST['day']))
{
$ticker=$_POST['company'];
exec('python bayesian_tomorrow.py '.$ticker.'',$var_name);
echo '<div id="inside"><font id="predict" color="white">The next day predicted value of '.$ticker.' is $'.$var_name[0].'</font></div>';
}

//5 day prediction
if(isset($_POST['long']))
{
$ticker=$_POST['company'];
exec('python analyzer2.py '.$ticker.'',$var_name1);
echo '<div id="inside"><font id="predict" color="white" font-style="italic">The long term predicted value of '.$ticker.' for 5 days are $'.$var_name1[0].', $'.$var_name1[1].', $'.$var_name1[2].', $'.$var_name1[3].', $'.$var_name1[4].'</font></div>';
}
?>