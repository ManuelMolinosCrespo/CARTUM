<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Editar Dron</title>
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
			<li><a href="<?php echo base_url(); ?>index.php/inventory_controller/index" class="color-letter">Inventario</a></li>
			<li><a href="#" class="color-letter">Normativa</a></li>
			<li><a href="#" class="color-letter">Vuelos</a></li>
		</ul>
	</nav>
	<div class="container-fluid">
		<div class="row col-md-offset-1">
			<h3 class="color-letter">Editar Dron</h3>
			<hr>
		</div>
		<div class="row">


	<?= form_open_multipart("/editarDron_controller/recibirdatos/") ?>	
			<div class = "col-md-2 col-xs-7 col-md-offset-1 col-xs-offset-2">
				<div class="form-group color-letter">
					<?= form_label('Foto', 'foto')?>
					 <label>Imagen Dron:</label><input type="file" name="userfile" /><br /><br />
						
				</div>
				<div class="form-group color-letter">
					<?= form_label('Nombre del Dron', 'nombre')?>
					<?= form_input('nombre')?>			
				</div>
				<br>
				<div class="form-group color-letter">
					<?= form_label('Fabricante del Dron', 'fabricante')?>
					<?= form_input('fabricante')?>		
				</div>
				<div class="form-group color-letter">
					<?= form_label('Categoría del Dron', 'categoria')?>
					<?= form_input('categoria')?>	
				</div>
				<br>
				<div class="form-group color-letter">
					<?= form_label('Prestaciones del Dron', 'prestaciones')?>
					<?= form_input('prestaciones')?>	
				</div>
			</div>
			<div class="col-md-3 col-xs-6 col-md-offset-4 col-xs-offset-2">	
				<div class="form-group color-letter">
					<?= form_label('Peso del Dron', 'peso')?>
					<?= form_input('peso')?>		
				</div>
				<br>
				<div class="form-group color-letter">
					<?= form_label('Estado del Dron', 'estado')?>	
					<?php
						$opciones = array(
							'0' => 'Inactivo',
			                '1' => 'Activo',    
	               		);
					?>
					<?= form_dropdown('estado', $opciones)?>
				</div>
				<br>
				<div class="form-group color-letter">
					<?= form_label('Fecha del Montaje', 'fechaMontaje')?>
					<?php
						$datos = array(
				            'name'        => 'fechaMontaje',
				            'placeholder' => ' yyyy-mm-dd'
			            );
					?>
					<?= form_input($datos)?>		
				</div>
				<br>
				<div class="form-group color-letter">
					<?= form_label('Fecha de su Retirada', 'fechaRetirada')?>
					<?php
						$datos = array(
				            'name'        => 'fechaRetirada',
				            'placeholder' => ' yyyy-mm-dd'
			            );
					?>
					<?= form_input($datos)?>	
				</div>
				<br>
				<div class='btn btn-default button-confirm color-letter'>
				<?= form_submit('', 'Modificar') ?>
				<?= form_close() ?> 
				</div>
				<br>
				<br>
				<a href="<?php echo base_url(); ?>index.php/fichaDron_controller/recibirdatos/<?php echo $this->uri->segment(3)?>" class="color-letter"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Volver atrás</a>
			</div>
		</div>
	</div>
</body>
</html>