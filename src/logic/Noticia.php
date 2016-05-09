<?php

namespace aw\logic;

class Noticia {

	private $daoNoticia;

	function __construct() {
    	$this->daoNoticia = new \aw\dao\DAONoticia();
	}

	function buscarNoticias($sigElem, $elementos) {
    $noticias = $this->daoNoticia->getListaNoticias($sigElem, $elementos);
		if (is_null($noticias)) {
    		return null;
    	}
    return $noticias;
	}

	function saveNoticia($usuario, $titulo, $contenido, $fecha) {
    	return $this->daoNoticia->persist($name, $password, $role);
	}
}

?>