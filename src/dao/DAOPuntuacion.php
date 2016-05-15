<?php

namespace aw\dao;

use DAOException;

class DAOPuntuacion {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }

  function savePuntuacion ($idUsuario,$idServicio,$puntuacion){
    try {
      $sql = "INSERT INTO Puntua (usuario, servicio, puntuacion)
              VALUES (:idUsuario, :idServicio, :puntuacion)";
      $stm = $this->conn->prepare($sql);
      $stm->execute(["idUsuario" => $idUsuario, "idServicio" => $idServicio,
                     "puntuacion" => $puntuacion]);
     $id = $this->conn->lastInsertId();
    } catch (PDOException $e) {
      echo "ERROR EN DAOPuntuacion: " . $e->getMessage();
    }
    return $id;
  }

  function calculaMedia($idServicio){
    try {
      $sql = "SELECT AVG(puntuacion) as media FROM Puntua WHERE servicio =:idServicio";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["idServicio" => $idServicio]);
      $res = $stmt->fetch();
    } catch (PDOException $e) {
      echo "ERROR EN DAOPuntuacion: " . $e->getMessage();
    }
    if (!empty($res)) {
      return $res['media'];
    } else {
      return null;
    }
  }

}

?>
