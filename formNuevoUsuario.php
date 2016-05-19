<?php

require_once __DIR__ . "/src/App.php";

$name = $_REQUEST["name"];
$password = $_REQUEST["password"];
$role = "normal";

$logic = new \aw\logic\Usuario();
$name = trim($name);
if($name !== '' && $password !== '') {
	$ok = $logic->newUser($name, $password, $role);
	if (is_null($ok)){
		$respuesta = "El usuario ya existe.";
	}else {
		$respuesta = "Enhorabuena, ya formas parte de Alldogs";
	}
}
else {
	$respuesta = "Rellene todos los campos.";
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>All Dogs</title>
		<?php require(getIncludePath() . 'head.php'); ?>
    	<script src="<?= getJSPath() ?>respuesta.js"></script>
	</head>
	<body>
		<div id="mensaje">
			<p><?= $respuesta ?></p>
		</div>
		<span id="redireccion" style="display:none"><?=  getBasePath() . "index.php" ?></span>
	</body>
</html>
