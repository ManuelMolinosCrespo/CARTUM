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
			<li><a href="<?php echo base_url(); ?>index.php/calendar_controller/index" class="color-letter">Calendario</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/profile_controller/index" class="color-letter">Perfil</a></li>
			<li><a href="#" class="color-letter">Drones</a></li>
			<li><a href="#" class="color-letter">Mantenimiento</a></li>
			<li><a href="#" class="color-letter">Normativa</a></li>
			<li><a href="#" class="color-letter">Vuelos</a></li>
		</ul>
	</nav>
	<div class="container-fluid">
		<div class="row col-md-offset-1">
			<h3 class="color-letter">Añadir Componente</h3>
			<hr>
		</div>
		<div class="row">


	<?= form_open_multipart("/addComponent_controller/recibirdatos") ?>	
			<div class = "col-md-2 col-xs-7 col-md-offset-1 col-xs-offset-2">
				<div class="form-group color-letter">
					<?= form_label('Foto', 'foto')?>
					 <label>Imagen Componente:</label><input type="file" name="userfile" /><br /><br />
						
				</div>
				<div class="form-group color-letter">
					<?= form_label('Nombre del Comp.', 'nombre')?>
					<?= form_input('nombre')?>			
				</div>
				<div class="form-group color-letter">
					<?= form_label('Fabrica del Comp.', 'fabricante')?>
					<?= form_input('fabricante')?>		
				</div>
				<div class="form-group color-letter">
					<?= form_label('Categoría del Comp.', 'categoria')?>
					<?= form_input('categoria')?>		
				</div>
				<div class="form-group color-letter">
					<?= form_label('Prestaciones del Comp.', 'prestaciones')?>
					<?= form_input('prestaciones')?>	
				</div>
			</div>
			<div class="col-md-3 col-xs-6 col-md-offset-4 col-xs-offset-2">	
				<div class="form-group color-letter">
					<?= form_label('Peso del Componente', 'peso')?>
					<?= form_input('peso')?>		
				</div>
				<div class="form-group color-letter">
					<?= form_label('Estado del Componente', 'estado')?>
					<?= form_input('estado')?>		
				</div>
				<div class="form-group color-letter">
					<?= form_label('Fecha de la Compra', 'fechaCompra')?>
					<?= form_input('fechaCompra')?>		
				</div>
				<div class="form-group color-letter">
					<?= form_label('Fecha de su Retirada', 'fechaRetirada')?>
					<?= form_input('fechaRetirada')?>	
				</div>
				<br>
				<div class='btn btn-default button-confirm color-letter'>
				<?= form_submit('', 'Añadir') ?>
				<?= form_close() ?> 
				</div>
				<br>
				<br>
				<a href="<?php echo base_url(); ?>index.php/fichaComponente_controller/index" class="color-letter"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Volver atrás</a>
			</div>
		</div>
	</div>
</body>
</html>