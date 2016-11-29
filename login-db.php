<?php 
$_POST['pagina'] = "#"; 
include 'php/head.php';
?>
<?php
if(isset($_POST['user'], $_POST['pwd'])) {
	$user = $_POST['user'];
	$pwd = $_POST['pwd'];
	$sql = "SELECT * FROM usuarios WHERE Usuario='$user' AND Pass='$pwd'";
	$result = $db->query($sql);
	if($result) {
		if($result->num_rows == 0) {
			$estado = "sin_iniciar";
		} else {
			$estado = "iniciado";
			$datos = mysqli_fetch_array($result);
			$conexion = date("Y-m-d H:i:s");
			$ip = $_SERVER['REMOTE_ADDR'];
			//datos de usuario
			$_SESSION['usuario'] = $datos['Usuario'];
			$_SESSION['siglas'] = $datos['Siglas'];
			$_SESSION['nombre'] = $datos['Nombre'];
			$_SESSION['comentario'] = $datos['Comentario'];
			$_SESSION['ultimaconexion'] = $datos['ultimaConexion'];
			$_SESSION['conexion'] = $conexion;
			$_SESSION['ultimaip'] = $datos['ultimaIP'];
			$_SESSION['ip'] = $ip;
			$_SESSION['universidadid'] = $datos['ID'];
			$_SESSION['imagen'] = $datos['Imagen'];
			$_SESSION['linkuniversidad'] = $datos['linkUniversidad'];
			//datos de la nueva sesión
			$sql = "UPDATE usuarios SET ultimaConexion='$conexion', ultimaIP='$ip' WHERE Usuario='$user'";
			$db->query($sql);
		}
	} else {
		$estado = "sin_iniciar";
	}
} else {
	$estado = "sin_iniciar";
	echo 'HA HABIDO UN ERROR DESCONOCIDO (HOTLINK?)';
}
?>
</head>
<body>
<?php include 'php/header.php'; ?>
<div class="container-fluid">
	<div class="text-center">
	<div class="col-md-6 col-md-push-3">
	<?php if($estado=="iniciado") { ?>
		<div class="alert alert-success" role="alert">Sesión iniciada correctamente como <strong><?php echo $_SESSION['usuario'] ?></strong>.</div>
		<a href="index.php"><button type="button" class="btn btn-default">Volver al inicio</button></a>
	<?php } else if($estado=="sin_iniciar") { ?>
		<div class="alert alert-danger" role="alert">No se ha podido iniciar sesión. Por favor, vuelve a intentarlo de nuevo.</div>
		<a href="login.php"><button type="button" class="btn btn-default">Volver a intentarlo</button></a>
	<?php } ?>
	</div>
	</div>
</div>
<?php include 'php/footer.php'; ?>
</body>
</html>