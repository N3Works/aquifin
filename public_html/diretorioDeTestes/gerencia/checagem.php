<?php
	session_start();
	if(isset($_SESSION['nivel'])){
		if($_SESSION['nivel']!=100)
			header('Location: login.php');
	}else 
		header('Location: login.php');
?>