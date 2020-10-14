<?php

if (isset($_FILES['fichierEnvoye']['name'])) {
    $nomDeMonFichier  =  $_FILES['fichierEnvoye']['name'];

    $leNomTemporaireDuFichier = $_FILES['fichierEnvoye']['tmp_name'];

    $cheminDeDestination = "";

    $destinationFinale = $cheminDeDestination . $nomDeMonFichier;

    //methode pour copier des données dans un repertoire  -> copier un fichier

    if (move_uploaded_file($leNomTemporaireDuFichier, $destinationFinale)) {


        echo "fichier envoyé correctement. Bravo.";
    } else {

        echo "fichier PAS envoyé correctement. Déso";
    }
};



$monEcho = getimagesize($_FILES['fichierEnvoye']['name']) ; // information sur l'image hauteur largeur et mine type = extension du fichier

$mesExtensionAutorise = array('jpg','jpeg','png'); // Un tableau des extension autorisés 

$laHauteur = $monEcho[1];
$laLargeur = $monEcho[0];

$largeurMax = 920;
$hauteurMax = 720;

$leMimeType = $monEcho ["mime"];

// On veut explorer la variable $leMimeType pour obtenir un tableau qui va contenir =  $monTableau = array ("image","png")
// $monExtension = $monTableau[1]
$monExtension = $leMimeType;


// on veut verifier si $monExtension fait bien partie du tableau $mesExtensionAutorise
// si c'est le cas on accepte l'upload


$monEcho = filesize($_FILES['fichierEnvoye']['name']) ; // information sur le poids de l'image (taille en octet)



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Envoi de fichier</title>
</head>

<body>




    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input name="fichierEnvoye" type="file" class="form-control-file" id="exampleFormControlFile1">

            <button type="submit" class="btn btn-primary">Submit</button></div>

            <?php echo $monEcho ?>
    </form>








    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>