<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Componentes del Dron</title>
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
			<li><a href="<?php echo base_url(); ?>index.php/inventoryDrones_controller/index" class="color-letter">Inventario</a></li>
			<li><a href="#" class="color-letter">Normativa</a></li>
			<li><a href="#" class="color-letter">Vuelos</a></li>
		</ul>
	</nav>
	<div class="container-fluid">
		<div class="row col-md-offset-1">
			<h3 class="color-letter">Componentes del Dron</h3>
			<hr>
		</div>
		<div class="row table-responsive col-md-offset-2 col-xs-offset-1 col-md-9">
			<table class="table table-condensed">
				<tr>
					<td><b>Categoría</b></td>
					<td><b>Nombre</b></td>
					<td><b>Estado</b></td>
					<td><b>Ficha</b></td>
				</tr>
				<?php
					if(!empty($datos)) {
						foreach ($datos as $item) { 
				?>
					<tr>
					<td> <?=$item -> Nombre_categoria?> </td> 
					<td> <?=$item -> Nombre_componente?> </td> 
					<td> <?=$item -> Estado_componente?> </td> 
					<td> <a href="<?php echo base_url(); ?>index.php/fichaComponente_controller/recibirdatos/<?php echo $item -> idComponente?>" class="color-letter"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a> </td>
					</tr>
				<?php
						}
					}
				?>
			</table>
		</div>
	</div>
	<div class="row col-md-offset-1">
		<a href="<?php echo base_url(); ?>index.php/fichaDron_controller/recibirdatos/<?php echo $this->uri->segment(3);?>" class="color-letter"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Volver atrás</a>
	</div>
</body>
</html>