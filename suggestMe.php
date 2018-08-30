<?php
//written and debugged by: Madhura and Siddhi
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
	<button class="b1" onclick="window.location.href='contact.php'"><i class="glyphicon glyphicon-envelope"></i>&nbsp Contact</button>
	<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
    <a href="RSS.php"> <input type="button" id="logout" value="News Feed"/> </a>
    <button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome <?php echo $_SESSION['name']; ?>! </button>
</div>

<div id = "div1">
	<h1 id = "h1"><b><span id = "s1">Stock</span>
	<span id = "s2">Market</span>
	<span id = "s3">Prediction</span>
</b> <br> </h1>
</div>

<?php
set_time_limit(300);
exec('python svm.py AAPL',$var_name1);
exec('python svm.py AMZN',$var_name2);
exec('python svm.py FB',$var_name3);
exec('python svm.py GOOG',$var_name4);
exec('python svm.py INTC',$var_name5);
exec('python svm.py MSFT',$var_name6);
exec('python svm.py T',$var_name7);
exec('python svm.py TWTR',$var_name8);
exec('python svm.py TXN',$var_name9);
exec('python svm.py YHOO',$var_name10);

?>
<br><br><br><br>
<table align="center" class="tab" border="0" style="width:40%" >
<tr>
    <td><b> <font class="compan" color="#05CBEE">COMPANY</font></b></td>
    <td><b> <font class="compan" color="#05CBEE">PREDICTION</font></b></td>
    <td><b> <font class="compan" color="#05CBEE">SUGGESTION</font></b></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">APPLE</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name1[0];?></font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name1[1];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">AMAZON</font></td>
    <td><font class="tckr" color="white"><?php echo $var_name2[0];?></font></td>
    <td><font class="tckr" color="white"><?php echo $var_name2[1];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">FACEBOOK</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name3[0];?></font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name3[1];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">GOOGLE</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name4[0];?></font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name4[1];?></font></td>
</tr><tr>
    <td><font class="tckr" color="white">INTEL</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name5[0];?></font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name5[1];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">MICROSOFT</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name6[0];?></font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name6[1];?></font></td>
</tr><tr>
    <td> <font class="tckr" color="white">AT&T</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name7[0];?></font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name7[1];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">TWITTER</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name8[0];?></font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name8[1];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">TEXAS INSTRUMENTS</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name9[0];?></font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name9[1];?></font></td>
</tr>
<tr>
    <td> <font class="tckr" color="white">YAHOO</font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name10[0];?></font></td>
    <td> <font class="tckr" color="white"><?php echo $var_name10[1];?></font></td>
</tr>
</table>
</body>
</html>