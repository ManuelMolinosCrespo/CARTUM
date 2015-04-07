<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
      rel="stylesheet" type="text/css">
      <link href="css/style.css"
      rel="stylesheet" type="text/css">
      <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
</head>
<body>
	<div class="row">
		<div class="col-md-1 no-float img-responsive">
			<img src="img/ULE_Logo.png">
		</div>
	</div>
	<div class="container">
		<div class="col-md-3 col-xs-8 col-xs-offset-2 col-md-offset-5 box-login">
			<div class="margin-box">
				<div class="form-group">
					<label for="inputUser" class="color-letter">Usuario</label>
					<input type="text" class="form-control" id="inputUser" placeholder="Nombre de Usuario">
				</div>
				<br>
				<div class="form-group">
					<label for="inputPassword" class="color-letter">Contraseña</label>
					<input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
				</div>
				<input class="btn btn-default button-confirm col-md-offset-4 col-xs-offset-4 color-letter" type="button" value="Entrar">
			</div>
		</div>
	</div>
</body>
</html>