<!DOCTYPE html>

<?php 
//written and debugged by Siddhi and Madhura
session_start();
?>
<html>
<head>
	<title>
		About
	</title>
</head>

<body id="bod">
<head>
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="interface.css">
	<link rel="stylesheet" href="about.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></head>
</head>

<div id="div">
	<button class="b1" onclick="window.location.href='interface.php'"><i class="glyphicon glyphicon-home"></i>&nbsp Home</button>
	<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
	<a href="RSS.php"> <input type="button" id="logout" value="News Feed"/> </a>
	<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome <?php echo $_SESSION['name']; ?>! </button>
</div>

<div id="div2">
	<h1 id="h1"><b><span id = "s1">Rolling the Stock Market</span></b></h1>
</div> 
	<h3 class="pt">Hello!</h3>
	<h4 id="ty">Thank you for visiting us. We hope that you enjoyed your experience while predicting the stock prices. This page was an endeavour to help you make predictions about the stock so that you could perform better stock purchases and earn profits. To achieve this, we have used certain algorithms for short term and long term prediction which will be explained later on this page. We hope our effort was of use to you. <br>Thank you once again! <br>Keep visiting:)  </h4>	
	<h3 class="pt">Long-Term Prediction</h3>
	<p class="pred">
	<span class="typ">Artificial Neural Networks:</span><br>
	<h6 id = "text"> Stock market remains one of the major means of investment for investors for atleast a couple of decades. Many scientific atempts have been made on stock market to extract some useful patterns in predicting their movements. These patterns helped researchers in developing many models using fundamental, rechnical and time series in forecasting the competitive predictions of stock prices for the investors. The Artificial Neural Networks have the ability to discover the nonlinear relationship in the input data set without a priori assumption of knowledge of relation between the input and the output and hence ANNs suits well than any other models in predicting stock prices. It is defined as a data processing system consisting of a large number of simple highly interconnected processing elements (artificial neurons) in an architecture inspired by the structure of the cerebral cortex of the brain. A network is taught by presenting it with a set of sample data as inputs and by varying the weighting factors in the algorithm that determines the corresponding output states.<br><br>
	<span class="typ">SVM (Support Vector Machines):</span><br>
	<h6 id = "text"> Support Vector Machine is a machine learning technique used in recent studies to forecast stock prices. This study uses daily closing prices for technology stocks to calculate price volatility and momentum for individual stocks and for the overall sector. These are used as parameters to the SVM model. The model attempts to predict whether a stock price sometime in the future will be higher or lower than it is on a given day. We find little predictive ability in the short-run but definite predictive ability in the long-run. </h6>
	<h3 class="pt">Short-Term Prediction</h3>
	<p class="pred">
		<span class ="typ">The Bayesian Predictor:</span><br>
	<h6 id = "text"> In this algorithm, first the network is determined from the daily stock price and then, it is applied for predicting the daily stock price which was already observed. The prediction error is evaluated from the daily stock price and its prediction. Second, the network is determined again from both the daily stock price and the daily prediction error and then, it is applied for the future stock price prediction. </h6>

</body>
</html>