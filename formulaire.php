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

    <title>Déclaration d'une infection</title>
</head>

<body>
    <div class="col-md-4 offset-md-4">




        <form method="post" class="text-center p-4">
            <p class="h2 mb-2" style="color:#93acb9; text-shadow: 2px 2px 5px#24363f">DECLARATION D'UNE INFECTION
            </p>
            <br />
            <legend>
                <h5 style="text-shadow: 2px 2px 5px #24363f">Personnel hospitalier déclarant</h5>
            </legend>
            <br />

            <p class="float-sm-left">* Information requise</p>
            <input type="text" name="nom" class="form-control" placeholder="Nom*" pattern="([^\s][A-z0-9À-ž\s]+)" maxLength='80' required>
            <br />
            <input type="text" name="prenom" class="form-control" placeholder="Prénom*" pattern="([^\s][A-z0-9À-ž\s]+)" maxLength='100' required>
            <br />
            <input type="text" name="fonction" class="form-control" placeholder="Fonction" pattern="([^\s][A-z0-9À-ž\s]+)" maxLength='80'>
            <br />
            <select class="form-control" name="site" placeholder="Site*" required>
                <option selected>Site*</option>
                <?php
                try {$bdd = new PDO('mysql:host=localhost;dbname=infection', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
                  
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                };
                $requete = 'SELECT id_site,nom_site FROM `site` JOIN
                centre_hospitalier using(id_centre) where nom_centre="' . $_SESSION['centre_hospitalier'] . '"';
                $resultat = $bdd->query($requete);
                $ligne = $resultat->fetch();
                // affichage des noms de sites correspondant au centre choisi
                while ($ligne) {

                    echo "<option >" . $ligne['nom_site'] . "</option> ";
                    $ligne = $resultat->fetch();
                };
                $resultat->closeCursor();

                ?>
            </select>
            <br />
            <button class="btn btn-info btn-block my-4" type="submit" formaction="test_personnel.php" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Suivant</button>
            <button onclick="window.location.href='acces_reussi_accueil.php'" class="btn btn-info btn-block my-4" type="button" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Retour menu principal</button>
                 <!-- javascript pour la bouton retour on click event -->
        </form>

               
    </div>

</body>

</html>