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
            margin-top: 25%;
            margin-bottom: 25%;
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
    <script>
        $('.datepicker').datepicker();
    </script>

    <title>Date de déclaration de l'infection</title>
</head>

<body>
    <div class="col-md-4 offset-md-4">

        <form class="text-center p-4" method='POST' action="infection1.php?SearchCritere=date_declaration">

            <legend>
                <h5 style="text-shadow: 2px 2px 5px #24363f">Veuillez choisir la date concernée</h5>
                <br />
                <p class="float-sm-left">* Information requise</p>
                <select class="form-control" name="declaration" placeholder="Date*" required>
                    <option selected>Date*</option>
                    <?php
                    include("connexion.php");

                    $requete = 'SELECT date_declaration FROM `centre_hospitalier` 
                LEFT JOIN `site` ON `site`.`id_centre` = `centre_hospitalier`.`id_centre` 
                LEFT JOIN `service` ON `service`.`id_site` = `site`.`id_site` 
                LEFT JOIN `est_hospitalise` ON `est_hospitalise`.`id_service` = `service`.`id_service` 
                LEFT JOIN `infection` ON `infection`.`nip` = `est_hospitalise`.`nip` where nom_centre="' . $_SESSION['centre_hospitalier'] . '"';
                    $resultat = $bdd->query($requete);
                    $ligne = $resultat->fetch();

                    if ($ligne != NULL) {

                        echo "<option>" . $ligne['date_declaration'] . "</option> ";
                        $ligne = $resultat->fetch();
                    }
                    $resultat->closeCursor();
                    ?>
                </select>

                <br />
                <button class='btn btn-info btn-block my-4' type='submit' style='background-color:#4f798d ;box-shadow:2px 2px 5px #24363f'>Suivant</button>
                <button onclick="window.location.href='recherche_infection.php'" class="btn btn-info btn-block my-4" type="button" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Retour</button>

        </form>

    </div>

</body>

</html>