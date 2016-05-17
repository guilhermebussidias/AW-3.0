<?php
	require_once __DIR__ . "/src/App.php";
 ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>

    <link rel="stylesheet"  href="<?=getCSSPath()?>contenido.css" type="text/css" />
		<script src="<?= getJSPath() ?>contenido.js"></script>
	</head>
	<body>
		<div id="contenedor">
			<?php
				require(getIncludePath() . 'cabecera.php');
				require(getIncludePath() . 'slider.php');
			?>
			<div id="contenido">
				<div id="contenedor-noticias-idx" class="contenedor">
          <?php
            if (!isset($_REQUEST['evento']))
              die;

            $id = $_REQUEST['evento'];

            $eventoLogic = new \aw\logic\Evento();
            $evento = $eventoLogic->getEvento($id);

            $titulo = $evento["titulo"];
            $usuario = $evento['nombre_usuario'];
            $fechaBD = $evento["fecha"];
            $fecha = date("d/m/Y", strtotime($fechaBD));
            $contenido = $evento["contenido"];
            $userID = $evento["idUser"];
            $eventoID = $evento["id"];
						$foto = $evento["foto"];

            echo '
              <div id="evento' . $eventoID . '" class="contenido-bloque">
                <h3 class="contenido-titulo">' . $titulo . '</h3>
                <div class="contenido-info">Tendrá lugar el ' . $fecha . ' en ' . $evento['ubicacion']  .'</div>
								<div class="anuncio-banner-img"><img src="' . $foto . '" class="anuncio-banner-img"></div>
                <div class="contenido-texto">
                  <p class="contenido-parrafo">' . $contenido . '</p>
                </div>
								<div class="contenido-info">Escrito por ' . $usuario  .'</div>
            ';
            if (isAdmin() || getID() === $userID) {
                echo '
                  <a class="contenido-boton" href="editar-evento.php?evento=' . $eventoID . '">Editar</a>
                ';
            }
            echo '
                <div class="clear"></div>
              </div>
            ';


          ?>
				</div>
			</div>
			<?php
				require(getIncludePath() . 'sidebar.php');
				require(getIncludePath() . 'pie.php');
			?>
		</div>
	</body>
</html>
