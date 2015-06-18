<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Perfil</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
      rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>css/style.css"
      rel="stylesheet" type="text/css">
      <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
</head>
<body>
	<div class="row">
		<div class="col-md-1 img-responsive">
			<img src="<?php echo base_url(); ?>img/ULE_Logo.png">
		</div>
	</div>
	<nav>
		<ul class="nav nav-pills nav-justified">
			<li><a href="<?php echo base_url(); ?>index.php/calendar_controller/index" class="color-letter">Tareas</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/inventory_controller/index" class="color-letter">Inventario</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/inventoryDrones_controller/index" class="color-letter">Drones</a></li>
			<li><a href="#" class="color-letter">Normativa</a></li>
			<li><a href="#" class="color-letter">Vuelos</a></li>
		</ul>
	</nav>
	<div class="container-fluid">
		<div class="row col-md-offset-1">
			<h3 class="color-letter">Información personal <a href="<?php echo base_url(); ?>index.php/editProfile_controller/index" class="color-letter"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></h3>
			<hr>
		</div>
		<div class="row">
			<?php
				if(!empty($datos)) {
					foreach ($datos as $item) { 
			?>
			<div class = "col-md-2 col-xs-7 col-md-offset-1 col-xs-offset-2">
				<img src="<?= $item -> FotoURL_usuario ?>" class="img-responsive">
			</div>
			<div class="col-md-3 col-xs-6 col-xs-offset-4">
				<br>
				<br>
				<b class="color-letter row">Nombre y Apellidos</b>
				<br>
				<?=$item -> Nombre_usuario?>  <?=$item -> Apellidos_usuario?>
				<br>				
				<b class="color-letter row">Correo Electrónico</b>
				<br>	
				<?=$item -> Correo_Electronico?>
				<br>	
				<b class="color-letter row">Rango de Usuario</b>
				<br>
				<b class="color-letter row">Teléfono</b>
				<br>
				<?=$item -> Telefono_usuario?>
				<br>
				<br>
				<br>
				<?php
						}
					}
				?>
			</div>
		</div>
		<div class="col-md-offset-7 col-xs-offset-3 color-letter">
			<h4><a class="color-letter" href="<?php echo base_url(); ?>index.php/profile_controller/borrarUsuario/ "><span class="
			glyphicon glyphicon-trash" aria-hidden="true"></span> <u>Eliminar Usuario</u> </a></h4>
		</div>
		<br>
		<br>
		<input class="row btn btn-default button-confirm col-md-offset-7 col-xs-offset-3 color-letter" type="button" value="Historial Tareas y Vuelos">
	</div>
</body>
</html>