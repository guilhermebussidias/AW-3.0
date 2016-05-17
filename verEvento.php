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
            $usuario = $evento["nombre_usuario"];
            $fechaBD = $evento["fecha"];
            $fecha = date("d/m/Y", strtotime($fechaBD));
            $contenido = $evento["contenido"];
            $userID = $evento["id_usuario"];
            $eventoID = $evento["id"];

            echo '
              <div id="noticia' . $eventoID . '" class="contenido-bloque">
                <h3 class="contenido-titulo">' . $titulo . '</h3>
                <div class="contenido-info">Escrito por ' . $usuario  . ' el ' . $fecha . '</div>
                <div class="contenido-texto">
                  <p class="contenido-parrafo">' . $contenido . '</p>
                </div>
            ';
            if (isAdmin() || getID() === $userID) {
                echo '
                  <a class="contenido-boton" href="editar-noticia.php?noticia=' . $eventoID . '">Editar</a>
                ';
            }
            echo '
                <div class="clear"></div>
              </div>
            ';


          ?>
				</div>

				<div class="contenido-bloque">
					<h3 class="contenido-titulo">Añade tu comentario</h3>
					<form action="<?= getBasePath() ?>formComentarioNoticia.php" method="post" id="form-usuario">
						<input type="hidden" name="id-noticia" value="<?=$noticiaID?>">
						<h6 class="contenido-titulo-input">Título</h6>
						<input type="text" name="titulo-comentario-noticia" id="input-titulo-comentario-noticia" class="input-textarea">
						<h6 class="contenido-titulo-input">Comentario</h6>
						<textarea name="input-contenido-comentario-noticia" class="input-textarea" rows="10"></textarea>
						<button type="submit" class="contenido-boton" name="boton" value="enviar-comentario-noticia">Enviar</button>
					</form>
					<div class="clear"></div>
				</div>

			</div>
			<?php
				require(getIncludePath() . 'sidebar.php');
				require(getIncludePath() . 'pie.php');
			?>
		</div>
	</body>
</html>
