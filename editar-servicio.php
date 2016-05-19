<?php
	require_once __DIR__ . "/src/App.php";

	$logic = new \aw\logic\servicioEspecifico();
	$rol = getRole();
	$id = getID();
	$idServicio = $_REQUEST["servicio"];
	$servicio = $logic->buscarServicio($idServicio);
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
			<div id="contenedor-servicios">
			<?php
			if (isAdmin() ||  $id === $servicio['usuario']) {
			?>
			<div id="algo" class="contenido-bloque">
			<form action="<?= getBasePath() ?>formAdministrar.php" method="post" id="edit-servicio" enctype="multipart/form-data" >
					<input type="hidden" name="id" class="estilotextarea" value= "<?= $servicio['id'] ?>">
					<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
					<h3 class="contenido-titulo">Nombre de la empresa:<h3/>
                    <input type="text" name="nombre" id="input-titulo-servicio" class="estilotextarea" value= "<?= $servicio['nombre'] ?>">

                    <h3 class="contenido-titulo">Ubicacion:<h3/>
                    <textarea name="ubicacion" class="estilotextarea" rows="2" cols="60"><?= $servicio['ubicacion'] ?></textarea>

                   	<h3 class="contenido-titulo">Telefono:<h3/>
                    <textarea name="telefono" class="estilotextarea" rows="1" cols="15"><?= $servicio['telefono'] ?></textarea>

                    <h3 class="contenido-titulo">Url:<h3/>
                    <textarea name="url" class="estilotextarea" rows="1" cols="60"><?= $servicio['url'] ?></textarea>

                    <h3 class="contenido-titulo">Foto:</h3>
					<input type="file" name="input-foto-servicio"><br>

					<h3 class="contenido-titulo">Categoría</h3>
					<select name="categoria" >
                      <option value="veterinario" selected="selected">Veterinarios</option>
                      <option value="residencia">Residencias</option>
                      <option value="adiestrador">Adiestradores</option>
                      <option value="peluqueria">Peluquerías</option>
                      <option value="paseador">Paseadores</option>
                      <option value="adopcion">Adopciones</option>
                  </select>
					<h3 class="contenido-titulo">Patrocinado:</h3>
					<?php
						if ($servicio['patrocinado']) {
							echo '<input type="checkbox" name="patrocinado" value="1" checked>';
						}
						else{
							echo '<input type="checkbox" name="patrocinado" value="1">';
						}
					 ?>
					<h3 class="contenido-titulo">Contenido:<h3/>
                    <textarea name="contenido" class="estilotextarea" rows="10" cols="80"><?= $servicio['contenido'] ?></textarea><br><br>

                    <button type="submit" class="myButton" id="verde" name="boton" value="modificar-servicio">Guardar</button>
                    <button type="submit" class="myButton" id="naranja" name="boton" value="descartar-servicio">Descartar Cambios</button>
              		<button type="submit" class="myButton" id="rojo" name="boton" value="eliminar-servicio">Eliminar Servicio</button>
      		</form>
      		</div>
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
