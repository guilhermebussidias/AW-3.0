<?php

namespace aw\dao;

use PDOException;

class DAOComentarioNoticia {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }

  function getByNoticia($id_noticia) {
    try {
      $sql = "SELECT c.id, c.titulo, c.comentario, c.fecha, u.usuario
        FROM ComentarioNoticia c JOIN Usuario u ON c.usuario = u.id
        WHERE c.noticia = :id_noticia
        ORDER BY c.fecha DESC";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id_noticia' => $id_noticia]);
      $res = $stmt->fetchAll();
    } catch(PDOException $e) {
      echo "ERROR EN DAOComentarioNoticia: " . $e->getMessage();
      return [];
    }
    return $res;
  }

  function persist($id_usuario, $id_noticia, $titulo, $comentario) {
    try {
      $sql = "INSERT INTO ComentarioNoticia
        (usuario, noticia, titulo, comentario, fecha)
        VALUES (:usuario, :noticia, :titulo, :comentario, NOW())";
      $stmt = $this->conn->prepare($sql);
      $params = ['usuario' => $id_usuario, 'noticia' => $id_noticia,
        'titulo' => $titulo, 'comentario' => $comentario];
      $stmt->execute($params);
      $id = $this->conn->lastInsertId();
    } catch(PDOException $e) {
  		echo "ERROR EN DAOComentarioNoticia: " . $e->getMessage();
      return null;
  	}
    return $id;
  }

  function delete($id_comentario) {
    try {
      $sql = "DELETE FROM ComentarioNoticia WHERE id = :id_comentario";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id_comentario' => $id_comentario]);
    } catch(PDOException $e) {
  		echo "ERROR EN DAOComentarioNoticia: " . $e->getMessage();
      return null;
  	}
    return true;
  }
}

?>
