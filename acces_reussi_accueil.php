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
            margin-top: 20vh;
            margin-bottom: 20vh;
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

    <title>Accueil</title>
</head>

<body>

    <br />

    <div class="col-md-6 offset-md-3">

        <form class="text-center p-4" method="POST">
            <p class="h2 mb-2" style="color:#93acb9; text-shadow: 2px 2px 5px#24363f">Bienvenue dans le <?php echo $_SESSION['centre_hospitalier'] ?></p>
            <br />
            <div class="col-md-6 offset-md-3">
                <button class="btn btn-info btn-block my-4" type="submit" formaction="formulaire.php" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Ajouter une infection</button>
                <button class="btn btn-info btn-block my-4" type="submit" formaction="recherche_infection.php" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Rechercher une infection</button>
                <button class="btn btn-info btn-block my-4" type="submit" formaction="deconnexion.php" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Déconnexion</button>
            </div>
        </form>
        <br />
    </div>

</body>

</html>