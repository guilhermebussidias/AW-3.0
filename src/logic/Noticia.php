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

	function saveNoticia($usuario, $titulo, $contenido) {
		$fecha = mktime(date("Y")  , date("m"), date("d"));
    	return $this->daoNoticia->saveNoticia($usuario, $titulo, $contenido, $fecha);
	}

	function updateNoticia($id, $titulo, $contenido) {
    	return $this->daoNoticia->updateNoticia($id, $titulo, $contenido);
	}

	function deleteNoticia($id) {
    	return $this->daoNoticia->deleteNoticia($id);
	}

	function buscarNoticiasbuscador($tituloN, $contenidoN, $fechaInicioN, $fechaFinN){
		return $this->daoNoticia->getListaNoticiaBuscador($tituloN, $contenidoN, $fechaInicioN, $fechaFinN);
	}
}

?>
