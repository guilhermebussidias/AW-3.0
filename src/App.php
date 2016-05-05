<?php

require_once dirname(__DIR__) . "/config/config.php";

session_start();

spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = BASE_NAMESPACE;

    // base directory for the namespace prefix
    $base_dir = SRC_PATH;

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

function getRole() {
  if (isset($_SESSION["rol"])) {
    return $_SESSION["rol"];
  } else {
    return null;
  }
}

function getName() {
  if (isset($_SESSION["nombre"])) {
    return $_SESSION["nombre"];
  } else {
    return null;
  }
}

function getCSSPath() {
  return CSS_URL;
}

function getImgPath() {
  return IMG_URL;
}

function getJSPath() {
  return JS_URL;
}

?>
