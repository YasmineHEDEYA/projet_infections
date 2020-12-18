<?php
session_start();
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
            margin-right: 25%;
            margin-left: 25%;
            width: 50%;
        }

        .form-control {
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

        a {
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

        th {
            background-color: #dae3e6;
            color: #24363f;

        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <title>Liste des patients</title>
</head>

<body>
    <div class="col-md-12">

        <form method="post" class="text-center p-4">
            <p class="h2 mb-2" style="color:#93acb9; text-shadow: 2px 2px 5px#24363f">LES PATIENTS</p>
            <br />
            <legend>
                <h5 style="text-shadow: 2px 2px 5px #24363f">Veuillez cliquer sur le button "supprimer" pour supprimer le patient concerné</h5>
            </legend>
            <br />
            <table class="table  table-hover">
                <?php
                include("connexion.php");

                $req = $bdd->prepare('SELECT DISTINCT patient.nip, nom_pat, prenoms_pat, date_naiss_pat
                FROM `centre_hospitalier` 
                    LEFT JOIN `site` ON `site`.`id_centre` = `centre_hospitalier`.`id_centre` 
                    LEFT JOIN `service` ON `service`.`id_site` = `site`.`id_site`
                    LEFT JOIN `hospitalisation` ON `hospitalisation`.`id_service` = `service`.`id_service`
                    LEFT JOIN `patient` ON `patient`.`nip` = `hospitalisation`.`nip`
                    WHERE nom_centre = :p_centre');

                    $req->execute(array(':p_centre' => $_SESSION['centre_hospitalier']));
                    $ligne = $req->fetch();
                    echo "<thead><tr><th>NIP</th><th>NOM</th><th>PRENOM</th><th>DATE DE NAISSANCE</th><th>PLUS</th></tr></thead>";
                    while ($ligne) {
                        echo "<tr>";
                        echo "<td>" . $ligne['nip'] . "</td> ";
                        echo "<td>" . $ligne['nom_pat'] . "</td> ";
                        echo "<td>" . $ligne['prenoms_pat'] . "</td> ";
                        echo "<td>" . $ligne['date_naiss_pat'] . "</td> ";
                        echo "<td width='10%'><button class='btn btn-info btn-block' style='background-color:#4f798d ;box-shadow:2px 2px 5px #24363f'><a href='doublons.php?patnip=" . $ligne['nip'] . "'>Supprimer</a></button></td>";
                        echo "</tr>";
                        $ligne = $req->fetch();
                    }
                $req->closeCursor();

                ?>
            </table>
            <br />
            <button onclick="window.location.href='acces_reussi_accueil.php'" class="btn btn-info my-4" type="button" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Retour menu principal</button>
        </form>

    </div>

</body>

</html>