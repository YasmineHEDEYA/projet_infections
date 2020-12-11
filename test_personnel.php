<?php
session_start();
$_SESSION['site']=$_POST['site'];
$_SESSION['nom']=$_POST['nom'];
$_SESSION['prenom']=$_POST['prenom'];
$_SESSION['fonction']=$_POST['fonction'];

try {$bdd = new PDO('mysql:host=localhost;dbname=infection', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
       // $bdd = new PDO('mysql:host=localhost;dbname=infection', 'root', '', array(PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
        
} catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
};
$req = $bdd->prepare('SELECT id_personnel FROM personnel WHERE (nom_pers like :p_nom and prenom_pers like :p_prenom and fonction_pers like :p_fonction)');
$req->execute(array('p_nom' => $_POST['nom'], 'p_prenom' => $_POST['prenom'], 'p_fonction' => $_POST['fonction']));
$ligne = $req->fetch();

if ($ligne && $_POST['site']!="Site*") {
        $_SESSION['id_personnel']=$ligne['id_personnel'];
        header('Location: ajouter_infection_suite_1.php');
        exit();
} else {
        header('Location: personnel_introuvable.php');
    exit();
}
?>
