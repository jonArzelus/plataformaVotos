<?php 
$_POST['pagina'] = "login"; 
include 'php/head.php';
?>
</head>
<body>
<?php include 'php/header.php'; ?>
<div class="container-fluid">
	<div class="panel panel-default col-md-6 col-md-push-3">
	<div class="panel-body">
	<form action="login-db.php" method="post" enctype=" multipart/form-data">
        <div class="form-group">
            <label for="user">Usuario:</label>
            <input type="text" class="form-control" name="user" id="user" placeholder="Introduce el usuario">
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Introduce la contraseña">
        </div>
        <div class="checkbox">
            <label><input type="checkbox"> Recordar mis credenciales</label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-default">Login</button>
        </div>
    </form>
    </div>
    </div>
</div>
<?php include 'php/footer.php'; ?>
</body>
</html>