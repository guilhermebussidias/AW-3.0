<?php
	require_once __DIR__ . "/src/App.php";
 ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>
	</head>
	<body>
		<div id="contenedor">
			<?php
				require(getIncludePath() . 'cabecera.php');
				require(getIncludePath() . 'slider.php');
			?>
			<div id="contenido">

        <?php

        $name = "";

        if (isset($_REQUEST["name"])) {
          $name = $_REQUEST["name"];
        }

        ?>


        <form action="<?= getBasePath() ?>formNuevoUsuario.php" method="post" id="nuevo-usuario">
            <div>
                <h1>Crear nuevo usuario</h1>
            </div>
            <div>
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" value="<?= $name ?>">
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" value="">
            </div>
            <div>
              <button type="submit" class="boton-enviar-comentario">Crear usuario</button>
            </div>
        </form>

			</div>
			<?php
				require(getIncludePath() . 'sidebar.php');
				require(getIncludePath() . 'pie.php');
			?>
		</div>
	</body>
</html>
