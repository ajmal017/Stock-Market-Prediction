<?php
	//written and debugged by: Madhura and Siddhi
	session_start();
	session_destroy();
	header('Location: login.php');
	exit;
?>