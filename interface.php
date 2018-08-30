<?php
//written and debugged by: Madhura and Siddhi
session_start();
?>

<html>
<head>
	<title>
		Main Page
	</title>
</head>
<body id = "bod">
<head><link rel = "stylesheet" href = "interface.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<div id="div">
	<button class = "b1" onclick="window.location.href='about.php'"><i class = "glyphicon glyphicon-info-sign"></i>&nbsp About</button>
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

<div id = "div3"> 
	<h4 id = "select">Select from below!</h4> <br> <br> <br>
	<button id = "button1" onclick = "window.location.href = 'predict.php'"><i class = "glyphicon glyphicon-usd"></i>&nbsp Predict </button>
	<button id = "button2" onclick = "window.location.href = 'query.php'"><i class = "glyphicon glyphicon-question-sign"></i>&nbsp Query </button>
	<button id = "button2" onclick = "window.location.href = 'suggestMe.php'"><i class = "glyphicon glyphicon-thumbs-up"></i>&nbsp SuggestMe </button>
	<button id = "button2" onclick = "window.location.href = 'rec_graph.php'"><i class = "glyphicon glyphicon-stats"></i>&nbsp Show Graph </button>	
</div>
</body>
</html>