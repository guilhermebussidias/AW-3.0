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
				echo '   <li><a href="#registrar">Registrarse</a></li>';
			}
			else {
				echo " <li>Bienvenido, {$name} &nbsp;</li>";
				echo '<li><a id="enlace-logout" href="' . getBasePath() . 'formLogin.php">Salir</a></li>';
			}
		?>

	   </ul>
      </div>
      <div class="clear"></div>
      <header id="cabecera">
        <div id="logo">
          <a href="<?= getBasePath() ?>"><img src="resources/img/logo.png" alt="logo" /></a>
        </div>
        <nav id="navegacion">
          <ul class="menu">
            <li><a href="servicio.php">Servicios</a>
                <ul>
                  <li><a href="servicio.php?servicio=veterinario">Veterinarios</a></li>
                  <li><a href="servicio.php?servicio=residencias">Residencias</a></li>
                  <li><a href="servicio.php?servicio=adiestradores">Adiestradores</a></li>
                  <li><a href="servicio.php?servicio=peluquerias">Peluquerias</a></li>
                  <li><a href="servicio.php?servicio=paseadores">Paseadores</a></li>
                  <li><a href="servicio.php?servicio=adopcion">Adopción</a></li>
                </ul>
            </li>
            <li><a href="noticia.php">Noticias</a></li>
            <li><a href="evento.php">Eventos</a></li>
            <li><a href="deinteres.php">De Interés</a></li>
            <li><a href="conocenos.php">Conócenos</a></li>
          </ul>
        </nav>
</div>

<div id="dialog-form" title="Login en AllDogs">
  <!--<p class="validateTips">Hay que rellenar todos los campos</p>-->

  <form id="jquery-login-form" action="<?= getBasePath() ?>formLogin.php" method="post">
    <fieldset>
      <label for="name">Nombre de usuario</label>
      <input type="text" name="name" id="name" value="" class="text ui-widget-content ui-corner-all">
      <label for="password">Contraseña</label>
      <input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all">

      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<div class="clear"></div>
