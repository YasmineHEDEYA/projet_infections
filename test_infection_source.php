<?php
session_start();
$_SESSION['nature_infection']=$_POST['nature_infection'];
$_SESSION['cause_infection']=$_POST['cause_infection'];

if($_SESSION['cause_infection']!= htmlspecialchars($_SESSION['cause_infection'])){

    header('Location: erreur_saisie_infection_source.php');
exit();
} else {
header('Location: confirmation_enregistrement.php');
exit();
}
?>