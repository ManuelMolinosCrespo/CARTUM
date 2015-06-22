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
			<h3 class="color-letter">Incidencia de la tarea</h3>
			<hr>
		</div>
		<div class="row">
				<?= form_open_multipart("/incidenciaTarea_controller/recibirdatos") ?>
			
			<div class = "col-md-1 col-xs-7 col-md-offset-1 col-xs-offset-2">
				<div class="form-group color-letter">
					<?= form_label('Fecha de la Incidencia', 'fechaIncidencia')?>
					<?php
						$datos = array(
				            'name'        => 'fechaIncidencia',
				            'placeholder' => ' yyyy-mm-dd'
			            );
					?>
					<?= form_input($datos)?>		
				</div>
				<br>
				<div class="form-group color-letter">
					<?= form_label('Incidencia', 'incidencia')?>
					<br>
					<?php
						foreach ($datos as $item) {
							$resumen = $item -> Resumen;
							$descripcion = array(
				           		'name'  => 'resumen',
				           		'value' => $resumen
			           		);
						}
			           
					?>	
					<?= form_textarea('incidencia', $descripcion)?>		
				</div>
				<br>
				<br>
			</div>
			<div class = "col-md-1 col-xs-7 col-md-offset-5 col-xs-offset-2">
				<div class='btn btn-default button-confirm color-letter'>
					<?= form_submit('', 'Modificar')?>
					<?= form_close() ?> 
				</div>
				<br>
				<br>
				<a href="<?php echo base_url(); ?>index.php/fichaTarea_controller/index/<?php $this->uri->segment(3)?>" class="color-letter"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Volver atrás</a>
			
		</div>
	</div>
</body>
</html>