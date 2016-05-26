<?php
	require_once __DIR__ . "/src/App.php";

	checkCSRF();
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
			?>
			<div id="contenido">
        <?php

          $id_usuario = getID();
          $id_noticia = $_REQUEST['id-noticia'];
          $titulo = $_REQUEST['titulo-comentario-noticia'];
          $contenido = $_REQUEST['input-contenido-comentario-noticia'];

          $url_ver_noticia = getBasePath() . 'verNoticia.php?noticia=' . $id_noticia;

          $comentarioNoticiaLogic = new \aw\logic\ComentarioNoticia();
          $id = $comentarioNoticiaLogic->nuevoComentario($id_usuario, $id_noticia, $titulo, $contenido);

          if (isset($id)) {
            redirect($url_ver_noticia);
          }
          else{
			echo '<h3>Hubo un error el enviar tu comentario</h3>
        	<p><a href="=';$url_ver_noticia; echo' " class="contenido-boton">Volver</a></p>';
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
