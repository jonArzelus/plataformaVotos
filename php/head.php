<?php include(dirname(__FILE__).'/../db/dbOpen.php'); session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <?php if($_POST['pagina'] == "index") { ?>
	<title>Inicio</title>
    <?php } else if($_POST['pagina'] == "preguntas") { ?>
    <title>Preguntas activas</title>
    <?php } else if($_POST['pagina'] == "vota") { ?>
    <title>Vota</title>
    <?php } else if($_POST['pagina'] == "acerca") { ?>
    <title>Acerca de</title>
    <?php } else if($_POST['pagina'] == "login") { ?>
    <title>Login</title>
    <?php } ?>
	<link rel="icon" type="image/png" href="img/logo.png">
    <link rel='stylesheet' type='text/css' href='css/bootstrap.css' />
    <link rel='stylesheet' type='text/css' href='css/bootstrap-theme.css' />
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/npm.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <style>
    * {
    	border:none;
    }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
        });
    </script>
<?php
//$_SESSION['usuario'] = "GUsEST";
?>