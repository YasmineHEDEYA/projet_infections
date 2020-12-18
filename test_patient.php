<?php
session_start();
$_SESSION['nip']=$_POST['nip'];
$_SESSION['service']=$_POST['service'];
$_SESSION['date_declaration']=$_POST['date_declaration'];
$_SESSION['date_fin']=$_POST['date_fin'];

try {$bdd = new PDO('mysql:host=localhost;dbname=infection', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
       
} catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
};
$req = $bdd->prepare('SELECT nip FROM patient join hospitalisation using(nip)
join `service` using(id_service) WHERE nip like :p_nip and id_service like :p_service');

$req->execute(array('p_nip' => $_SESSION['nip'], 'p_service' => $_POST['service']));
$ligne = $req->fetch();

 if ($ligne && $_POST['service']!='Service*' && strlen($_POST['date_declaration'])!=0 ) {
         header('Location: ajouter_infection_suite_2.php');
         exit();
 } else {
         header('Location: patient_introuvable.php');
    exit();
 }
 
?>
