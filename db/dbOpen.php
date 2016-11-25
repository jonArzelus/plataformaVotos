<?php

include 'dbConfig.php';

$db = new mysqli(HOST, USER, PASS, DATABASE);
if($db->connect_error) {
	die ("<div>Error al conectar con la base de datos: (".$db->connect_errno.") ".$db->connect_error."</div></br>");
} else {
	null;
}

?>