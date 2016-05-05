<?php

namespace aw\logic;

class Usuario {

  private $daoUsuario;

  function __construct() {
    $this->daoUsuario = new \aw\dao\DAOUsuario();
  }

  function login($username, $password) {
    $user = $this->daoUsuario->getUsuario($username);
    if (is_null($user)) {
      return false;
    }
    $realPass = $user["pass"];
    $ok = strcmp($password, $realPass) === 0;
    if ($ok) {
      $_SESSION["username"] = $username;
      $_SESSION["rol"] = $user["rol"];
    }
    return $ok;
  }
}


?>
