<?php

namespace aw\dao;

use PDO;

class Connection {

  static function getConnection() {
    try {
      $tmpl = "mysql:host=%s;dbname=%s";
      $uri = sprintf($tmpl, DB_HOST, DB_NAME);
      $conn = $conn = new PDO($uri, DB_USER, DB_PASS);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
  		echo "ERROR EN CONEXION A BD: " . $e->getMessage();
  	}
    return $conn;
  }

}
 ?>
