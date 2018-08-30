<?php 
//written and debugged by: Manasi and Siddhi
session_start();
?>

<html>
<head>
	<link rel = "stylesheet" href = "interface.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<title>
		RSS Feed
	</title>

<style type="text/css">
.container{
	background: #ECECEC none;
	border: 1px solid #D5D4D4;
	height: 30px;
	margin: 0 auto;
	width: 1250px;
}
.container .wrap{
	width: 1250px;
	left: 5px;
	top: 0px;
	overflow: hidden;
	position: relative;
	line-height: 30px;
	font-size-adjust: none;
}
div.stockTicker
{
	font-size: 18px;
	list-style-type: none;
	margin: 0;
	padding: 0;
	position: relative;
}
div.stockTicker span.quote
{
	margin: 0;
	font-weight: bold;
	color: #000;
	padding: 0 5px 0 10px;
}
.GreenText
{
	color: Green;
}
.RedText
{
	color: Red;
}
.up_green
{
	background: url(http://www.codescratcher.com/wp-content/uploads/2014/11/up.gif) no-repeat left center;
	padding-left: 10px;
	margin-right: 5px;
}
.down_red
{
	background: url(http://www.codescratcher.com/wp-content/uploads/2014/11/down.gif) no-repeat left center;
	padding-left: 10px;
	margin-right: 5px;
}

<head>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script src="http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js"
	type="text/javascript"></script>
	<style type="text/css">

@import url("http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.css");

#feedControl {
	margin-top : 10px;
	margin-left: auto;
	margin-right: auto;
	width : 440px;
	font-size: 12px;
	color: #9CADD0;
}

</style>
<script type="text/javascript">
function load() {
	var feed ="http://feeds.bbci.co.uk/news/world/rss.xml";
	new GFdynamicFeedControl(feed, "feedControl");
}

google.load("feeds", "1");
google.setOnLoadCallback(load);
</style>
</script>
</head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript">
(function($) {
	$.fn.jStockTicker = function(options) {
	if (typeof (options) == 'undefined') {
	options = {};
	}
	var settings = $.extend( {}, $.fn.jStockTicker.defaults, options);
	var $ticker = $(this);
	var $wrap = null;
	settings.tickerID = $ticker[0].id;
	$.fn.jStockTicker.settings[settings.tickerID] = {};
	if ($ticker.parent().get(0).className != 'wrap') {
		$wrap = $ticker.wrap("<div class='wrap'></div>");
	}

	var $tickerContainer = null;
	if ($ticker.parent().parent().get(0).className != 'container') {
	$tickerContainer = $ticker.parent().wrap("<div class='container'></div>");
}

var node = $ticker[0].firstChild;
var next;
while(node) {
	next = node.nextSibling;
	if(node.nodeType == 3) {
		$ticker[0].removeChild(node);
	}
	node = next;
}
		
var shiftLeftAt = $ticker.children().get(0).offsetWidth;
$.fn.jStockTicker.settings[settings.tickerID].shiftLeftAt = shiftLeftAt;
$.fn.jStockTicker.settings[settings.tickerID].left = 0;
$.fn.jStockTicker.settings[settings.tickerID].runid = null;
$ticker.width(2 * screen.availWidth);
function startTicker() {
	stopTicker();
	var params = $.fn.jStockTicker.settings[settings.tickerID]; 
	params.left -= settings.speed;
	if(params.left <= params.shiftLeftAt * -1) {
		params.left = 0;
		$ticker.append($ticker.children().get(0));
		params.shiftLeftAt = $ticker.children().get(0).offsetWidth;
	}
	$ticker.css('left', params.left + 'px');
	params.runId = setTimeout(arguments.callee, settings.interval);
	$.fn.jStockTicker.settings[settings.tickerID] = params;
}

function stopTicker() {
	var params = $.fn.jStockTicker.settings[settings.tickerID];
	if (params.runId)
		clearTimeout(params.runId);
		
	params.runId = null;
	$.fn.jStockTicker.settings[settings.tickerID] = params;
}

function updateTicker() {			
	stopTicker();
	startTicker();
}

$ticker.hover(stopTicker,startTicker);		
startTicker();
};

$.fn.jStockTicker.settings = {};
$.fn.jStockTicker.defaults = {
	tickerID :null,
	url :null,
	speed :1,
	interval :20
};
})(jQuery);

</script>
<script type="text/javascript">
$(window).load(function () {
	StockPriceTicker();
	setInterval(function() {StockPriceTicker();} , 60000);
});

function StockPriceTicker() {
	var Symbol = "", CompName = "", Price = "", ChnageInPrice = "", PercentChnageInPrice = ""; 
	var CNames = "^T,AAPL,TWTR,YHOO,MSFT,FB,AMZN,GOOG,TXN,INTC";
	var flickerAPI = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22" + CNames + "%22)&env=store://datatables.org/alltableswithkeys";
	var StockTickerHTML = "";
	var StockTickerXML = $.get(flickerAPI, function(xml) {
		$(xml).find("quote").each(function () {
			Symbol = $(this).attr("symbol");
			$(this).find("Name").each(function () {
				CompName = $(this).text();
			});
			$(this).find("LastTradePriceOnly").each(function () {
				Price = $(this).text();
			});
			$(this).find("Change").each(function () {
				ChnageInPrice = $(this).text();
			});
			$(this).find("PercentChange").each(function () {
				PercentChnageInPrice = $(this).text();
			});

			var PriceClass = "GreenText", PriceIcon="up_green";
			if(parseFloat(ChnageInPrice) < 0) { PriceClass = "RedText"; PriceIcon="down_red"; }
			StockTickerHTML = StockTickerHTML + "<span class='" + PriceClass + "'>";
			StockTickerHTML = StockTickerHTML + "<span class='quote'>" + CompName + " (" + Symbol + ")</span> ";
			StockTickerHTML = StockTickerHTML + parseFloat(Price).toFixed(2) + " ";
			StockTickerHTML = StockTickerHTML + "<span class='" + PriceIcon + "'></span>" + parseFloat(Math.abs(ChnageInPrice)).toFixed(2) + " (";
			StockTickerHTML = StockTickerHTML + parseFloat( Math.abs(PercentChnageInPrice.split('%')[0])).toFixed(2) + "%)</span>";
		});
	$("#dvStockTicker").html(StockTickerHTML);
	$("#dvStockTicker").jStockTicker({interval: 30, speed: 2});
});
}

</script>
</head>
<body id="bod">

<div id="div">
	<button class="b1" onclick="window.location.href='interface.php'"><i class="glyphicon glyphicon-home"></i>&nbsp Home</button>
	<button class="b1" onclick="window.location.href='about.php'"><i class="glyphicon glyphicon-info-sign"></i>&nbsp About</button>
	<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
	<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome <?php echo $_SESSION['name']; ?>! </button>
</div>

<div id="StockTickerContainer" style="height: 32px; line-height: 32px; overflow: hidden;">
	<div id='dvStockTicker' class='stockTicker'></div>
</div>

<div id="widgetmain" style="text-align:left;overflow-y:auto;overflow-x:hidden;width:1400px;background-color:#transparent; border:0px solid #333333;">
	<div id="rsswidget" style="height:1000px;">
		<iframe src="http://us1.rssfeedwidget.com/getrss.php?time=1492733713800&amp;x=http%3A%2F%2Ffinance.yahoo.com%2Frss%2Fheadline%3Fs%3Dyhoo&amp;w=1400&amp;h=1000&amp;bc=333333&amp;bw=0&amp;bgc=transparent&amp;m=300&amp;it=true&amp;t=Yahoo! News&amp;tc=05CBEE&amp;ts=26&amp;tb=transparent&amp;il=true&amp;lc=FF69B4&amp;ls=18&amp;lb=false&amp;id=true&amp;dc=FFFFFF&amp;ds=16&amp;idt=true&amp;dtc=05CBEE&amp;dts=14" border="0" hspace="0" vspace="0" frameborder="no" marginwidth="0" marginheight="0" style="border:0; padding:0; margin:0; width:1400px; height:1000px;" id="rssOutput">Reading RSS Feed ...</iframe>
	</div>

	<div style="text-align:right;margin-bottom:0;border-top:0px solid #333333;" id="widgetbottom"><span style="font-size:70%"><a href="http://www.rssfeedwidget.com">rss feed widget</a>&nbsp;</span><br>
	</div>
</div>
</body>
</html>