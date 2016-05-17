<?php

namespace aw\dao;

class DAOEvento {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }

  function getEvento($event) {
    try {
      $sql = "SELECT e.fecha as fecha, e.titulo as titulo,
      e.contenido as contenido, u.usuario as nombre_usuario, u.id as idUser, e.id as id,
      e.ubicacion as ubicacion, e.foto as foto, e.usuario as usuario
      FROM Evento e
      JOIN Usuario u on e.usuario = u.id
      WHERE e.id=:idEvento";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["idEvento" => $event]);
      $res = $stmt->fetchAll();
    } catch(PDOException $e) {
  		echo "ERROR EN DAOEvento: " . $e->getMessage();
  	}
    if (!empty($res)) {
      return $res[0];
    } else {
      return null;
    }
  }

  function getListaEventos($sigElem, $elementos) {
    try {
      $sql = "SELECT e.fecha as fecha, e.titulo as titulo,
      e.contenido as contenido, u.usuario as nombre_usuario, u.id as idUser, e.id as id,
      e.ubicacion as ubicacion, e.foto as foto, e.usuario as usuario
      FROM Evento e
      JOIN Usuario u on e.usuario = u.id
      ORDER BY fecha ASC LIMIT " . $sigElem . "," . $elementos;
      $stm = $this->conn->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll();
    } catch(PDOException $e) {
      echo "ERROR EN DAOEvento: " . $e->getMessage();
    }
    return $res;
  }

  function searchEvento($texto) {
    try {
      $sql = "SELECT * FROM Evento WHERE titulo LIKE '%:busqueda%' OR contenido LIKE '%:busqueda%'";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["busqueda" => $texto]);
      $res = $stmt->fetchAll();
    } catch(PDOException $e) {
      echo "ERROR EN DAOEvento: " . $e->getMessage();
    }
    if (!empty($res)) {
      return $res;
    } else {
      return null;
    }
  }

  function saveEvento($titulo, $contenido, $fecha, $ubicacion, $foto, $usuario) {
    try {
      $sql = "INSERT INTO Evento (titulo, contenido, fecha, ubicacion, foto, usuario)
      VALUES (:tit, :con, :fec, :ubi, :fot, :usu)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["tit" => $titulo, "con" => $contenido, "fec" => $fecha, "ubi" => $ubicacion, "fot" => $foto, "usu" => $usuario]);
      $id = $this->conn->lastInsertId();
    } catch(PDOException $e) {
      echo "ERROR EN DAOEvento: " . $e->getMessage();
      return null;
    }
    return $id;
  }

  function updateEvento($id, $titulo, $contenido, $fecha, $ubicacion, $foto){
      try {
          $sql = "UPDATE Evento SET titulo = :titulo, contenido = :contenido, fecha = :fecha,
          ubicacion = :ubicacion, foto = :foto WHERE id = :id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute(["titulo" => $titulo, "contenido" => $contenido, "fecha" => $fecha,
          "ubicacion" => $ubicacion, "foto" => $foto]);
        } catch(PDOException $e) {
          echo "ERROR EN DAOEvento: " . $e->getMessage();
          return false;
        }
      return true;
    }

    function deleteEvento($id){
          try {
          $sql = "DELETE FROM Evento WHERE id = :identificador";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute(["identificador" => $id]);
        } catch(PDOException $e) {
          echo "ERROR EN DAOEvento: " . $e->getMessage();
          return false;
        }
      return true;
    }

    function getListaEventosBuscador($titulo,$contenido,$fechaIni,$fechaFin,$ubicacion) {
      try {
        $sql = "SELECT titulo,contenido,usuario FROM Evento WHERE titulo LIKE :titulo
                AND contenido LIKE :contenido
                AND ubicacion LIKE :ubicacion
                AND fecha <= :fechaFin AND fecha >= :fechaIni";
        $stm = $this->conn->prepare($sql);
        $stm->execute(["titulo" => $titulo, "contenido" => $contenido, "ubicacion" => $ubicacion,
                       "fechaIni" => $fechaIni, "fechaFin" => $fechaFin]);
        $res = $stm->fetchAll();
      } catch (PDOException $e) {
        echo "ERROR EN DAOEvento: " . $e->getMessage();
      }
      return $res;
    }

}

?>
