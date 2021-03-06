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
        
        .form-control{
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

    <title>Personnel déclarant</title>
</head>

<body>
    <div class="col-md-4 offset-md-4">

            <form class="text-center p-4" method='POST' action="infection1.php?SearchCritere=infection.id_personnel">
                
                <legend>
                    <h5 style="text-shadow: 2px 2px 5px #24363f">Veuillez saisir l'identifiant du personnel concerné</h5>
                <br/>
                <p class="float-sm-left">* Information requise</p>
                <input type="text" class="form-control" placeholder="Identifiant du personnel*" pattern="[0-9]" maxLength='6' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="idpersonnel" name='id_personnel' required>
        
                <br />
                <button class="btn btn-info btn-block my-4" type="submit" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Suivant</button>
                <button onclick="window.location.href='recherche_infection.php'"  class="btn btn-info btn-block my-4" type="button"  style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Retour</button>

            </form>
            
    </div>

</body>

</html>