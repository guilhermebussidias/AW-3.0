<?php

namespace aw\dao;

class DAONoticia {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }
  
  function getNoticia($id){
   try {
      $sql = "SELECT n.fecha as fecha, n.titulo as titulo,
        n.contenido as contenido, n.id as id
        FROM Noticia n
        WHERE n.id=:idNot";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["idNot" => $id]);
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

  function getListaNoticias($saltar, $elementos) {
    try{
      $sql = "SELECT n.fecha as fecha, n.titulo as titulo,
        n.contenido as contenido, u.usuario as nombre_usuario, u.id as idUser, n.id as id
        FROM Noticia n
        JOIN Usuario u on n.usuario = u.id
        ORDER BY fecha DESC
        LIMIT " . $saltar . ", " . $elementos;
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $res = $stmt->fetchAll();
    }
    catch (PDOException $e){
      echo "ERROR EN DAONoticia: " . $e->getMessage();
      return null;
    }
    return $res;
  }

  function getListaNoticiaBuscador($tituloN, $contenidoN, $fechaInicioN, $fechaFinN) {
    try{
      //MODIFICACIONES PARA EL LIKE
      $tituloN= "%" . $tituloN ."%";
      $contenidoN= "%" . $contenidoN . "%";

      $sql = "SELECT n.fecha as fecha, n.titulo as titulo,
        n.contenido as contenido, u.usuario as nombre_usuario, n.id as id
        FROM Noticia n
        JOIN Usuario u on n.usuario = u.id

        WHERE n.titulo LIKE :tit AND n.contenido LIKE :cont
        AND n.fecha <= :fechaF AND n.fecha >= :fechaI

        ORDER BY fecha DESC";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["tit" => $tituloN, "cont" => $contenidoN, "fechaF" => $fechaFinN, "fechaI" => $fechaInicioN]);
      $res = $stmt->fetchAll();

    }
    catch (PDOException $e){
      echo "ERROR EN DAONoticia: " . $e->getMessage();
    }
    return $res;
  }

  function saveNoticia($usuario, $titulo, $contenido){
    try{
      $sql = "INSERT INTO Noticia (usuario, titulo, contenido, fecha) VALUES (:usuario,:titulo, :contenido, CURDATE() )";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["usuario" => $usuario, "titulo" => $titulo, "contenido" => $contenido]);
      $id = $this->conn->lastInsertId();
    } catch(PDOException $e) {
  		echo "ERROR EN DAONoticia: " . $e->getMessage();
      return null;
  	}
    return $id;
  }

  function updateNoticia($id, $titulo, $contenido) {
      try {
        $sql = "UPDATE Noticia SET titulo=:titulo, contenido=:contenido WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["id" => $id, "titulo" => $titulo, "contenido" => $contenido]);
      } catch(PDOException $e) {
    		echo "ERROR EN DAONoticia: " . $e->getMessage();
        return null;
    	}
      return true;
  }

  function deleteNoticia($id) {
    try {
      $sql = "DELETE FROM Noticia WHERE id = :id ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["id" => $id]);
      $stmt->execute();
    } catch (PDOException $e) {
      echo "ERROR EN DAONoticia: " . $e->getMessage();
      return null;
    }
    return true;
  }

}

?>
