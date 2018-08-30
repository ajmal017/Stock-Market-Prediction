<html>
<head>
	<title>
		Long Term
	</title>
</head>

<body id = "bod">
	<head><link rel = "stylesheet" href = "interface.css">
	<link rel = "stylesheet" href = "login.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<div id="div">
	<button class = "b1" onclick="window.location.href='about.php'"><i class = "glyphicon glyphicon-info-sign"></i>&nbsp About</button>
	<button class = "b1" onclick="window.location.href='contact.php'"><i class = "glyphicon glyphicon-envelope"></i>&nbsp Contact</button>
	<button class="b1" onclick="window.location.href='query.php'"><i class="glyphicon glyphicon-hand-left"></i>&nbsp Back</button>
	<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
	<a href="RSS.php"> <input type="button" id="logout" value="News Feed"/> </a>
	<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome <?php echo $_SESSION['name']; ?>! </button>
</div>

<div id = "div1">
	<h1 id = "h1"><b><span id = "s1">Prediction</span>
	<span id = "s2">Zone</span>
	<span id = "s3">!</span>
</b> <br> </h1>
</div>

<form action = "long_term.php" method = "post"><br><br><br>
		<div id = "co">	
		<label id = "comp" for = "company"> Company </label>
		<br><br>
		<select name = "company" class = "b2">
			<option value = "AAPL"> Apple </option>
			<option value = "FB"> FaceBook </option>
			<option value = "GOOG"> Google </option>
			<option value = "MSFT"> Microsoft </option>
			<option value = "YHOO"> Yahoo! </option>
			<option value = "TWTR"> Twitter </option>
			<option value = "INTC"> Intel Corporation </option>
			<option value = "T"> ATT </option>
			<option value = "TXN"> Texas Instrument </option>
			<option value = "AMZN"> Amazon </option>
		</select>
		
		</div>
		
		<div id = "pred">
			<input type = "submit" value = "5 Day " id = "button1" name = "longterm">
		</div>
</form>			

</body>
</html>

<?php 
if(isset($_POST['longterm'])){
	$ticker = $_POST['company'];
	exec('python analyzer2.py'.$ticker.'', $var_name);
	echo '<div id="inside"><font id="pred" color="white" font-style="italic">The long term predicted value of '.$ticker.' for 5 days are $'.$var_name1[0].', $'.$var_name1[1].', $'.$var_name1[2].', $'.$var_name1[3].', $'.$var_name1[4].'</font></div>';
	
	$subject = "<html> Curent Prediction for " .$ticker." </html>";
	$txt= "Thanks for visiting the website! The following is our prediction for 5 days just in case you forget ".$ticker. " would likely have prices of" .$var_name[0]. " $";

	$to = "kiranjatty37@gmail.com";
	$headers = "From:contactus@stalkthestock.com";
	mail($to,$subject,$txt,$headers);
}
