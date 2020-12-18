<?php
session_start();
date_default_timezone_set('Europe/Paris');
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


    <title>Déclaration d'une infection suite 1</title>
</head>

<body>
    <div class="col-md-4 offset-md-4">


        <div>

            <form class="text-center p-4" method='POST' action="test_patient.php">
                <p class="h2 mb-2" style="color:#93acb9; text-shadow: 2px 2px 5px#24363f">DECLARATION D'UNE INFECTION
                </p>
                <br />

                <legend>
                    <h5 style="text-shadow: 2px 2px 5px #24363f">Patient infecté</h5>
                </legend>
                <br />
                <select class="form-control" name="service" placeholder="Service*" required>
                    <option selected>Service*</option>
                    <?php
                    try {$bdd = new PDO('mysql:host=localhost;dbname=infection', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
                       
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    };
                    // affichage des services dans le centre sélectionné avant
                    $requete = 'SELECT id_service,nom_service FROM `service` JOIN
                        `site` using(id_site) where nom_site="' . $_SESSION['site'] . '"';
                    $resultat = $bdd->query($requete);
                    $ligne = $resultat->fetch();

                    while ($ligne) {

                        echo "<option value=" . $ligne['id_service'] . ">" . $ligne['nom_service'] . "</option> ";
                        $ligne = $resultat->fetch();
                    };
                    $resultat->closeCursor();

                    ?>
                </select>
                <br />
                <input type="text" class="form-control" placeholder="Numéro d'Identifiant Permanent*" pattern="[0-9]{6}" maxLength='6' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="nip" name='nip' required>
                <br />
                <div id="date-picker" class="md-form md-outline input-with-post-icon datepicker">
                    <input name='date_declaration' max='<?php echo date('Y-m-d'); ?>' placeholder="Date de déclaration*" type="test" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_declaration" class="form-control" required>
                    <i class="fas fa-calendar input-prefix" tabindex=0></i>
                </div>
                <!-- le champ pour les dates change de type pour pouvoir afficher un place holder ( valable uniqueemnt pour type texte )
                on focus le champ devient de format date
                limitation des dates pour la date d'aujourd'hui (plus logique) -->
                <br />
                <div id="date-picker" class="md-form md-outline input-with-post-icon datepicker">
                    <input name='date_fin' max='<?php echo date('Y-m-d'); ?>' placeholder="Date de fin" type="test" onfocus="(this.type='date')" onblur="(this.type='text')" name="date_guerison" class="form-control">
                    <i class="fas fa-calendar input-prefix" tabindex=0></i>
                </div>
                <br />
                <button class="btn btn-info btn-block my-4" type="submit" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Suivant</button>
                <button onclick="window.location.href='formulaire.php'" class="btn btn-info btn-block my-4" type="button" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Retour</button>
                <!-- le bouton n'est pas en liaison avec le formulaire on peut retourner meme sans avoir rempli celui ci
                        creation d'un event avec JS on click pour renvoyer à la page précédente -->
            </form>

        </div>
    </div>

</body>

</html>