<?php
	require_once __DIR__ . "/src/App.php";
	$rol = getRole();
	$name = getName();
	$id = getID();
	$logic = new \aw\logic\Noticia();

	if (isset($_REQUEST["noticia"]))
		$idNoticia = $_REQUEST["noticia"];
		$noticia = $logic->buscarNoticia($idNoticia);
 ?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>
		<link rel="stylesheet"  href="<?=getCSSPath()?>contenido.css" type="text/css"/>
	    <link rel="stylesheet"  href="<?= getCSSPath() ?>buscar.css" type="text/css" />
	    <link rel="stylesheet"  href="<?= getCSSPath() ?>botones.css" type="text/css" />
	</head>
	<body>
		<div id="contenedor">
			<?php
				require('includes/cabecera.php');
			?>
			<div id="contenedor-noticias">
			<?php

			if (isAdmin() || $rol==='gestor' || $id === $noticia['id_usuario'] && $noticia['id_usuario'] !== null) {
			?>
			<div id="algo" class="contenido-bloque">
			<form action="<?= getBasePath() ?>formAdministrar.php" method="post" id="edit-noticia" >
					<?php require(getIncludePath() . 'csrf.php'); ?>
					<input type="hidden" name="id" id="input-titulo-noticia" class="estilotextarea" value= "<?= $noticia['id'] ?>">

                    <input type="text" name="titulo" id="input-titulo-noticia" class="estilotextarea" value= "<?= $noticia['titulo'] ?>">
					<h3 class="contenido-titulo">Contenido:<h3/>
                    <textarea name="contenido" class="estilotextarea" rows="10" cols="80"><?= $noticia['contenido'] ?></textarea>

					<br>

                    <button type="submit" class="myButton" id="verde" name="boton" value="modificar-noticia">Guardar</button>
                    <button type="submit" class="myButton" id="naranja" name="boton" value="descartar-noticia">Descartar Cambios</button>
              		 <button type="submit" class="myButton" id="rojo" name="boton" value="eliminar-noticia">Eliminar Noticia</button>
              		<form/>
              		</div>
              		<?php
              	}
			else {

			?>
				<h3 class="contenido-titulo">Contenido Oculto<h3/>
					</div>

			<?php
			}
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
