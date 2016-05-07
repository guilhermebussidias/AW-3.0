<?php

require_once __DIR__ . "/src/App.php";

$name = $_REQUEST["name"];
$password = $_REQUEST["password"];
$role = "normal";

$logic = new \aw\logic\Usuario();

$ok = $logic->newUser($name, $password, $role);

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

          if ($ok) {
            echo '
              <h1>Usuario creado con éxito</h1>
              <p>Ya puedes hacer login con tu nuevo usuario.</p>
            ';
          } else {
            echo '
              <h1>Error al crear usuario</h1>
              <p>Hubo un error al crear su usuario.
              Es posible que ya exista otro usuario con ese nombre.</p>
            ';
          }

        ?>
			</div>
			<?php
				require(getIncludePath() . 'sidebar.php');
				require(getIncludePath() . 'pie.php');
			?>
		</div>
	</body>
</html>
