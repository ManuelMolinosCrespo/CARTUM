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
			<li><a href="<?php echo base_url(); ?>index.php/calendar_controller/index" class="color-letter">Calendario</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/profile_controller/index" class="color-letter">Perfil</a></li>
			<li><a href="#" class="color-letter">Drones</a></li>
			<li><a href="#" class="color-letter">Mantenimiento</a></li>
			<li><a href="#" class="color-letter">Normativa</a></li>
			<li><a href="#" class="color-letter">Vuelos</a></li>
		</ul>
	</nav>
	<div class="container-fluid">
		<?php
			foreach ($datos as $item) { 
		?>
		<div class="row col-md-offset-1">
			<h3 class="color-letter">Ficha Componente <a href="<?php echo base_url(); ?>index.php/editarComponente_controller/index/<?php echo $item -> idComponente?>" class="color-letter"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></h3>
			<hr>
		</div>
		<div class = "col-md-2 col-xs-4 col-md-offset-1 col-xs-offset-1">
			<img src="<?= $item -> FotoURL_componente ?>" class="img-responsive">
		</div>
		<div class="col-md-2 col-xs-4 col-sm-3 col-md-offset-1 col-xs-offset-1">
			<b class="color-letter row">Nombre</b>
			<br>
			<?=$item -> Nombre_componente?>
			<br>				
			<b class="color-letter row">Fabricante</b>
			<br>	
			<?=$item -> Fabricante_componente?>
			<br>	
			<b class="color-letter row">Categoría</b>
			<br>
			<?=$item -> Nombre_categoria?>
			<br>
			<b class="color-letter row">Prestaciones</b>
			<br>
			<?=$item -> Prestaciones_componente?>
			<br>
			<b class="color-letter row">Peso</b>
			<br>
			<?=$item -> Peso_componente?>
			<br>
			<b class="color-letter row">Horas de vuelo</b>
			<br>
			<?=$item -> Horas_Vuelo_componente?>		
		</div>
		<div class="col-md-3 col-xs-7 col-sm-3 col-xs-offset-1 col-sm-offset-3 col-md-offset-3">
			<b class="color-letter row">Estado</b>
			<br>
			<?=$item -> Estado_componente?> 
			<br>
			<b class="color-letter row">Fecha de Compra</b>
			<br>
			<?=$item -> Fecha_Compra?>
			<br>
			<b class="color-letter row">Fecha de Retirada</b>
			<br>
			<?=$item -> Fecha_Retirada?>
			<br>
			<b class="color-letter row">ID Dron Equipado</b>
			<br>
			<?=$item -> idDronActual?>
			<br>
			<b class="color-letter row">Activo o Inactivo</b>
			<br>	
			<?=$item -> Activo_Inactivo?>
			<br>
			<b class="color-letter row">Número de Vuelos Realizados</b>
			<br>
			<?=$item -> Numero_Vuelos_Realizados_componente?>
		</div>					
	</div>
	<br>
	<br>
	<div class="row container-fluid">
		<div class="row col-md-3 col-xs-7 col-sm-3 col-md-offset-1 col-xs-offset-1">
			<h4><a class="color-letter" href="<?php echo base_url(); ?>index.php/inventory_controller/index"><span class="
glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span> <u>Inventario</u> </a></h4>
		</div>
		<div class="row col-md-3 col-xs-7 col-sm-3 col-md-offset-1 col-xs-offset-1 col-sm-offset-3 col-md-offset-3">
			<h4><a class="color-letter" href="<?php echo base_url(); ?>index.php/fichaComponente_controller/eliminarComponente/<?php echo $item -> idComponente?>"><span class="
glyphicon glyphicon-trash" aria-hidden="true"></span> <u>Eliminar Componente</u> </a></h4>
		</div>
	</div>
	<?php
		}
	?>
</body>
</html>