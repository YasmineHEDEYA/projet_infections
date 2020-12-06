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
   
    <title>Infection source</title>
</head>

<body>

    <br />

    <div class="col-md-6 offset-md-3">

        <form class="text-center p-4" method='POST'action="test_infection_source.php">
            <p class="h2 mb-2" style="color:#93acb9; text-shadow: 2px 2px 5px#24363f">INFECTION SOURCE</p>
            <br />
            <legend>
                <h5 style="text-shadow: 2px 2px 5px #24363f">Nature de l'infection</h5>
            </legend>
            <br />
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="nature_infection" id="infection_exogene" value="infection_exogene" checked>
                <label class="form-check-label" for="inlineRadio1"> Infection exogène</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="nature_infection" id="infection_endogene" value="infection_endogene">
                <label class="form-check-label" for="inlineRadio2">Infection endogène</label>
            </div>
            <br />
            <br />
            <legend>
                <h5 style="text-shadow: 2px 2px 5px #24363f">Cause de l'infection</h5>
            </legend>
            <br />
            <input type="text" name="cause_infection" class="form-control" placeholder="Cause de l'infection*" pattern="([^\s][A-z0-9À-ž\s]+)" maxLength='100' required>
            <br />
            <p class="float-sm-left">* Information requise</p>
            <br />
            <button class="btn btn-info btn-block my-4" type="submit" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Suivant</button>
            <button onclick="window.location.href='ajouter_infection_suite_2.php'"  class="btn btn-info btn-block my-4" type="button"  style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Retour</button>
        </form>
        <br />
    </div>

</body>

</html>