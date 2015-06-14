<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Calendario</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
      rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>css/style.css"
      rel="stylesheet" type="text/css">
      <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
</head>
<body>
	<div class="row">
		<div class="col-md-1 no-float img-responsive">
			<img src="<?php echo base_url(); ?>img/ULE_Logo.png">
		</div>
	</div>
	<nav>
		<ul class="nav nav-pills nav-justified">
			<li><a href="<?php echo base_url(); ?>index.php/profile_controller/index" class="color-letter">Perfil</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/inventory_controller/index" class="color-letter">Inventario</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/inventoryDrones_controller/index" class="color-letter">Drones</a></li>
			<li><a href="#" class="color-letter">Mantenimiento</a></li>
			<li><a href="#" class="color-letter">Normativa</a></li>
			<li><a href="#" class="color-letter">Vuelos</a></li>
		</ul>
	</nav>
	<div class="container clearfix">	
		<div class="responsive-iframe-container">
			<iframe src="https://www.google.com/calendar/embed?src=unileon.es_27bqbqavp9hmqc43ciqvqkrvcs%40group.calendar.google.com&ctz=Europe/Madrid" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
		</div> 
		
		<div class="container-fluid">
			<h3 class="color-letter">Tareas Pendientes</h3>
			<hr>
		</div>
		<a href="#" class="btn btn-default button-confirm col-md-offset-2 col-xs-offset-2 color-letter" type="button">Editar Tareas</a>
		<a href="<?php echo base_url()?>/index.php/addTarea_controller/index" class="btn btn-default button-confirm col-md-offset-2 col-xs-offset-2 color-letter" type="button">Agregar Tareas</a>
		<a href="#" class="btn btn-default button-confirm col-md-offset-2 col-xs-offset-2 color-letter" type="button">Eliminar Tareas</a>
	</div>
</body>
</html>