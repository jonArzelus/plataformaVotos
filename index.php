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
	  	<div class="row">
			<?php 
			if(isset($_SESSION['nombre'], $_SESSION['siglas'])) {
				echo('<h2>' . $_SESSION['siglas'] . '</h2>');
			?><br>
			<?php
				echo('<h4>' . $_SESSION['nombre'] . '</h4>');
			?>
			<div class="row">
				<div class="col-md-4 col-md-push-4">
    				<?php echo('<a target="_blank" href="' . $_SESSION['linkuniversidad'] . '" class="thumbnail">'); ?>
      				<?php echo('<img src="' . $_SESSION['imagen'] . '" alt="logo_universidad" style="height:300px; width:300px;"">'); ?>
    				</a>
  				</div>
	  		</div>
			<?php } else {
				null; //por poner algo?
			}
			?>
		</div>
	</div>
</div>
<?php include 'php/footer.php'; ?>
</body>
</html>