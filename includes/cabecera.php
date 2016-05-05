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
				echo ' <li><a href="#inicio-sesion">Inicio sesión</a></li>';
				echo '   <li><a href="#registrar">Registrarse</a></li>';
			}
			else { 
				echo " <li>Bienvenido, {$name}</li>";
			}
		?>
		
	   </ul>
      </div>
      <div class="clear"></div>
      <header id="cabecera">
        <div id="logo">
          <a href="index.html"><img src="resources/img/logo.png" alt="logo" /></a>
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
            <li><a href="noticias.php">Noticias</a></li>
            <li><a href="eventos.php">Eventos</a></li>
            <li><a href="deinteres.php">De Interés</a></li>
            <li><a href="conocenos.php">Conócenos</a></li>
          </ul>
        </nav>
</div>