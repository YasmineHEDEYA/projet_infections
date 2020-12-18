<?php
session_start();
$_SESSION['nature_infection']=$_POST['nature_infection'];
$_SESSION['cause_infection']=$_POST['cause_infection'];
$_SESSION['mode_transmission']='';
$_SESSION['nip_source']='';

if($_SESSION['cause_infection']!= htmlspecialchars($_SESSION['cause_infection'])||strlen($_SESSION['cause_infection'])==0){
// eviter d'entrer un champ vide en enlevant "required"
// on utilise html special chars car les patterns peuvent etre enlevès a partir du navigateur
    header('Location: erreur_saisie_infection_source.php');
exit();
} else {
header('Location: confirmation_enregistrement.php');
exit();
}
?>