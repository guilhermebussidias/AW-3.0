<?php
	#require_once __DIR__ . "/src/App.php";
	$logic = new \aw\logic\Publicidad();
	$publicidad = $logic->buscarPublicidad();
?>
<aside id="right-sidebar">
	<?php



	
		echo gettype($publicidad);
		if (!is_null($publicidad))
	    foreach($publicidad as $publicidad_){
	        echo ' <div class="pienso">
	         			<a href="<?= getBasePath() ?>"><img src="<?=getImgPath()?>pienso1.jpg" alt="pienso">
	         		</div>';
	    }
    ?>
</aside>
