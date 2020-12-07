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

        input.form-control,
        table {
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

        td,
        th {
            background-color: rgba(79, 121, 141, 0.9);
            color: #dae3e6;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <title>Confirmation enregistrement</title>
</head>

<body>


    <div class="col-md-4 offset-md-4">

        <form class="text-center p-4" method='POST' action="enregistrement_reussi.php">
            <p class="h2 mb-2" style="color:#93acb9; text-shadow: 2px 2px 5px#24363f">Confirmation de l'enregistrement</p>
            <br />
            <table class="table  table-bordered table-hover">
                <?php
                // affichage des variables session avant enregistrement
                foreach ($_SESSION as $k => $v) {
                    echo "<tr>";
                    echo "<td>" . $k . "</td><td>" . $v . "</td>";
                    echo "</tr>";
                }

                ?></table>
            <br />

            <button class="btn btn-info btn-block my-4" type="submit" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Confirmer</button>
            <button onclick="window.location.href='cancel_save.php'" class="btn btn-info btn-block my-4" type="button" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Retour</button>
        </form>
        <br />
    </div>

</body>

</html>