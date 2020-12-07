<?php

session_start();
$_SESSION['type_infection']=$_POST['type_infection'];
$_SESSION['hospitalisation']=$_POST['hospitalisation'];

 if ($_SESSION['hospitalisation']<=$_SESSION['date_declaration'] && ($_SESSION['date_fin']>$_SESSION['date_declaration']|| strlen($_SESSION['date_fin'])==0)) {
    //la date de declaration ne peut pas etre avant la date d'hospi mais on tolére qu'elle soit après la sortie
    //date de fin après date declaration logiquement
    //strllen permet de verifier que la variable n'est pas de longueur 0 c'est à dire qu'elle n'est pas mentionnée puisque c'est autorisé (not requited) 
    header('Location: test_infection.php');
     exit();
 } else {
     header('Location: erreur_dates.php');
 exit();
 }
?>