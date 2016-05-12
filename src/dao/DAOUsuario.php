<?php

namespace aw\dao;

class DAOUsuario {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }

  function findByName($username) {
    try {
      $sql = "SELECT * FROM Usuario WHERE usuario = :nombre";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["nombre" => $username]);
      $res = $stmt->fetchAll();
    } catch(PDOException $e) {
  		echo "ERROR EN DAOUsuario: " . $e->getMessage();
  	}
    if (!empty($res)) {
      return $res[0];
    } else {
      return null;
    }
  }

  function persist($username, $password, $role) {
    try {
      $sql = "INSERT INTO Usuario (usuario, pass, rol) VALUES (:usuario, :pass, :rol)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["usuario" => $username, "pass" => $password, "rol" => $role]);
      $id = $this->conn->lastInsertId();
    } catch(PDOException $e) {
  		echo "ERROR EN DAOUsuario: " . $e->getMessage();
      return null;
  	}
    return $id;
  }

  function updateByName($username, $password, $role) {
      try {
        $sql = "UPDATE Usuario SET pass=:pass, rol=:rol WHERE usuario=:usuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["usuario" => $username, "pass" => $password, "rol" => $role]);
      } catch(PDOException $e) {
    		echo "ERROR EN DAOUsuario: " . $e->getMessage();
        return null;
    	}
      return true;
  }

  function delete($nombre) {
    try {
      $sql = "DELETE FROM Usuario WHERE usuario = :usuario ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["usuario" => $nombre]);
    } catch (PDOException $e) {
      echo "ERROR EN DAOUsuario: " . $e->getMessage();
      return null;
    }
    return true;
  }

}

?>
