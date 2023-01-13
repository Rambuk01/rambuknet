<?php
//localhost
/*
$dbhost = "localhost";
$dbname = "rambuk";
$dbuser = "";
$dbpass = "";
$salt1 = "qw@3";
$salt2 = "€e!d";
*/

//Rambuk.net
  $absolute_path = "http://rambuk.net";
  $dbhost = "localhost";
  $dbname = "rambukne_rambuk";
  $dbuser = "rambukne_rambuk";
  $dbpass = "";

///////////////////////////////////////////////////////////////////////////////
// $c = the mysqli connection.
$c = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($c->connect_error) die($c->connect_error);

function request($query) {
  global $c;
  $result = $c->query($query);
  if(!$result) die("Connection failed: " . $c->error);
  return $result;
}

function clean($input) {
  $input = stripslashes($input);
  $input = strip_tags($input);
  $input = htmlentities($input);
  $input = str_replace("/", "", $input);
  return $input;
}
function cleanSQL($string) {
  global $c;
  $string = clean($string);
  return $c->real_escape_string($string);
}

function checkExist($email, $forename, $surname) {
  global $c;
  $mailquery = "SELECT * FROM users WHERE email='$email'";
  $mailresult = $c->query($mailquery);
  $namequery = "SELECT * FROM users WHERE forename='$forename' AND surname='$surname'";
  $nameresult = $c->query($namequery);
  if(!$mailresult) die("Connection failed: " . $c->error);
  if($mailresult->num_rows) return true;
  else if($nameresult->num_rows) return true;
  else return false;
}
function destroySession()
{
  $_SESSION=array();

  if (session_id() != "" || isset($_COOKIE[session_name()]))
    setcookie(session_name(), '', time()-2592000, '/');

  session_destroy();
}

function redirect($url) {
  ob_start();
  header('Location: '.$url);
  ob_end_flush();
  die();
}
