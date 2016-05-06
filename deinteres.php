<?php 
	require_once __DIR__ . "/src/App.php";
 ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<link rel="stylesheet"  href="<?php echo getCSSPath()?>style.css" type="text/css" />
	</head>
	<body>
		<div id="contenedor">
			<?php
				require('includes/cabecera.php');
				require('includes/contenidoInteres.php');
				require('includes/sidebar.php');
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>