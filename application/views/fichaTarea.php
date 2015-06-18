<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Ficha Componente</title>
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
		<?php
			foreach ($datos as $item) { 
		?>
		<div class="row col-md-offset-1">
			<h3 class="color-letter">Ficha Tarea <a href="<?php echo base_url(); ?>index.php/editarTarea_controller/index/<?php echo $item -> idTareas?>" class="color-letter"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></h3>
			<hr>
		</div>
		<div class="col-md-2 col-xs-4 col-sm-3 col-md-offset-1 col-xs-offset-1">
			<b class="color-letter row">Nombre</b>
			<br>
			<?=$item -> Nombre?>
			<br>				
			<b class="color-letter row">Descripción</b>
			<br>	
			<?=$item -> Descripcion?>
			<br>	
			<b class="color-letter row">Fecha de Inicio</b>
			<br>
			<?=$item -> Fecha_Inicio?>
			<br>
			<b class="color-letter row">Fecha de Fin</b>
			<br>
			<?=$item -> Fecha_Fin?>
			<br>	
		</div>
		<div class="col-md-3 col-xs-7 col-sm-3 col-xs-offset-1 col-sm-offset-3 col-md-offset-3">
			<b class="color-letter row">ID Dron de la Tarea</b>
			<br>
			<?=$item -> idDron_tareas?>
			<br>
			<b class="color-letter row">Nombre y Apellidos Usuario</b>
			<br>
			<!--<?=$item -> Nombre?> <?=$item -> Apellidos?>-->	
			<b class="color-letter row">Resultado</b>
			<br>
			<?=$item -> Resultado?> 
			<br>
			<b class="color-letter row">Incidencia</b>
			<br>
			<?=$item -> idIncidencia_tareas?>
			<br>
		</div>					
	</div>
	<br>
	<br>
	<div class="row container-fluid">
		<div class="row col-md-3 col-xs-7 col-sm-3 col-md-offset-1 col-xs-offset-1">
			<h4><a class="color-letter" href="<?php echo base_url(); ?>index.php/calendar_controller/index"><span class="
glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span> <u>Tareas</u> </a></h4>
		</div>
		<div class="row col-md-3 col-xs-7 col-sm-3 col-md-offset-1 col-xs-offset-1 col-sm-offset-3 col-md-offset-3">
			<h4><a class="color-letter" href="<?php echo base_url(); ?>index.php/fichaTarea_controller/eliminarTarea/<?php echo $item -> idTareas?>"><span class="
glyphicon glyphicon-trash" aria-hidden="true"></span> <u>Eliminar Tarea</u> </a></h4>
		</div>
	</div>
	<?php
		}
	?>
</body>
</html>