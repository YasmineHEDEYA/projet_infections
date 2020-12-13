<?php

session_start();
$_SESSION['type_infection']=$_POST['type_infection'];
$_SESSION['hospitalisation']=$_POST['hospitalisation'];

try {$bdd = new PDO('mysql:host=localhost;dbname=infection', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
    // $bdd = new PDO('mysql:host=localhost;dbname=infection', 'root', '', array(PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
     die('Erreur : ' . $e->getMessage());
};
$req = $bdd->prepare('SELECT date_entree FROM  hospitalisation  WHERE id_hospi like :p_hospi ');
$req->execute(array('p_hospi' => $_SESSION['hospitalisation']));
$ligne = $req->fetch();

 if ($ligne['date_entree']<=$_SESSION['date_declaration'] && ($_SESSION['date_fin']>$_SESSION['date_declaration']|| strlen($_SESSION['date_fin'])==0)) {
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