<?php
	require_once __DIR__ . "/src/App.php";
 ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>

    <link rel="stylesheet"  href="<?= getCSSPath() ?>buscar.css" type="text/css" />
    <script src="<?= getJSPath() ?>buscar.js"></script>

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

        <div class="busqueda-box">
            <div id="contenedor-fragmentos">
              <ul>
                <li><a href="#busca-noticias">Noticias</a></li>
                <li><a href="#busca-servicios">Servicios</a></li>
                <li><a href="#busca-eventos">Eventos</a></li>
              </ul>

                <div id="busca-noticias" class="fragmento-busqueda">
                  <form action="<?= getBasePath() ?>formBuscar.php" method="get" id="form-busqueda-noticia">
                    <label for="input-titulo-noticia" class="label-busqueda">Título:</label>
                    <input type="text" name="titulo-noticia" id="input-titulo-noticia" class="input-busqueda input-busqueda-noticia">
                    <label for="input-contenido-noticia" class="label-busqueda">Contenido:</label>
                    <input type="text" name="contenido-noticia" id="input-contenido-noticia" class="input-busqueda input-busqueda-noticia">
                    <label for="input-fecha-ini-noticia" class="label-busqueda">Fecha inicial:</label>
                    <input type="text" name="fecha-ini-noticia" id="input-fecha-ini-noticia" class="input-busqueda input-busqueda-noticia">
                    <label for="input-fecha-fin-noticia" class="label-busqueda">Fecha final:</label>
                    <input type="text" name="fecha-fin-noticia" id="input-fecha-fin-noticia" class="input-busqueda input-busqueda-noticia">
                 <button type="submit" class="boton-enviar-busqueda">Buscar</button>
                 </form>
                </div>

             <div id="busca-servicios" class="fragmento-busqueda">
              <form action="<?= getBasePath() ?>formBuscar.php" method="get"  id="form-busqueda-evento">
                   <p>NO IMPLEMENTADO</p>
                    <label for="input-contenido-servicio" class="label-busqueda">Contenido:</label>
                    <input type="text" name="contenido-servicio" id="input-contenido-servicio" class="input-busqueda input-busqueda-evento">
                    <label for="input-categoria-servicio" class="label-busqueda">Categoría:</label>
                    <select name="categoria-servicio" id="input-categoria-servicio">
                      <option value="veterinario" selected="selected">Veterinarios</option>
                      <option value="residencia">Residencias</option>
                      <option value="adiestrador">Adiestradores</option>
                      <option value="peluqueria">Peluquerías</option>
                      <option value="paseador">Paseadores</option>
                      <option value="adopcion">Adopciones</option>
                    </select>
                    <label for="input-titulo-servicio" class="label-busqueda">Ubicación:</label>
                    <input type="text" name="ubicacion-servicio" id="input-titulo-servicio" class="input-busqueda input-busqueda-evento">
                    <label for="input-puntuacion-servicio" class="label-busqueda">Puntuación mínima:</label>
                    <input readonly type="text" name="puntuacion-servicio" id="input-puntuacion-servicio" class="input-busqueda input-busqueda-evento" value="5">
                    <div id="slider-puntuacion-servicio"></div>
               <button type="submit" class="boton-enviar-busqueda">Buscar</button>
              </form>
               </div>
               <div id="busca-eventos" class="fragmento-busqueda">
              <form action="<?= getBasePath() ?>formBuscar.php" method="get" id="form-busqueda-servicio">
                    <p>NO IMPLEMENTADO</p>
                    <label for="input-titulo-evento" class="label-busqueda">Título:</label>
                    <input type="text" name="titulo-evento" id="input-titulo-evento" class="input-busqueda input-busqueda-servicio">
                    <label for="input-contenido-evento" class="label-busqueda">Contenido:</label>
                    <input type="text" name="contenido-evento" id="input-contenido-evento" class="input-busqueda input-busqueda-servicio">
                    <label for="input-fecha-ini-evento" class="label-busqueda">Fecha inicial:</label>
                    <input type="text" name="fecha-ini-evento" id="input-fecha-ini-evento" class="input-busqueda input-busqueda-servicio">
                    <label for="input-fecha-fin-evento" class="label-busqueda">Fecha final:</label>
                    <input type="text" name="fecha-fin-evento" id="input-fecha-fin-evento" class="input-busqueda input-busqueda-servicio">
                    <label for="input-titulo-evento" class="label-busqueda">Ubicación:</label>
                    <input type="text" name="titulo-evento" id="input-titulo-evento" class="input-busqueda input-busqueda">
                <button type="submit" class="boton-enviar-busqueda">Buscar</button>
              </form>
             </div>
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
