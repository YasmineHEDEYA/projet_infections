<?php
session_start();


 if ($_POST['type_infection']=="infection_source") {
     header('Location: infection_source.php');
     exit();
 } else {
     header('Location: infection_cible.php');
 exit();
 }
?>