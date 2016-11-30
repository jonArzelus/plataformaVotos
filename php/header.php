<?php echo $_POST['pagina'] . " - " . $_SESSION['usuario']; ?>
<nav class="navbar navbar-default">
  <div class="container-fluid text-center">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Plataforma de votos</a>
    </div>
    <?php //numero de preguntas
    $sql = "SELECT ID FROM preguntas";
    $result = $db->query($sql);
    $numActivas = mysqli_num_rows($result);
    if(isset($_SESSION['universidadid'])) {
        $id = $_SESSION['universidadid'];
        $sql = "SELECT ID FROM preguntasconfig WHERE universidadID='$id'";
        $result = $db->query($sql);
        $numUni = mysqli_num_rows($result);
    } else {
        $numUni = 0;
    }
    ?>
    <ul class="nav navbar-nav">
    	<?php if($_POST['pagina']=="index") { ?>
     	<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;Inicio</a></li>
     	<?php } else { ?>
     	<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;Inicio</a></li>
     	<?php } ?>
     	<?php if($_POST['pagina']=="preguntas") { ?>
     	<li class="active"><a href="preguntas.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;&nbsp;Preguntas <span class="badge"><?php echo $numActivas; ?></span></a></li>
     	<?php } else { ?>
     	<li><a href="preguntas.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;&nbsp;Preguntas <span class="badge"><?php echo $numActivas; ?></span></a></li>
     	<?php } ?>
     	<?php if($_POST['pagina']=="vota") { ?>
     	<li class="active"><a href="vota.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;&nbsp;Vota <span class="badge"><?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']!="GUEST") echo $numUni; ?></span></a></li>
     	<?php } else { ?>
     	<li><a href="vota.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;&nbsp;Vota <span class="badge"><?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']!="GUEST") echo $numUni; ?></span></a></li>
     	<?php } ?>
     	<?php if($_POST['pagina']=="acerca") { ?>
     	<li class="active"><a href="acerca.php"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;&nbsp;Acerca de</a></li>
     	<?php } else { ?>
     	<li><a href="acerca.php"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;&nbsp;Acerca de</a></li>
     	<?php } ?>
    </ul>
    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']!="GUEST") { ?>
    <ul class="nav navbar-nav navbar-right">
        <?php if($_POST['pagina']=="configuracion") { ?>
        <li class="active"><a href="configuracion.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;&nbsp;Configuración</a></li>
        <?php } else { ?>
        <li><a href="configuracion.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;&nbsp;Configuración</a></li>
        <?php } ?>
    	<li><?php echo ('<a href="#" data-toggle="popover" data-placement="bottom" title="Datos de la sesión" data-content="Sesión iniciada en' . $_SESSION['conexion'] . ' IP actual ' . $_SESSION['ip'] . ' Última conexión' . $_SESSION['ultimaconexion'] . 'Última IP' . $_SESSION['ultimaip'] . '">Logueado como <strong>' . $_SESSION['usuario'] . '</strong></a>'); ?></li>
        <li><a href="php/logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp;&nbsp;Logout</a></li>
    </ul>
    <?php } else { ?>
    <?php if($_POST['pagina']=="login") { ?>
     	<ul class="nav navbar-nav navbar-right">
     		<li><a href="#" style="pointer-events: none;">Sin iniciar sesión</a></li>
    		<li class="active"><a href="login.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp;&nbsp;Login</a></li>
    	</ul>
     	<?php } else { ?>
     	<ul class="nav navbar-nav navbar-right">
     		<li><a href="#" style="pointer-events: none;">Sin iniciar sesión</a></li>
    		<li><a href="login.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp;&nbsp;Login</a></li>
    	</ul>
     	<?php } ?>
    <p class="navbar-text"></p>
    <?php } ?>
  </div>
</nav>