<?php
	$rol = getRole();
	$name = getName();
?>
<div id="cabeceraCompleta">
	<div id="sesion">
        <div id="social">
          <a href="#"><img src="resources/img/facebook-64.png" alt="facebook"></a>
          <a href="#"><img src="resources/img/twitter-64.png" alt="twitter"></a>
        </div>
        <ul>

		<?php

			if (is_null($rol) ) {
				echo ' <li><a href="#inicio-sesion" id="enlace-login">Inicio sesión</a></li>';
				echo '   <li><a href="nuevoUsuario.php">Registrarse</a></li>';
			}
			else {
				echo " <li>Bienvenido, {$name} &nbsp;</li>";
        if ($rol === "admin" || $rol === "gestor" || $rol === "proveedor"){
          echo '<li><a href="administrar.php">Administrar &nbsp;</a></li>';
        }
        echo '<li><a id="enlace-logout" href="' . getBasePath() . 'formLogin.php">Salir</a></li>';
			}
		?>

	   </ul>
      </div>
      <div class="clear"></div>
      <header id="cabecera">
        <div id="logo">
          <a href="<?= getBasePath() ?>"><img src="<?=getImgPath()?>logo.png" alt="logo" /></a>
        </div>
        <nav id="navegacion">
          <ul class="menu">
            <li><a href="servicio.php">Servicios</a>
                <ul>
                  <li><a href="servicio-especifico.php?tipo=veterinario">Veterinarios</a></li>
                  <li><a href="servicio-especifico.php?tipo=residencia">Residencias</a></li>
                  <li><a href="servicio-especifico.php?tipo=adiestrador">Adiestradores</a></li>
                  <li><a href="servicio-especifico.php?tipo=peluqueria">Peluquerias</a></li>
                  <li><a href="servicio-especifico.php?tipo=paseador">Paseadores</a></li>
                  <li><a href="servicio-especifico.php?tipo=adopcion">Adopción</a></li>
                </ul>
            </li>
            <li><a href="noticia.php">Noticias</a></li>
            <li><a href="evento.php">Eventos</a></li>
            <li><a href="deinteres.php">De Interés</a></li>
            <li><a href="conocenos.php">Conócenos</a></li>

						<a href="buscar.php">
							<img id="logo-buscar" src="<?=getImgPath()?>magnifying-glass-icon.png" alt="buscar">
						</a>
          </ul>
        </nav>
</div>

<div id="dialog-form" title="Login en AllDogs">

  <form id="jquery-login-form" action="<?= getBasePath() ?>formLogin.php" method="post">
    <fieldset>
      <label for="name">Nombre de usuario</label>
      <input type="text" name="name" id="name" value="" class="text ui-widget-content ui-corner-all">
      <label for="password">Contraseña</label>
      <input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all">

      <input type="submit" tabindex="-1" id="jquery-login-submit">
    </fieldset>
  </form>
</div>

<div class="clear"></div>
