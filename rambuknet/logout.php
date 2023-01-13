<?php
  session_start();
  
  require_once 'php/functions.php';
  destroySession();

  //unset($_SESSION["nome"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
  header("Location: index.php");
?>
