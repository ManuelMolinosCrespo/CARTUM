<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Añadir Categoría</title>
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
	<div class="container">
		<div class="col-md-5 col-xs-4 col-xs-offset-2 col-md-offset-5">
			<?= form_open("/categoria_controller/insertarDatos") ?>
			<div class="form-group">
				<?= form_label('Nombre Categoria')?>
				<?= form_input('nombre_categoria')?>
			</div>
			<br>
			<div class="form-group">
    			<?= form_submit('', 'Añadir')?>
			</div>
			<?= form_close()?> 
			<br>
			<?= form_open("/categoria_controller/eliminarDatos") ?>
			<div class="form-group">
			<?php
		        if(!empty($categorias)) {
		           	foreach ($categorias as $item) {
	             		$desplegable[$item -> idCategoria] = $item -> Nombre_categoria;
                	}
                }
                if(!empty($desplegable)) {
            ?>
            <?= form_dropdown('categoria', $desplegable)?>
           	</div>
			<br>
			<div class="form-group">
    			<?= form_submit('', 'Eliminar')?>
				<?= form_close()?> 
			</div>
            <?php
                }
			?>	
			<br>
			<br>
			<a href="<?php echo base_url(); ?>index.php/inventory_controller/index" class="color-letter"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Volver atrás</a>
		</div>
	</div>
</body>
</html>