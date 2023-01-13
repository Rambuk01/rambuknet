<?php
  session_start();
  require_once 'functions.php';
  $logintext = $login = $user = "";
  if(isset($_SESSION["user"])) {
    $userarray = $_SESSION["user"];
    $navn = $userarray[0];
    $stemmusik = $userarray[1];
    $stemfilm = $userarray[2];
    $id = $userarray[3];
    $loggedin = TRUE;
  } else $loggedin = FALSE;
  ($loggedin ? $logintext = "<a href='logout.php' class='navlink'>LOGOUT</a>" : $logintext = "<a href='login.php' class='navlink'>LOGIN</a>");

  echo <<<_END
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
    <script>
      function O(i) { return typeof i == 'object' ? i : document.getElementById(i); }
      function S(i) { return O(i).style; }
      function C(i) { return document.getElementsByClassName(i); }
    </script>
    <style>
      .img1 { background-image: url("img/math.jpg"); }
      .img2 { background-image: url("img/chemestry.jpg"); }
      .img3 { background-image: url("img/robotics.jpeg"); }
      .img4 { background-image: url("img/science.jpeg"); }
      .img5 { background-image: url("img/rocket.jpg"); }
    </style>
    <title>Rambuk</title>
  </head>
  <body>
    <nav>
      <a href="index.php" class="navlink">HJEM</a>
      <a href="opstil-ligning.php" class="navlink">MATEMATIK</a>
      <a href="#" class="navlink">FYSIK/KEMI</a>
      <a href="science.php" class="navlink">SCIENCE</a>
      <a href="webdesigntest.php" class="navlink">KONKURRENCEN!</a>
      $logintext
      <a href="#" class="navlink">$user</a>
    </nav>
_END;
?>
