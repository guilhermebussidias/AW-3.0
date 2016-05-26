<?php
$csrf_token_key = CSRF_TOKEN_KEY;

if (!isset($_SESSION[$csrf_token_key])) {
  $_SESSION[$csrf_token_key] = randHex(); // randHex está en App.php
}
?>
<input type="hidden" name="<?= $csrf_token_key ?>" value="<?= $_SESSION[$csrf_token_key] ?>">
