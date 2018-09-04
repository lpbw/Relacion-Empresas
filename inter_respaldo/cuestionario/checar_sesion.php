<?php
session_name("encuesta2");
session_start();


if ($_SESSION['idU']=="" || !$_SESSION['idU'] ){

	include "index.php";

exit();

}

?>