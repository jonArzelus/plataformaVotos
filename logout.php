<?php
	session_destroy();
	$_SESSION['usuario'] = "GUEST";
	header("Location:index.php");
?>