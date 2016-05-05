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

}

?>
