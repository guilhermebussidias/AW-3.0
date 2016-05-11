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

        <div class="maxi-form" >
            <div id="contenedor-fragmentos">
              <ul>
                <li><a href="#busca-noticias">Noticias</a></li>
                <li><a href="#busca-servicios">Servicios</a></li>
                <li><a href="#busca-eventos">Eventos</a></li>
              </ul>
              
                <div id="busca-noticias" class="fragmento-busqueda">
                  <form action="<?= getBasePath() ?>formBuscar.php" method="get" id="form-busqueda-noticia">
                    <label for="input-titulo-noticia">Título:</label>
                    <input type="text" name="titulo-noticia" id="input-titulo-noticia" class="input-busqueda-noticia">
                    <label for="input-contenido-noticia">Contenido:</label>
                    <input type="text" name="contenido-noticia" id="input-contenido-noticia" class="input-busqueda-noticia">
                    <label for="input-fecha-ini-noticia">Fecha inicial:</label>
                    <input type="text" name="fecha-ini-noticia" id="input-fecha-ini-noticia" class="input-busqueda-noticia">
                    <label for="input-fecha-fin-noticia">Fecha final:</label>
                    <input type="text" name="fecha-fin-noticia" id="input-fecha-fin-noticia" class="input-busqueda-noticia">
                 <button type="submit" class="boton-enviar-comentario">Buscar</button>
                 </form>
                </div>
                
             <div id="busca-servicios" class="fragmento-busqueda">
              <form action="<?= getBasePath() ?>formBuscar.php" method="get"  id="form-busqueda-evento"> 
                   <p>NO IMPLEMENTADO</p>
                    <label for="input-contenido-servicio">Contenido:</label>
                    <input type="text" name="contenido-servicio" id="input-contenido-servicio" class="input-busqueda-evento">
                    <label for="input-categoria-servicio">Categoría:</label>
                    <select name="categoria-servicio" id="input-categoria-servicio">
                      <option value="veterinario" selected="selected">Veterinarios</option>
                      <option value="residencia">Residencias</option>
                      <option value="adiestrador">Adiestradores</option>
                      <option value="peluqueria">Peluquerías</option>
                      <option value="paseador">Paseadores</option>
                      <option value="adopcion">Adopciones</option>
                    </select>
                    <label for="input-titulo-servicio">Ubicación:</label>
                    <input type="text" name="titulo-servicio" id="input-titulo-servicio" class="input-busqueda-evento">
                    <label for="input-puntuacion-servicio">Puntuación mínima:</label>
                    <input readonly type="text" name="puntuacion-servicio" id="input-puntuacion-servicio" class="input-busqueda-evento" value="5">
                    <div id="slider-puntuacion-servicio"></div>
               <button type="submit" class="boton-enviar-comentario">Buscar</button>
              </form>
               </div>
               <div id="busca-eventos" class="fragmento-busqueda">
              <form action="<?= getBasePath() ?>formBuscar.php" method="get" id="form-busqueda-servicio">    
                    <p>NO IMPLEMENTADO</p>
                    <label for="input-titulo-evento">Título:</label>
                    <input type="text" name="titulo-evento" id="input-titulo-evento" class="input-busqueda-servicio">
                    <label for="input-contenido-evento">Contenido:</label>
                    <input type="text" name="contenido-evento" id="input-contenido-evento" class="input-busqueda-servicio">
                    <label for="input-fecha-ini-evento">Fecha inicial:</label>
                    <input type="text" name="fecha-ini-evento" id="input-fecha-ini-evento" class="input-busqueda-servicio">
                    <label for="input-fecha-fin-evento">Fecha final:</label>
                    <input type="text" name="fecha-fin-evento" id="input-fecha-fin-evento" class="input-busqueda-servicio">
                    <label for="input-titulo-evento">Ubicación:</label>
                    <input type="text" name="titulo-evento" id="input-titulo-evento" class="input-busqueda">
                <button type="submit" class="boton-enviar-comentario">Buscar</button>
              </form>
             </div> 
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
