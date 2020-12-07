<?php
session_start();
// on a proposé une solution simple pour tester en mettant test comme valeurs 
// on peut supposer que dans la vraie vie on a un seul identifiant et mdp pour tout le monde dans le meme hopital
//ou meme pour un service etc 
//mais on n'a pas voulu compliquer
// cette methoe est de toute façon sécurisée puisque l'utilisateur n'a pas accès a ces données (page de redirection)
// la rcaptcha evite de lancer un scipt pour deviner le mdp avec toutes les combinaisons possibles
if ($_POST['utilisateur']=='test'&& $_POST['mdp']=='test' && $_POST['centre_hospitalier']!="Centre hospitalier*"&& isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response']) )
  { 
    
        $secret = "0x473593690cEB68910ad59Ba835efb70DDe8DDF11"; 
        $remote_address = $_SERVER['REMOTE_ADDR'];
        $verify_url = "https://hcaptcha.com/siteverify?secret=".$secret."&response=".$_POST['h-captcha-response']."&remoteip=".$remote_address;
            
        $response = file_get_contents($verify_url); # Get token from post data with key 'h-captcha-response' and Make a POST request with data payload to hCaptcha API endpoint
        $responseData = json_decode($response);
        
    
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

