<?php
	$rol = getRole();
	$id = getId();
	$logic = new \aw\logic\Publicidad();
	$publicidad = $logic->buscarPublicidad();
?>
<aside id="right-sidebar">
	<?php
		if (isset($publicidad))
	    foreach($publicidad as $publicidad_){
				$banner = UPLOADED_URL . $publicidad_['banner'];
				echo '<div class="anuncio-banner"><img src="' . $banner . '" class="anuncio-banner-img"></div>';

				if( $rol==='admin' or $id===$publicidad_['idUser']){
					echo '<div class="contenido-admin">
						<a class="contenido-boton" href="editar-publicidad.php?publicidad=' . $publicidad_['id'] . '">Editar</a>	</div>';
				}
	    }
    ?>
</aside>
