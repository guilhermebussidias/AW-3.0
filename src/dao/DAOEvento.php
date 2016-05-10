<?php

namespace aw\dao;

class DAOEvento {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }

  function getEvento($event) {
    try {
      $sql = "SELECT * FROM Evento WHERE titulo = :nombre";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["nombre" => $event]);
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
      $sql = "SELECT * FROM Evento ORDER BY fecha DESC LIMIT :siguienteElemento , :numElementos";
      $stmt = $this->conn->prepare($sql);
      $stm->execute(["siguienteElemento" => $sigElem, "numElementos" => $elementos]);
      $res = $stmt->fetchAll();
    } catch(PDOException $e) {
      echo "ERROR EN DAOEvento: " . $e->getMessage();
    }
    return $res;
  }

  function searchEvento($texto) {
    try {
      $sql = "SELECT * FROM Evento WHERE titulo LIKE '%:busqueda%' OR contenido LIKE '%:busqueda%'";
      $stmt = $this->conn->prepare($sql);
      $stm->execute(["busqueda" => $texto]);
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
      $stm->execute(["tit" => $titulo, "con" => $fec, "fec" => $fecha, "ubi" => $ubicacion, "fot" => $foto, "usu" => $usuario]);
      $res = $stmt->fetchAll();
      $id = $this->conn->lastInsertId();
    } catch(PDOException $e) {
      echo "ERROR EN DAOEvento: " . $e->getMessage();
      return null;
    }
    return $id;
  }

  function updateEvento($id, $titulo, $contenido, $fecha, $ubicacion, $foto, $usuario){
      try {
          $sql = "UPDATE Evento SET titulo = :titulo, contenido = :contenido, fecha = :fecha,
          ubicacion = :ubicacion, foto = :foto, usuario = :usuario WHERE id = :id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute(["titulo" => titulo, "contenido" => contenido, "fecha" => fecha,
          "ubicacion" => ubicacion, "foto" => foto, "usuario" => usuario]);
          $stmt->execute();
        } catch(PDOException $e) {
          echo "ERROR EN DAOPublicidad: " . $e->getMessage();
          return false;
        }
      return true;
    }

    function deleteEvento($id){
          try {
          $sql = "DELETE FROM Evento WHERE id = :identificador";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute(["identificador" => $id]);
          $stmt->execute();
        } catch(PDOException $e) {
          echo "ERROR EN DAOPublicidad: " . $e->getMessage();
          return false;
        }
      return true;
    }



}

?>
