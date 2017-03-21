<?php
	session_start();

	$user_check = $_SESSION['username'];
	$login_session = $user_check;

	if(!isset($_SESSION['username'])){
		header("location: login2.php");
	}

?>
