<?php 
$_POST['pagina'] = "preguntas"; 
include 'php/head.php';
?>
</head>
<body>
<?php include 'php/header.php'; ?>
<?php
$favor = 12;
$contra = 9;
$abstencion = 3;
$nulo = 1;
$total = $favor+$contra+$abstencion+$nulo;
?>
<div class="container-fluid">
	<div class="text-center">
		<h1>Preguntas</h1><br><br>
		<div class="container-fluid well"><br>
			<div class="col-md-10 col-md-push-1 panel panel-default">
				<h4>¿Necesitamos una plataforma de votos para RITSI? <span class="label label-success">Aprobado</span></h4>
				<div class="text-left">
					<p>La pregunta viene a ra&iacute;z de que en las asambleas se pierde bastante tiempo con el voto secreto y se ha decidido llevar a votación, cómo no, con voto secreto.</p>

				</div>
			</div>
			<div class="col-md-3 col-md-push-1 panel panel-default text-left">
				<ul class="list-group">
				<br>
					<li class="list-group-item list-group-item-success">Votos a favor <span class="badge"><?php echo $favor ?></span></li>
				  	<li class="list-group-item list-group-item-danger">Votos en contra <span class="badge"><?php echo $contra ?></span></li>
				  	<li class="list-group-item list-group-item-warning">Votos en blanco <span class="badge"><?php echo $abstencion ?></span></li>
				  	<li class="list-group-item list-group-item-info">Votos nulos <span class="badge"><?php echo $nulo ?></span></li>
				<br>
				</ul>
			</div>
			<div class="col-md-7 col-md-push-1 panel panel-default">
				<h4>Estado de la votación: <strong>FINALIZADO</strong></h4>
				<div class="progress">
					<?php echo('<div class="progress-bar progress-bar-success progress-bar-striped" style="width: ' . ($favor/$total)*100 .'%"></div>'); ?>
				  	<?php echo('<div class="progress-bar progress-bar-danger progress-bar-striped" style="width: ' . ($contra/$total)*100 . '%"></div>'); ?>
				  	<?php echo('<div class="progress-bar progress-bar-warning progress-bar-striped" style="width: ' . ($abstencion/$total)*100 . '%"></div>'); ?>
				  	<?php echo('<div class="progress-bar progress-bar-info progress-bar-striped" style="width: ' . ($nulo/$total)*100 . '%"></div>'); ?>
				</div><br>
				<div class="col-md-6">
					<ul class="list-group">
		  				<li class="list-group-item">Cantidad de votantes <span class="badge"><?php echo $total ?></span>
		  				</li>
		  				<li class="list-group-item">Cantidad de votos emitidos <span class="badge"><?php echo $total ?></span>
		  				</li>
					</ul>
				</div>
				<div class="col-md-6">
					<ul class="list-group">
					  	<li class="list-group-item">Comienzo <strong>12:00:00</strong> - Fin <strong>12:15:00</strong></li>
					  	<li class="list-group-item">Tiempo restante <strong>00:00:00</strong></li>
					</ul>
				</div>
				<br>
			</div>
		</div>
	</div>
</div>
<?php include 'php/footer.php'; ?>
</body>
</html>