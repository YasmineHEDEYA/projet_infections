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

    <title>Spécifications infections</title>
</head>

<body>
    <div class="col-md-12">

        <form method="post" class="text-center p-4">
            <p class="h2 mb-2" style="color:#93acb9; text-shadow: 2px 2px 5px#24363f">INFORMATIONS COMPLEMENTAIRES</p>
            <br />
            <legend>
                <h5 style="text-shadow: 2px 2px 5px #24363f">Voici le résultat de votre requête</h5>
            </legend>
            <br />
            <table class="table  table-hover">
                <?php
                include("connexion.php");

                $req = $bdd->prepare('SELECT nature, cause
                FROM `infection_source` 
                    WHERE id_inf = :p_inf');

                $req1 = $bdd->prepare('SELECT id_inf_INFECTION_SOURCE, transmission
                FROM `infection_cible` 
                    WHERE id_inf = :p_inf');

                if ($_REQUEST['type_inf'] == "source") {
                    $req->execute(array(':p_inf' => $_REQUEST['id_inf']));
                    $ligne = $req->fetch();
                    echo "<thead><tr><th>NATURE</th><th>CAUSE</th><th>PLUS</th></tr></thead>";
                    while ($ligne) {
                        echo "<tr>";
                        echo "<td>" . $ligne['nature'] . "</td> ";
                        echo "<td>" . $ligne['cause'] . "</td> ";
                        echo "<td width='10%'><button class='btn btn-info btn-block' style='background-color:#4f798d ;box-shadow:2px 2px 5px #24363f'><a href='hospi.php?id_inf=" . $_REQUEST['id_inf'] . "'>hospitalisation</a></button></td>";
                        echo "</tr>";
                        $ligne = $req->fetch();
                    }
                }
                $req->closeCursor();

                if ($_REQUEST['type_inf'] == "cible") {
                    $req1->execute(array(':p_inf' => $_REQUEST['id_inf']));
                    $ligne = $req1->fetch();
                    echo "<thead><tr><th>NATURE</th><th>CAUSE</th><th>PLUS</th></tr></thead>";
                    while ($ligne) {
                        echo "<tr>";
                        echo "<td>" . $ligne['nature'] . "</td> ";
                        echo "<td>" . $ligne['cause'] . "</td> ";
                        echo "<td width='10%'><button class='btn btn-info btn-block' style='background-color:#4f798d ;box-shadow:2px 2px 5px #24363f'><a href='hospi.php?type_inf=" . $_REQUEST['id_inf'] . "'>hospitalisation</a></button></td>";
                        echo "</tr>";
                        $ligne = $req1->fetch();
                    }
                }
                $req1->closeCursor();

                ?>
            </table>
            <br />
            <button onclick="window.location.href='acces_reussi_accueil.php'" class="btn btn-info my-4" type="button" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Retour menu principal</button>
        </form>

    </div>

</body>

</html>