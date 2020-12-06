<?php

session_start();
$_SESSION['type_infection']=$_POST['type_infection'];
$_SESSION['hospitalisation']=$_POST['hospitalisation'];

 if ($_POST['hospitalisation']<=$_SESSION['date_declaration'] && ($_SESSION['date_fin']>$_SESSION['date_declaration']|| strlen($_SESSION['date_fin'])==0)) {
     header('Location: test_infection.php');
     exit();
 } else {
     header('Location: erreur_dates.php');
 exit();
 }
?>