<?php
	session_start();
	session_destroy();
	session_start();
	$_SESSION['usuario'] = "GUEST";
	header("Location:../index.php");
?>