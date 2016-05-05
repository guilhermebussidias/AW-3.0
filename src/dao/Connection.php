<?php

namespace aw\dao;

use PDO;

class Connection {

  private static $instance;

  private $connection;

  static function getInstance() {
    if (!self::$instance instanceof self) {
      self::$instance = new self;
    }
    return self::$instance;
  }

  static function createConnection() {
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

  private function __construct() {
    $this->connection = $this->createConnection();
  }

  function getConnection() {
    return $this->connection;
  }

}
 ?>
