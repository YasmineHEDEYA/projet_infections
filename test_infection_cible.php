<?php
session_start();
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=infection', 'root', '', 	array(PDO::ATTR_ERRMODE => 	PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
};
$requete = 'SELECT * FROM service JOIN est_hospitalise using(id_service)
join `site` using (id_site) where nip = '.$_POST['nip_source'];
               $resultat=$bdd->query($requete);
                
                $ligne = $resultat->fetch(); 
                //impossible que la source et la cible ne soient pas dans le meme site
                //on a accepté qu'ils soient pas dans le meme service
                //impossible que le patient se contamine lui meme
                if($_POST['nip_source']==$_SESSION["nip"]|| !$ligne)
                $test=false;
                else $test=true;
                $resultat->closeCursor();

$_SESSION['nature_infection']='';
$_SESSION['cause_infection']='';
$_SESSION['mode_transmission']=$_POST['mode_transmission'];
$_SESSION['nip_source']=$_POST['nip_source'];
if($_SESSION['mode_transmission']!= htmlspecialchars($_SESSION['mode_transmission'])|| $_SESSION['nip_source']!= htmlspecialchars($_SESSION['nip_source'])||!$test){

    header('Location: erreur_saisie_infection_cible.php');
exit();
} else {
header('Location: confirmation_enregistrement.php');
exit();
}
?>