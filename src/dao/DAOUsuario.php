<?php

namespace aw\dao;

class DAOUsuario {

  private $conn;

  function __construct() {
    $this->conn = \aw\dao\Connection::getInstance()->getconnection();
  }

  function getUsuario($username) {
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

  function saveUsuario($username, $password) {
    try {
      $sql = "INSERT INTO Usuario (usuario, pass, rol) VALUES (:usuario, :pass, :rol)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(["usuario" => $username, "pass" => $password, "rol" => "normal"]);
      $stmt->execute();
      $id = $this->conn->lastInsertId();
    } catch(PDOException $e) {
  		echo "ERROR EN DAOUsuario: " . $e->getMessage();
  	}
    return $id;
  }

  function updateUsuario($id, $username, $password, $role) {
      try {
        $sql = "INSERT INTO Usuario (id, usuario, pass, rol) VALUES (:id, :usuario, :pass, :rol)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["id" => $id, "usuario" => $username, "pass" => $password, "rol" => $role]);
        $stmt->execute();
      } catch(PDOException $e) {
    		echo "ERROR EN DAOUsuario: " . $e->getMessage();
    	}
  }

}

?>
