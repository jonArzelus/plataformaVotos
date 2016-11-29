<?php 
$_POST['pagina'] = "preguntas"; 
include 'php/head.php';
?>
</head>
<body>
<?php include 'php/header.php'; ?>
<div class="container-fluid">
<div class="text-center">
		<h1>Preguntas</h1><br><br>
<?php
//hacer la consulta sql para coger todas las Preguntas
$sql = "SELECT * FROM preguntas";
$result = $db->query($sql);
if($result) {
	//generar un item por cada pregunta de la base de datos
	while ($fila = $result->fetch_assoc()) {
	$id = $fila['ID'];
	//ver la cantidad de convocados
	$sql1 = "SELECT * FROM preguntasconfig WHERE preguntaID='$id'";
	$datosconv = $db->query($sql1);
	$convocados = mysqli_num_rows($datosconv);
	$conv = $datosconv->fetch_assoc();
	$favor = 0;
	$contra = 0;
	$abstencion = 0;
	$nulo = 0;
	$total = 0;
	//echo $id;
	$sql1 = "SELECT * FROM resultadosfcan WHERE preguntaID='$id'";
	$datosresult = $db->query($sql1);
	if($datosresult) {
	while($votos = $datosresult->fetch_assoc()) {
		if($votos['Voto1']=="FAV") {
			$favor = $favor+1;
		} else if($votos['Voto1']=="CON") {
			$contra = $contra+1;
		} else if($votos['Voto1']=="ABS") {
			$abstencion = $abstencion+1;
		} else {
			$nulo = $nulo+1;
		}
		if($votos['Voto2']=="FAV") {
			$favor = $favor+1;
		} else if($votos['Voto2']=="CON") {
			$contra = $contra+1;
		} else if($votos['Voto2']=="ABS") {
			$abstencion = $abstencion+1;
		} else {
			$nulo = $nulo+1;
		}
		if($votos['Voto3']=="FAV") {
			$favor = $favor+1;
		} else if($votos['Voto3']=="CON") {
			$contra = $contra+1;
		} else if($votos['Voto3']=="ABS") {
			$abstencion = $abstencion+1;
		} else {
			$nulo = $nulo+1;
		}
	}
	$total = $favor+$contra+$abstencion+$nulo;
	if(($conv['fechaPregunta']==date("Y-m-d")) && ($conv['horaComienzo']<=date("H:i:s")) && ($conv['horaFin']>=date("H:i:s"))) {
		$estado = "encurso";
	} else if($conv['fechaPregunta']>date("Y-m-d")) {
		$estado = "nuevo";
	} else {
		if($favor>$contra) {
			$estado = "aprobado";
		} else if($contra>$favor) {
			$estado = "rechazado";
		} else {
			$estado = "otro";
		}
	}
	} else {
		$favor = 0;
		$contra = 0;
		$abstencion = 0;
		$nulo = 0;
		$total = 0;
		$estado = "otro";
	}
	?>
		<div class="container-fluid well"><br>
		<div class="row">
			<div class="col-md-10 col-md-push-1 panel panel-default">
				<h4><?php echo $fila['Pregunta'] ?>  
				<?php
				if($estado=="aprobado") {
					echo('<span class="label label-success">Aprobado</span>');
				} else if($estado=="rechazado") {
					echo('<span class="label label-danger">Rechazado</span>');
				} else if($estado=="encurso") {
					echo('<span class="label label-warning">En curso</span>');
				} else if($estado="nuevo") {
					echo('<span class="label label-default">Nuevo</span>');
				}
				?></h4> 
				<div class="text-left">
					<p><?php echo $fila['Descripcion'] ?></p>
					<p>Orígen: <strong><?php echo $fila['Origen'] ?></strong> - Lugar: <strong><?php echo $fila['Lugar'] ?></strong> - Fecha: <strong><?php echo $fila['Fecha'] ?></strong> - Hora: <strong><?php echo $fila['Hora'] ?></strong></p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php echo('<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#' . $id . '">Resultados de la votación</button>'); ?>
			<p></p>
		</div>
		<div class="row">
			<?php echo('<div id="' . $id . '" class="collapse">'); ?>
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
					<?php 
					if($estado=="encurso") {
						echo('<h4>Estado de la votación: <strong>EN CURSO</strong></h4>'); 
					} else {
						echo('<h4>Estado de la votación: <strong>FINALIZADO</strong></h4>'); 
					}
					?>
					<div class="progress">
						<?php echo('<div class="progress-bar progress-bar-success progress-bar-striped" style="width: ' . ($favor/($convocados*3))*100 .'%"></div>'); ?>
					  	<?php echo('<div class="progress-bar progress-bar-danger progress-bar-striped" style="width: ' . ($contra/($convocados*3))*100 . '%"></div>'); ?>
					  	<?php echo('<div class="progress-bar progress-bar-warning progress-bar-striped" style="width: ' . ($abstencion/($convocados*3))*100 . '%"></div>'); ?>
					  	<?php echo('<div class="progress-bar progress-bar-info progress-bar-striped" style="width: ' . ($nulo/($convocados*3))*100 . '%"></div>'); ?>
					</div><br>
					<div class="col-md-6">
						<ul class="list-group">
			  				<li class="list-group-item">Cantidad de votantes <span class="badge"><?php echo $convocados ?></span>
			  				</li>
			  				<li class="list-group-item">Cantidad de votos emitidos <span class="badge"><?php echo $total ?></span>
			  				</li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="list-group">
						  	<?php echo('<li class="list-group-item">Comienzo <strong>' . $conv['horaComienzo'] .'</strong> - Fin <strong>' . $conv['horaFin'] .'</strong></li>'); ?>
						  	<?php 
						  	if($estado=="encurso") {
						  		$t = strtotime($conv['horaFin'])-strtotime(date("H:i:s"));
						  		echo('<li class="list-group-item">Fecha: <strong>' . $conv['fechaPregunta'] .'</strong> - Tiempo restante <strong>' . sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60) . '</strong></li>'); 
						  	} else {
						  		$t = strtotime($conv['horaFin'])-strtotime($conv['horaComienzo']);
						  		echo('<li class="list-group-item">Fecha: <strong>' . $conv['fechaPregunta'] .'</strong> - Tiempo restante <strong>' . sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60) . '</strong></li>');
						  	}
						  	?>
						</ul>
					</div>
					<br>
				</div>
			</div>
		</div>
		</div>
<?php
	}
} else { ?>
<div class="col-md-6 col-md-push-3 alert alert-info" role="alert">No hay preguntas por el momento.</div>
<?php } ?>
</div>
</div>
<?php include 'php/footer.php'; ?>
</body>
</html>