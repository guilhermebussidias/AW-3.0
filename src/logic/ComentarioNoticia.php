<?php

namespace aw\logic;

class ComentarioNoticia {

  private $daoComentarioNoticia;

  function __construct() {
    $this->daoComentarioNoticia = new \aw\dao\DAOComentarioNoticia();
  }

  function nuevoComentario($id_usuario, $id_noticia, $titulo, $comentario) {
    return $this->daoComentarioNoticia->persist($id_usuario, $id_noticia, $titulo, $comentario);
  }

  function borrarComentario($id_comentario) {
    return $this->daoComentarioNoticia->delete($id_comentario);
  }

  function listarComentarios($id_noticia) {
    return $this->daoComentarioNoticia->getByNoticia($id_noticia);
  }

}

?>
