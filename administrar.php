<?php
	require_once __DIR__ . "/src/App.php";
	$rol = getRole();
	$name = getName();
	$id = getID();
	$logicUsuario = new \aw\logic\Usuario();
 	$logicNoticia = new  \aw\logic\Noticia();
	$logicEvento = new \aw\logic\Evento();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>
		<link rel="stylesheet"  href="<?= getCSSPath() ?>buscar.css" type="text/css" />
      <link rel="stylesheet"  href="<?= getCSSPath() ?>botones.css" type="text/css"/>
    	<script src="<?= getJSPath() ?>buscar.js"></script>
	</head>
	<body>
		<div id="contenedor">
			<?php
				require('includes/cabecera.php');
			?>
			<div id="contenido">
				<?php
				if ( $rol === "admin" || $rol === "gestor" || $rol === "proveedor") {
					?>
				 <div class="maxi-form-administrar" >
            		<div id="contenedor-fragmentos">
		              <ul>
										<?php if ($rol === "admin") {
												echo '<li><a href="#admin-usuario">Usuarios</a></li>';
											}
							 				if ($rol === "admin" || $rol === "gestor" ) {
												echo '<li><a href="#admin-noticia">Noticias</a></li>
												<li><a href="#admin-eventos">Eventos</a></li>
	                			<li><a href="#admin-servicio">Servicios</a></li>';
											}
										 if ($rol === "admin" || $rol === "proveedor" ) {
												echo '<li><a href="#admin-publicidad">Publicidad</a></li>';
											}?>
              		  </ul>
              		  <?php
				if ( $rol === "admin") {
					?>
              		  <div id="admin-usuario">
              		  	<form action="<?= getBasePath() ?>formAdministrar.php" method="post" id="form-usuario">
                    		<label for="input-usuario-nombre">Nombre:</label>
                    		<input type="text" name="usuario-nombre" id="input-usuario-nombre" class="input-usuario">
                    		<br>
                    		<label for="input-usuario-pass">Contraseña:</label>
                    		<input type="password" name="usuario-pass" id="input-usuario-pass" class="input-usuario">
                    		<br>
                    		<label for="input-usuario-rol">Rol:</label>
                    		<select type="text" name="usuario-rol" id="input-usuario-rol" class="input-usuario">
  							         	<option selected="selected" value="admin">Admin</option>
  						        		<option value="gestor">Gestor</option>
  					         			<option value="normal">Normal</option>
  					         			<option value="proveedor">Proveedor</option>
				          	</select>
					         <br><br>
              		  		<button class="myButton" id="verde" name="boton" value="crear-usuario">Crear</button>
              		  		<button class="myButton" id="naranja"  name="boton" value="modificar-usuario">Modificar</button>
              		  		<button class="myButton" id="rojo" name="boton" value="eliminar-usuario">Eliminar</button>
              		  	</form>
              		  </div>
				<?php
				}
				if ( $rol === "admin" || $rol === "gestor") {
					?>
              		  <div id="admin-noticia">
                    <form action="<?= getBasePath() ?>formAdministrar.php" method="get" id="form-usuario">
                    <input type="hidden" name="usuario" id="input-titulo-noticia" class="estilotextarea" value=<?= $id ?>>
                    <h3 class="contenido-titulo">Título:</h3>
                    <input type="text" name="titulo-noticia" id="input-titulo-noticia" class="estilotextarea">
                    <br>
                    <h3 class="contenido-titulo">Contenido:</h3>
                    <textarea name="input-contenido-noticia" class="estilotextarea" rows="10" cols="80"></textarea>
                    <br><br>
                    <button type="submit" class="myButton" id="verde" name="boton" value="guardar-noticia">Guardar</button>
                    <button type="reset" class="myButton" id="naranja" name="boton" value="descartar-noticia">Descartar Cambios</button>
                    </form>
                    </div>
              		  <div id="admin-eventos">
											<form action="<?= getBasePath() ?>formAdministrar.php" method="post" id="form-usuario" enctype="multipart/form-data">
												<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
												<input type="hidden" name="usuario" id="input-usuario-evento" class="estilotextarea" value=<?= $id ?>>
												<h3 class="contenido-titulo">Titulo del evento: </h3>
												<input type="text" name="titulo-evento" id="input-titulo-evento" class="estilotextarea">
												<br>
												<h3 class="contenido-titulo">Fecha del evento: </h3>
												<input type="date" name="fecha-evento" id="input-fecha-evento" class="estilotextarea">
												<br>
												<h3 class="contenido-titulo">Ubicación del evento: </h3>
												<input type="text" name="ubicacion-evento" id="input-ubicacion-evento" class="estilotextarea">
												<br>

												<label for="">Imagen: </label>
												<input type="file" name="input-foto-evento"><br>
												<br>

												<h3 class="contenido-titulo">Contenido:</h3>
		                    <textarea name="input-contenido-evento" class="estilotextarea" rows="10" cols="80" id="input-contenido-evento"></textarea>
		                    <br><br>
		                    <button type="submit" class="myButton" id="verde" name="boton" value="crear-evento">Crear Evento</button>
		                    <button type="reset" class="myButton" id="naranja" name="boton" value="descartar-evento">Descartar Cambios</button>
	                    </form>
              		  </div>
              		  <div id="admin-servicio">
											<form action="<?= getBasePath() ?>formAdministrar.php" method="post" id="form-servicio" enctype="multipart/form-data">
												<label for="">Nombre de empresa: </label>
												<input type="text" name="input-titulo-servicio"><br>
												<label for="">Teléfono: </label>
												<input type="text" name="input-telefono-servicio"><br>
												<label for="">Web: </label>
												<input type="text" name="input-url-servicio"><br>
												<label for="">Ubicación: </label>
												<input type="text" name="input-ubicacion-servicio"><br>
												<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
												<label for="">Foto: </label>
												<input type="file" name="input-foto-servicio"><br>
												<label for="">Categoría: </label>
												<select name="categoria-servicio" >
		                      <option value="veterinario" selected="selected">Veterinarios</option>
		                      <option value="residencia">Residencias</option>
		                      <option value="adiestrador">Adiestradores</option>
		                      <option value="peluqueria">Peluquerías</option>
		                      <option value="paseador">Paseadores</option>
		                      <option value="adopcion">Adopciones</option>
		                    </select><br><br>
												<label for="">Contenido: </label>
												<textarea name="contenido-servicio" rows="10" cols="80"></textarea>
												<br><br>
              		  		<button type="submit" class="myButton" id="verde" name="boton" value="crear-servicio">Crear</button>
              		  		<button type="reset" class="myButton" id="naranja" name="boton" value="descartar-servicio">Descartar Cambios</button>
							</form>
              		  </div>
              		 <?php
              		}
				if ( $rol === "admin" || $rol === "proveedor") {
					?>
              		   <div id="admin-publicidad">
              		   <form action="<?= getBasePath() ?>formAdministrar.php" method="post" id="form-publicidad" enctype="multipart/form-data">
              		  		<input type="hidden" name="id" id="input-publicidad" class="estilotextarea" value="<?= $id ?>">
												<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
						<h3 class="contenido-titulo">Foto:<h3/>
						<input type="file" name="input-foto-publicidad"><br>
						<h3 class="contenido-titulo">Anuncio:<h3/>
                   		 <textarea name="input-contenido-anuncio" class="estilotextarea" rows="10" cols="80"></textarea><br><br>
              		   <button type="submit" class="myButton" id="verde" name="boton" value="crear-publicidad">Crear</button>
              		  		<button type="reset" class="myButton" id="naranja" name="boton" value="descartar-publicidad">Descartar Cambios</button>
              		   </form>
              		   </div>
              		   <?php
              		}
					?>
              		</div>
				</div>
			</div>
			<?php
		}
				require('includes/pie.php');
			?>
		</div>
	</body>
</html>
