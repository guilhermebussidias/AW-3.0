<?php
	require_once __DIR__ . "/src/App.php";
	$rol = getRole();
	$name = getName();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>
		<link rel="stylesheet"  href="<?=getCSSPath()?>contenido.css" type="text/css" />
	</head>
	<body>
		<div id="contenedor">
			<?php
				require('includes/cabecera.php');
			?>
			<div id="contenido">
			</div>
			<?php
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
