<?php
	#require_once __DIR__ . "/src/App.php";
	$logic = new \aw\logic\Publicidad();
	$publididad = $logic->buscarPublicidad();
?>
<aside id="right-sidebar">
	<?php
    foreach($publididad as $publididad_){
        echo ' <div class="pienso">
         			<a href="<?= getBasePath() ?>"><img src="<?=getImgPath()?>pienso1.jpg" alt="pienso">
         		</div>';
    }
    ?>
</aside>