<?php

namespace aw\logic;

class Noticia {

	private $daoNoticia;

	function __construct() {
    	$this->daoNoticia = new \aw\dao\DAONoticia();
	}

	function buscarNoticias($saltar, $elementos) {
    $noticias = $this->daoNoticia->getListaNoticias($saltar, $elementos);
    return $noticias;
	}

	function buscarNoticia($id) {
    $noticia = $this->daoNoticia->getNoticia($id);
    return $noticia;
	}
	
	function saveNoticia($usuario, $titulo, $contenido, $fecha) {
    	return $this->daoNoticia->persist($name, $password, $role);
	}

	function buscarNoticiasbuscador($tituloN, $contenidoN, $fechaInicioN, $fechaFinN){
		return $this->daoNoticia->getListaNoticiaBuscador($tituloN, $contenidoN, $fechaInicioN, $fechaFinN);
	}
}

?>
