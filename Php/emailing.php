<?php

$destinataire = "monadresseamoi@gmail.com"; // Mon adresse ou l'adresse où doit être envoyer le mail

$sujet = "Message de quelqu'un depuis monsiteamoi.com"; // Le sujet du mail 

$message = "un petit message de test pour voir si ça marche. Si ca marche, c'est cool."; // Le message du mail


//On veut verifier que quelque chose a été inscrit dans le formulaire, par conséquent verifier qu'il y a quelque chose dans $_get 

if( isset($_GET["expediteur"]) && isset($_GET["message"])){

    $headers = "From: ".$expediteur; // De la part de qui est le mail
    $expediteur = $_GET['expediteur'];
    $message = $_GET["contenuDuMessage"];


    if( mail($destinataire, $sujet, $message, $headers) ){
        echo "Le mail s'est envoye";
    }else{
    
        echo "le mail a foiré";
    }
}


?>


<!-- Cabler le formulaire sur les variables en réalisant les tests
sur les variables elles memes un à un 


Verifier et prouver que l'utilisateur n'a pas laissé de champs vides
->html (required)
->cote php 



et ce, jusqu'à ce que seule la fonction mail() pose probleme
-->


<!-- Les solutions alternatives


créez vous une vraie adresse gmail de test


SwiftMailer
PHPMailer


-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Title</title>
</head>

<body>



    <div class="container">

        <div class="col-10">

            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>



                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="9" name="contenuDuMessage"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>

    </div>











    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>