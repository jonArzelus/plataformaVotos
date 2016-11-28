<?php 
$_POST['pagina'] = "index"; 
include 'php/head.php';
?>
</head>
<body>
<?php include 'php/header.php'; ?>
<div class="container-fluid">
	<div class="text-center" style="height:80%;">
		<h1>Plataforma de Votos</h1><br><br>
		<?php 
		if(isset($_SESSION['nombre'], $_SESSION['siglas'])) {
			echo $_SESSION['siglas'];
		?><br><?php
			echo $_SESSION['nombre']; 
		} else {
			null; //por poner algo?
		}
		?>
	</div>
</div>
<?php include 'php/footer.php'; ?>
</body>
</html>