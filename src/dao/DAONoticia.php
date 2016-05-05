<?php

namespace aw\dao;

class DAONoticia {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }

  function getNoticia($titulo) {
    try {
      $sql = "SELECT * FROM Noticia WHERE titulo = :tituloNoticia";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["tituloNoticia" => $titulo]);
      $res = $stmt->fetchAll();
    } catch(PDOException $e) {
  		echo "ERROR EN DAONoticia: " . $e->getMessage();
  	}
    if (!empty($res)) {
      return $res[0];
    } else {
      return null;
    }
  }
  //Buscar noticia por contenido o titulo
  function getNoticiaContenido($contenido){
    try {
      $sql = "SELECT * FROM Noticia WHERE titulo LIKE '%:tituloNoticia%' OR contenido LIKE '%:contenidoNoticia'";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["tituloNoticia" => $contenido, "contenidoNoticia" => $contenido]);
      $res = $stmt->fetchAll();
    } catch(PDOException $e) {
  		echo "ERROR EN DAONoticia: " . $e->getMessage();
  	}
    if (!empty($res)) {
      return $res[0];
    } else {
      return null;
    }
  }

  function getListaNoticias($sigElem, $elementos) {
    try{
      $sql = "SELECT * FROM Noticia WHERE fecha < now() ORDER BY fecha LIMIT :sigElemento , :numElementos";
      $stmt->execute(["sigElemento" => $sigElem, "numElementos" => $elementos]);
      $stmt = $this->conn->prepare($sql);
      $res = $stmt->fetchAll();
    }
    catch (PDOException $e){
      echo "ERROR EN DAONoticia: " . $e->getMessage();
    }
    if (!empty($res)) {
      return $res;
    } else {
      return null;
    }
  }

  function insertNoticia($usuario, $titulo, $contenido, $fecha){
    try{
      $sql = "INSERT INTO Noticia (usuario, titulo, contenido, fecha) VALUES (:usuario,:titulo, :contenido, :fecha )";
      $stmt->execute(["usuario" => $usuario, "titulo" => $titulo, "contenido" => $contenido, "fecha" => $fecha]);
      $stmt->execute();
      $id = $this->conn->lastInsertId();
    } catch(PDOException $e) {
  		echo "ERROR EN DAONoticia: " . $e->getMessage();
      return null;
  	}
    return $id;
  }

  function updateNoticia($id, $titulo, $contenido) {
      try {
        $sql = "INSERT INTO Usuario (id, titulo, contenido) VALUES (:id, :titulo, :contenido)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["id" => $id, "titulo" => $titulo, "contenido" => $contenido]);
        $stmt->execute();
      } catch(PDOException $e) {
    		echo "ERROR EN DAONoticia: " . $e->getMessage();
        return null;
    	}
      return true;
  }

}

?>