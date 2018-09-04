<?
session_name("encuesta");
session_start();

$_SESSION="";
session_destroy();
header("Location: index.php");

?>