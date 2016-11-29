<?php 
$_POST['pagina'] = "preguntas"; 
include 'php/head.php';
?>
</head>
<body>
<?php include 'php/header.php'; ?>
<div class="container-fluid">
	<div class="text-center" style="height:80%;">
		<h1>Preguntas</h1><br><br>
		<div class="col-md-10 col-md-push-1 panel panel-default">
			<h4>¿Necesitamos una plataforma de votos para RITSI?</h4>
		<div class="text-left">
		La pregunta viene a raíz de que en las asambleas se pierde bastante tiempo con el voto secreto y se ha decidido llevar a votación, cómo no, con voto secreto
		</div>
		</div>
		<div class="col-md-3 col-md-push-1 panel panel-default text-left">
			<ul class="list-group">
			<br>
				<li class="list-group-item list-group-item-success">Votos a favor <span class="badge">6</span></li>
			  	<li class="list-group-item list-group-item-danger">Votos en contra <span class="badge">6</span></li>
			  	<li class="list-group-item list-group-item-warning">Votos en blanco <span class="badge">6</span></li>
			  	<li class="list-group-item list-group-item-info">Votos nulos <span class="badge">6</span></li>
			<br>
			</ul>
		</div>
		<div class="col-md-7 col-md-push-1 panel panel-default">
			<h4>Estado de la votación: <strong>EN CURSO</strong></h4>
			<div class="progress">
				<div class="progress-bar progress-bar-success progress-bar-striped" style="width: 20%"></div>
			  	<div class="progress-bar progress-bar-danger progress-bar-striped" style="width: 25%"></div>
			  	<div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 15%"></div>
			  	<div class="progress-bar progress-bar-info progress-bar-striped" style="width: 35%"></div>
			</div><br>
			<div class="col-md-6">
				<ul class="list-group">
	  				<li class="list-group-item">Cantidad de votantes <span class="badge">14</span>
	  				</li>
	  				<li class="list-group-item">Cantidad de votos emitidos <span class="badge">12</span>
	  				</li>
				</ul>
			</div>
			<div class="col-md-6">
				<ul class="list-group">
				  	<li class="list-group-item">Comienzo <strong>12:00:00</strong> - Fin <strong>12:15:00</strong></li>
				  	<li class="list-group-item">Tiempo restante <strong>00:03:43</strong></li>
				</ul>
			</div>
			<br>
		</div>
	</div>
</div>
<?php include 'php/footer.php'; ?>
</body>
</html>