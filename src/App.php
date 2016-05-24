<?php

require_once dirname(__DIR__) . "/config/config.php";

/******************************************************************************/

session_start();

/******************************************************************************/

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

/******************************************************************************/

function sessionLogin($name, $role, $id) {
  $_SESSION["name"] = $name;
  $_SESSION["role"] = $role;
  $_SESSION["id"] = $id;
}

function sessionLogout() {
  unset($_SESSION["name"]);
  unset($_SESSION["role"]);

  session_destroy();
  session_start();
}

function getRole() {
  if (isset($_SESSION["role"])) {
    return $_SESSION["role"];
  } else {
    return null;
  }
}

function getName() {
  if (isset($_SESSION["name"])) {
    return $_SESSION["name"];
  } else {
    return null;
  }
}

function getID() {
  if (isset($_SESSION["id"])) {
    return $_SESSION["id"];
  } else {
    return null;
  }
}

function isLogged() {
  return !isnull(getRole());
}

function isAdmin() {
  return getRole() === "admin";
}

/******************************************************************************/

function getCSSPath() {
  return CSS_URL;
}

function getImgPath() {
  return IMG_URL;
}

function getJSPath() {
  return JS_URL;
}

function getBasePath() {
  return BASE_URL;
}

function getIncludePath() {
  return INCLUDE_PATH;
}

function getUploadPath() {
  return UPLOAD_PATH;
}

function getUploadedImagePath() {
  return UPLOADED_URL;
}

/******************************************************************************/

/*function redirect($url, $statusCode = 302) {
   header('Location: ' . $url, true, $statusCode);
   die();
}*/

function redirect($url, $secs = 0) {
  header("Refresh: {$secs}; URL={$url}");
}

/******************************************************************************/

function randHex($bytes = 32) {
  return bin2hex(openssl_random_pseudo_bytes($bytes));
}

/******************************************************************************/

function compare_constant($a, $b) { // Comparación en tiempo constante
  $lena = strlen($a);
  $lenb = strlen($b);
  $eq = true;
  for ($i = 0; $i < min($lena, $lenb); $i++) {
    $eq &= ($a[$i] === $b[$i]);
  }
  return ($lena === $lenb) && $eq;
}

function echoCSRFField($key = CSRF_TOKEN_KEY) {
  if (!isset($_SESSION[$key])) {
    $_SESSION[$key] = randHex();
  }
  echo "
    <input type=\"hidden\" name=\"{$key}\" value=\"{$_SESSION[$key]}\">
  ";
}

function checkCSRFField($key = CSRF_TOKEN_KEY) {
  return compare_constant($_SESSION[$key], $_REQUEST[$key]);
}

/******************************************************************************/

function esc($s) {
  return strip_tags(trim($s));
}

function escURL($s) {
  $url = trim($s);
  /*$ok = ((strpos($url, "http://") === 0 || strpos($url, "https://") === 0) &&
    filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED | FILTER_FLAG_HOST_REQUIRED) !== false);*/
  $ok = filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED);
  if ($ok)
    return $url;
  else
    return "";
}

?>
