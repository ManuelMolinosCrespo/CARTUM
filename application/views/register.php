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
		<div class="col-md-5 col-xs-4 col-xs-offset-2 col-md-offset-5">
			<?php
				$usuario = array(
					'name' => 'dni_usuario',
					'placeholder' => 'Ingresa tu DNI'
				);
				$nombre = array(
					'name' => 'nombre',
					'placeholder' => 'Ingresa tu nombre'
				);
				$apellidos = array(
					'name' => 'apellidos',
					'placeholder' => 'Ingresa tus apellidos'
				);
				$correo = array(
					'name' => 'correo',
					'placeholder' => 'Ingresa tu correo electrónico'
				);
				$password = array(
					'name' => 'password',
					'placeholder' => 'Ingresa tu contraseña'
				);
				$telefono = array(
					'name' => 'telefono',
					'placeholder' => 'Ingresa tu número de teléfono'
				);
			?>
			<?= form_open("/register_controller/recibirdatos") ?>
			<div class="form-group">
				<?= form_label('DNI Usuario', 'dni_usuario')?>
				<?= form_input($usuario)?>
			</div>
			<br>
			<div class="form-group">
				<?= form_label('Nombre', 'nombre')?>
				<?= form_input($nombre)?>
			</div>
			<br>
			<div class="form-group">
				<?= form_label('Apellidos', 'apellidos')?>
				<?= form_input($apellidos)?>
			</div>
			<br>
			<div class="form-group">
				<?= form_label('Correo Electrónico', 'correo')?>
				<?= form_input($correo)?>
			</div>
			<br>
			<div class="form-group">
				<?= form_label('Contraseña', 'contraseña')?>
				<?= form_password($password)?>
			</div>
			<br>
			<div class="form-group">
				<?= form_label('Teléfono', 'telefono')?>
				<?= form_input($telefono)?>
			</div>
			<br>
			<div class='btn btn-default button-confirm col-md-offset-2 col-xs-offset-2 color-letter'>
				<?= form_submit('', 'Registrarse') ?>
				<?= form_close() ?> 
			</div>
		</div>
	</div>
</body>
</html>