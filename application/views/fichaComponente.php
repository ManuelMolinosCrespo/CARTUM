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
			<h3 class="color-letter">Ficha Componente</h3>
			<hr>
		</div>
		<div class="row table-responsive col-md-offset-2 col-xs-offset-1 col-md-9">
			<table class="table table-condensed">
			<?php
				foreach ($datos as $item) { 
			?>
				<td>
				<tr><b>Nombre</b></tr>
				<tr> <?=$item -> Nombre_componente?> </tr>
				<tr><b>Fabricante</b></tr>
				<tr> <?=$item -> Fabricante_componente?> </tr>
				<tr><b>Categoría</b></tr>
				<tr> <?=$item -> Nombre_categoria?> </tr>
				<tr><b>Prestaciones</b></tr>
				<tr> <?=$item -> Prestaciones_componente?> </tr>
				<tr><b>Peso</b></tr>
				<tr> <?=$item -> Peso_componente?> </tr>
				<tr><b>Horas de vuelo</b></tr>
				<tr> <?=$item -> Horas_Vuelo_componente?> </tr>
				<tr><b>Estado</b></tr>
				<tr> <?=$item -> Estado_componente?> </tr>
				<tr><b>Fecha de Compra</b></tr>
				<tr> <?=$item -> Fecha_Compra?> </tr>
				<tr><b>Fecha de Retirada</b></tr>
				<tr> <?=$item -> Fecha_Retirada?> </tr>
				<tr><b>ID Dron Equipado</b></tr>
				<tr> <?=$item -> idDronActual?> </tr>
				<tr><b>Activo o Inactivo</b></tr>
				<tr> <?=$item -> Activo/Inactivo?> </tr>
				<tr><b>Número de Vuelos Realizados</b></tr>
				<tr> <?=$item -> Numero_Vuelo_Realizados_componente?> </tr>
				</td>
			<?php
				}
			?>
			</table>
		</div>
	</div>
</body>
</html>