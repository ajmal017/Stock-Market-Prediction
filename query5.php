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
</b></h1>
</div>

<?php
exec('python querry4_new.py GOOG',$var_name1);
exec('python querry3_new.py APPL',$var_name2);
exec('python querry3_new.py AMZN',$var_name3);
exec('python querry3_new.py FB',$var_name4);
exec('python querry3_new.py GOOG',$var_name5);
exec('python querry3_new.py INTC',$var_name6);
exec('python querry3_new.py MSFT',$var_name7);
exec('python querry3_new.py T',$var_name8);
exec('python querry3_new.py TWTR',$var_name9);
exec('python querry3_new.py TXN',$var_name10);
exec('python querry3_new.py YHOO',$var_name11);
echo '<br><br><div id="inside"><font id="predict" color="white">The companies which have the average stock price lesser than the lowest price of Google ('.$var_name1[0].') in the last one year: </font><br><br><br><br></div>';
echo '<table align="center" border="0" style="width:40%">';

if($var_name3[0]< $var_name1[0])
	echo '<tr><td><font id="predict" color="white">Amazon</font></td><td><font class="predict" color="white">$'.$var_name3[0].'</font></td></tr>';
if($var_name4[0]< $var_name1[0])
	echo '<tr><td><font id="predict" color="white">Facebook</font></td><td><font id="predict" color="white">$'.$var_name4[0].'</font></td></tr>';
if($var_name5[0]< $var_name1[0])
	echo '<tr><td><font id="predict" color="white">Google</font></td><td><font id="predict" color="white">$'.$var_name5[0].'</font></td></tr>';
if($var_name6[0]< $var_name1[0])
	echo '<tr><td><font id="predict" color="white">Intel</font></td><td><font id="predict" color="white">$'.$var_name6[0].'</font></td></tr>';
if($var_name7[0]< $var_name1[0])
	echo '<tr><td><font id="predict" color="white">Microsoft</font></td><td><font id="predict" color="white">$'.$var_name7[0].'</font></td></tr>';
if($var_name8[0]< $var_name1[0])
	echo '<tr><td><font id="predict" color="white">AT&T</font></td><td><font id="predict" color="white">$'.$var_name8[0].'</font></td></tr>';
if($var_name9[0]< $var_name1[0])
	echo '<tr><td><font id="predict" color="white">Twitter</font></td><td><font id="predict" color="white">$'.$var_name9[0].'</font></td></tr>';
if($var_name10[0]< $var_name1[0])
	echo '<tr><td><font id="predict" color="white">Texas Instruments</font></td><td><font id="predict" color="white">$'.$var_name10[0].'</font></td></tr>';
if($var_name11[0]< $var_name1[0])
	echo '<tr><td><font id="predict" color="white">Yahoo</font></td><td><font id="predict" color="white">$'.$var_name11[0].'</font></td></tr>';
echo'</table>';
?>

</body>
</html>