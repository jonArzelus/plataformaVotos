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
	<form>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Introduce email">
    </div>
    <div class="form-group">
      <label for="pwd">Contraseña:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Introduce contraseña">
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