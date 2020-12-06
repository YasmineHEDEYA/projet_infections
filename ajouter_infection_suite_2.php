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
        
        .form-control,table{
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
        td,th{
            background-color: rgba(79, 121, 141, 0.9);
            color: #dae3e6;
        }
        
        
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script>
        $('.datepicker').datepicker();
    </script>

    <title>Déclaration d'une infection suite 2</title>
</head>

<body>
    <div class="col-md-4 offset-md-4">
       

        <div >

            <form class="text-center p-4" method='POST' action="test_hospitalisation.php">
                <p class="h2 mb-2" style="color:#93acb9; text-shadow: 2px 2px 5px#24363f">DECLARATION D'UNE INFECTION
                </p>
                <br />
                
                <legend>
                    <h5 style="text-shadow: 2px 2px 5px #24363f">Hospitalisations</h5>
                </legend>
                <br />
                <table class="table  table-hover">
                    <tr><th></th><th>Date d'entrée</th><th>Date de sortie</th></tr>
                    <?php
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=infection', 'root', '', 	array(PDO::ATTR_ERRMODE => 	PDO::ERRMODE_EXCEPTION));
                }
                catch (Exception $e)
                {
                        die('Erreur : ' . $e->getMessage());
                };
               
                $req = $bdd->prepare('SELECT date_entree,date_sortie FROM  est_hospitalise 
                 WHERE nip like :p_nip and id_service like :p_service');
                $req->execute(array('p_nip' => $_SESSION['nip'], 'p_service' => $_SESSION['service']));
                $ligne = $req->fetch(); 
                
                  while ($ligne)
                    {  

                   echo "<tr>";
                   echo "<td><label><input type='radio' value=".$ligne['date_entree']." name='hospitalisation'checked/></label></td>";
                    echo "<td>".$ligne['date_entree']."</td> ";
                    echo "<td>".$ligne['date_sortie']."</td> ";
                    echo "</tr>";
                    $ligne = $req->fetch(); 
                                           
                    } ;
                    $req->closeCursor();
                
                ?>
                </table>
                <legend>
                    <h5 style="text-shadow: 2px 2px 5px #24363f">Type de l'infection</h5>
                </legend>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type_infection" id="infection_source" value="infection_source" checked>
                    <label class="form-check-label" for="inlineRadio1">Infection source</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type_infection" id="infection_cible" value="infection_cible">
                    <label class="form-check-label" for="inlineRadio2">Infection cible</label>
                </div>
                <button class="btn btn-info btn-block my-4" type="submit" style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Suivant</button>
                <button onclick="window.location.href='ajouter_infection_suite_1.php'"  class="btn btn-info btn-block my-4" type="button"  style="background-color:#4f798d ;box-shadow:2px 2px 5px #24363f">Retour</button>

            </form>
            
        </div>
    </div>

</body>

</html>