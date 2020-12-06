<?php
session_start();

if ($_POST['utilisateur']=='test'&& $_POST['mdp']=='test' && $_POST['centre_hospitalier']!="Centre hospitalier*" )
  { 
    $_SESSION['centre_hospitalier']=$_POST['centre_hospitalier'];
    header('Location: acces_reussi_accueil.php');
    exit();
  }
else {
    $_SESSION['centre_hospitalier']=$_POST['centre_hospitalier'];
    header('Location: connexion_non_reussie.php');
    exit();
}
?>

