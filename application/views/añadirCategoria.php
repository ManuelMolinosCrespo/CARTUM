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
			<?php
				$categoria = array(
					'name' => 'dni_usuario',
					'placeholder' => 'Ingresa tu DNI'
				);
			?>
			<?= form_open("/anadirCategoria_controller/recibirdatos") ?>
			<div class="form-group">
				<?= form_label('Nombre Categoria', 'nombre_categoria')?>
				<?= form_input($categoria)?>
			</div>
			<br>
			<div class="form-group">
    			<?= form_submit('', 'Registrarse')?>
				<?= form_close()?> 
			</div>
		</div>
	</div>
</body>
</html>