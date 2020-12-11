<?php
session_start();

//matching to the enum type on DB
if ($_SESSION['nature_infection'] == 'infection_endogene')
    $nature = 'endogene';
else $nature = 'exogene';
if ($_SESSION['type_infection'] == "infection_source")
    $type = "source";
else $type = "cible";

try {$bdd = new PDO('mysql:host=localhost;dbname=infection', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
   // $bdd = new PDO('mysql:host=localhost;dbname=infection', 'root', '', array(PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
};
$req = 'INSERT INTO infection (date_declaration,date_fin,type_inf,id_personnel,nip) VALUES 
("' . $_SESSION['date_declaration'] . '" , "' . $_SESSION['date_fin'] . '" , "' . $type . '" , ' . $_SESSION['id_personnel'] . ' , ' . $_SESSION['nip'] . ')';
// requete insertion sur la table infection
// contient un trigger qui va remplir la table infection_source ou
// infection_cible avec l'identifiant et les données déja saisies sur la table mère
$resultat = $bdd->query($req);
$req2 = 'SELECT LAST_INSERT_ID()';
// avoir l'id de la dernère infection ajoutée pour pouvoir modifier la ligne
// dans la table spécifique avec les données manquantes lors du 1er ajout
if ($type == 'cible')
    $req3 = 'update infection_cible set transmission="' . $_SESSION['mode_transmission'] . '", id_inf_INFECTION_SOURCE=' . $_SESSION['nip_source'] . ', id_personnel=' . $_SESSION['id_personnel'] . ', nip=' . $_SESSION['nip'] . ' where id_inf=(' . $req2 . ')';
else
    $req3 = 'update infection_source set nature="' . $nature . '", cause="' . $_SESSION['cause_infection'] . '", id_personnel=' . $_SESSION['id_personnel'] . ', nip=' . $_SESSION['nip'] . ' where id_inf=(' . $req2 . ')';

$resultat1 = $bdd->query($req3);
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        form {
            background-color: rgba(177, 87, 102, 0.9);
            box-shadow: 2px 2px 5px #24363f;
            margin-top: 10vh;
            margin-bottom: 10vh;
        }

        input.form-control {
            box-shadow: 2px 2px 5px #24363f;
        }

        h5,
        label {
            color: #dae3e6;
        }

        p {
            color: white;
            font-size: 0.8em;
        }

        body {
            background-image: url("inf.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100%;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <title>Enregistrement réussi</title>
</head>

<body>


    <div class="col-md-4 offset-md-4">

        <form class="text-center p-4">
            <p class="h2 mb-2" style="color:#93acb9; text-shadow: 2px 2px 5px#24363f">Enregistrement réussi!</p>
            <br />

            <br />
            <img src="happy.png" width=150em height=150em>
            <button class="btn btn-info btn-block my-4" formaction="acces_reussi_accueil.php" type="submit" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Retour menu principal</button>
            <button class="btn btn-info btn-block my-4" type="submit" formaction="ajouter_infection_suite_1.php" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Ajouter une autre infection</button>
        </form>
        <br />
    </div>

</body>

</html>