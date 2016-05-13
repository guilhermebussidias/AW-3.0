<?php
	$rol = getRole();
	$id = getId();
	$logic = new \aw\logic\Publicidad();
	$publicidad = $logic->buscarPublicidad();
?>
<aside id="right-sidebar">
	<?php
    foreach($publicidad as $publicidad_){
        echo ' <div class="pienso">
         			<a href="<?= getBasePath() ?>"> '. $publicidad_['banner'] . '<img src="<?=getImgPath()?>pienso1.jpg" alt="pienso">
         		</div>';
         if( $rol=='admin' or $id==$publicidad_['idUser']){
			echo '<div class="contenido-admin">
			<a class="contenido-boton" href="editar-publicidad.php?publicidad=' . $publicidad_['id'] . '">Editar</a>	</div>';
		}
    }
    ?>
</aside>