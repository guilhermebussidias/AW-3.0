<?php
	require_once __DIR__ . "/src/App.php";
 ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>

    <link rel="stylesheet"  href="<?=getCSSPath()?>contenido.css" type="text/css" />
	</head>
	<body>
		<div id="contenedor">
			<?php
				require(getIncludePath() . 'cabecera.php');
				require(getIncludePath() . 'slider.php');
			?>
			<div id="contenido">
				<div id="contenedor-noticias">
					<?php
						$noticiasLogic = new \aw\logic\Noticia();
						//$eventosLogic = new \aw\logic\Evento(); 
						//$servicios = new \aw\logic\Servicio();
						$noticias = $noticiasLogic->buscarNoticias(1, 1); //id, usuario, titulo, contenido, fecha

					?>

					<div id="algo" class="contenido-bloque">
						<h3 class="contenido-titulo">Noticia de prueba (no enganchada a logic)</h3>
						<div class="contenido-info">Escrito por Manolito el 15/05/2016</div>
						<div class="contenido-texto">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempus, orci vitae ultrices convallis, nisl risus volutpat odio, eu tincidunt lorem enim sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec vitae aliquam diam. Vivamus quis magna magna. Mauris aliquet lacus in nisl sodales, eget venenatis est dictum. Aliquam erat volutpat. Nullam rutrum eros in erat aliquam rhoncus. In auctor molestie facilisis. Nulla in nibh nec lorem commodo aliquet. Nam sagittis lacus nec ante varius molestie. Nullam commodo a justo ac posuere.
							</p>
							<p>
								Vivamus ut cursus lectus, id molestie mi. Proin in quam dignissim, pretium purus sit amet, tempus sapien. Mauris bibendum, mi ut pellentesque sollicitudin, ligula risus ultricies tellus, et suscipit diam orci porttitor velit. Aliquam volutpat tincidunt tellus eget gravida. Nulla porta, purus aliquet euismod hendrerit, nunc nulla congue libero, vitae semper neque nulla eu lorem. Phasellus vitae velit sed urna imperdiet malesuada. Ut non tortor lobortis dui molestie consectetur. Pellentesque at nibh egestas ipsum vestibulum placerat quis ut diam. Cras quis blandit nulla. Nullam ac condimentum turpis, aliquet faucibus lectus. Donec ut congue odio. Cras rhoncus imperdiet sem, maximus hendrerit nisl. Mauris in est ut sapien porttitor pulvinar. Integer a vulputate est. Sed eu vulputate eros.
							</p>
						</div>
					</div>




				</div>
			</div>
			<?php
				require(getIncludePath() . 'sidebar.php');
				require(getIncludePath() . 'pie.php');
			?>
		</div>
	</body>
</html>
