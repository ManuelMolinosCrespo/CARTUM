<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Inventario</title>
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
			<li><a href="#" class="color-letter">Calendario</a></li>
			<li><a href="#" class="color-letter">Perfil</a></li>
			<li><a href="#" class="color-letter">Drones</a></li>
			<li><a href="#" class="color-letter">Mantenimiento</a></li>
			<li><a href="#" class="color-letter">Normativa</a></li>
			<li><a href="#" class="color-letter">Vuelos</a></li>
		</ul>
	</nav>
	<div class="container-fluid">
		<div class="row col-md-offset-1">
			<h3 class="color-letter">Inventario</h3>
			<hr>
		</div>
		<div class="row table-responsive col-md-offset-2 col-xs-offset-1 col-md-9">
			<table class="table table-condensed">
				<tr>
					<td><b>Categoría</b></td>
					<td><b>Nombre</b></td>
					<td><b>Estado</b></td>
					<td><b>ID Dron Equipado</b></td>
					<td><b>Ficha</b></td>
				</tr>
				<?php
					foreach ($datos as $item) { 
				?>
					<tr>
					<td> <?=$item -> Nombre?> </td> 
					<td> <?=$item -> Nombre?> </td> 
					<td> <?=$item -> Estado?> </td> 
					<td> <?=$item -> idDronActual?> </td>
					</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>