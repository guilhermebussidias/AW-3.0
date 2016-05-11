<?php
	require_once __DIR__ . "/src/App.php";
	$rol = getRole();
	$name = getName();
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
				require('includes/cabecera.php');
			?>
			<div id="contenido">
				<?php
				if (is_null($rol) || $rol != "admin" ) {
						echo '<p> Necesitas permisos para poder acceder </p>';
				}else {
					?>
				 <div class="maxi-form-administrar" >
            		<div id="contenedor-fragmentos">
		              <ul>
               			<li><a href="#admin-usuario">Usuarios</a></li>
                		<li><a href="#admin-noticia">Noticias</a></li>
                		<li><a href="#admin-eventos">Eventos</a></li>
                		<li><a href="#admin-servicio">Servicio</a></li>
              		  </ul>
              		  <div id="admin-usuario">
              		  	<form id="form-usuario">
              		  		<label for="input-usuario-id">Id:</label>
                    		<input type="text" name="usuario-id" id="input-usuario-id" class="input-usuario">
                    		<br>
                    		<label for="input-usuario-nombre">Nombre:</label>
                    		<input type="text" name="usuario-nombre" id="input-usuario-nombre" class="input-usuario">
                    		<br>
                    		<label for="input-usuario-pass">Contraseña:</label>
                    		<input type="password" name="usuario-pass" id="input-usuario-pass" class="input-usuario">
                    		<br>
                    		<label for="input-usuario-rol">Rol:</label>
                    		<select type="text" name="usuario-rol" id="input-usuario-rol" class="input-usuario">
  								<option selected="selected" value="admin">Admin</option>
  								<option value="Uno" value="gestor">Gestor</option>
  								<option value="Uno" value="normal">Normal</option>
  								<option value="Uno" value="proveedor">Proveedor</option>
							</select>
							<br><br>
              		  		<button type="button" class="boton-usuario-crear">Crear</button>
              		  		<button type="button" class="boton-usuario-modificar">Modificar</button>
              		  		<button type="button" class="boton-usuario-eliminar">Eliminar</button>
              		  	</form>
              		  </div>
              		  <div id="admin-noticia">
              		  </div>
              		  <div id="admin-eventos">
              		  </div>
              		  <div id="admin-servicio">
              		  </div>
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
