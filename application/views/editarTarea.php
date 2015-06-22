<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Tareas</title>
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
			<li><a href="<?php echo base_url(); ?>index.php/profile_controller/index" class="color-letter">Perfil</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/inventoryDrones_controller/index" class="color-letter">Drones</a></li>
			<li><a href="#" class="color-letter">Normativa</a></li>
			<li><a href="#" class="color-letter">Vuelos</a></li>
		</ul>
	</nav>
	<div class="container-fluid">
		<div class="row col-md-offset-1">
			<h3 class="color-letter">Editar Tarea</h3>
			<hr>
		</div>
		<div class="row">
				<?= form_open_multipart("/editarTarea_controller/recibirdatos") ?>
			
			<div class = "col-md-1 col-xs-7 col-md-offset-1 col-xs-offset-2">
				<div class="form-group color-letter">
					<?= form_label('Nombre de la Tarea', 'nombre')?>
					<?= form_input('nombre')?>			
				</div>
				<div class="form-group color-letter">
					<?= form_label('Descripción', 'descripcion')?>
					<?= form_input('descripcion')?>		
				</div>
				<div class="form-group color-letter">
					<?= form_label('ID del Dron Actual', 'idDron')?>
					<br>
					<?php
			                if(!empty($drones)) {
			                	$desplegableDron[""] = "Ningún dron seleccionado";
			                	foreach ($drones as $item) {
			                		$desplegableDron[$item -> idDron] = $item -> idDron;
			                	}
			                } else {
			                	$desplegableDron = "";
			                }
					?>	
					<?= form_dropdown('idDron', $desplegableDron)?>		
				</div>
			</div>
			<div class = "col-md-2 col-xs-7 col-md-offset-6 col-xs-offset-2">
				<div class="form-group color-letter">
					<?= form_label('Fecha de Inicio', 'fechaInicio')?>
					<?php
						$datos = array(
				            'name'        => 'fechaInicio',
				            'placeholder' => ' yyyy-mm-dd'
			            );
					?>
					<?= form_input($datos)?>		
				</div>
				<br>
				<div class="form-group color-letter">
					<?= form_label('Fecha Tope', 'fechaTope')?>
					<?php
						$datos = array(
				            'name'        => 'fechaTope',
				            'placeholder' => ' yyyy-mm-dd'
			            );
					?>
					<?= form_input($datos)?>
				</div>
				<br>
				<div class="form-group color-letter">
					<?= form_label('Nombre del usuario', 'idUsuario')?>
					<br>
					<?php
			                if(!empty($usuarios)) {
			                	$desplegableUsuario[""] = "Ningún usuario seleccionado";
			                	foreach ($usuarios as $item) {
			                		$desplegableUsuario[$item -> DNI_Usuario] = $item -> Nombre_usuario . " " . $item -> Apellidos_usuario;
			                	}
			                } else {
			                	$desplegableUsuario[""] = "Ningún usuario disponible";
			                }
					?>	
					<?= form_dropdown('idUsuario', $desplegableUsuario)?>		
				</div>
				<br>
				<br>
			</div>
			<div class = "col-md-1 col-xs-7 col-md-offset-5 col-xs-offset-2">
				<div class='btn btn-default button-confirm color-letter'>
				<?php
					if($desplegableDron == "") {
				?>
						<a href="<?php echo base_url(); ?>index.php/addDron_controller/index">Inserte un Dron antes de continuar</a>
				<?php
					} else if($desplegableUsuario == "") {
				?>
						<a href="<?php echo base_url(); ?>index.php/addDron_controller/index">Inserte un Usuario antes de continuar</a>
				<?php
					} else {
				?>
						<?= form_submit('', 'Modificar')?>
				<?php
					}
				?>
				<?= form_close() ?> 
				</div>
				<br>
				<br>
				<a href="<?php echo base_url(); ?>index.php/calendar_controller/index" class="color-letter"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Volver atrás</a>
			
		</div>
	</div>
</body>
</html>