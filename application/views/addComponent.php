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
			<li><a href="<?php echo base_url(); ?>index.php/calendar_controller/index" class="color-letter">Tareas</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/profile_controller/index" class="color-letter">Perfil</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/inventoryDrones_controller/index" class="color-letter">Drones</a></li>
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
					<label>Imagen del Componente :</label><input type="file" name="userfile" /><br /><br />			
				</div>
				<div class="form-group color-letter">
					<?= form_label('ID del Componente', 'idComponente')?>
					<?= form_input('idComponente')?>			
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
					<?= form_label('Categoría del Componente', 'categoria')?>
					<br>
					<?php
			                if(!empty($categorias)) {
			                	foreach ($categorias as $item) {
			                		$desplegable[$item -> idCategoria] = $item -> Nombre_categoria;
			                	}
			                } else {
			                	$desplegable = "";
			                }
					?>	
					<?= form_dropdown('categoria', $desplegable)?>	
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
				<br>
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
			                	$desplegableDron[""] = "Ningún dron Disponible";
			                }
					?>	
					<?= form_dropdown('idDron', $desplegableDron)?>		
				</div>
				<br>
				<div class="form-group color-letter">
					<?= form_label('Estado del Componente', 'estado')?>	
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
					<?= form_label('Fecha de la Compra', 'fechaCompra')?>
					<?php
						$datos = array(
				            'name'        => 'fechaCompra',
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
				<?php
					if($desplegable == "") {
				?>
						<a href="<?php echo base_url(); ?>index.php/categoria_controller/index">Inserte una categoria antes de continuar</a>
				<?php
				} else {
				?>
				<?= form_submit('', 'Añadir')?>
				<?php
					}
				?>
				
				<?= form_close() ?> 
				</div>
				<br>
				<br>
				<a href="<?php echo base_url(); ?>index.php/inventory_controller/index" class="color-letter"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Volver atrás</a>
			</div>
		</div>
	</div>
</body>
</html>