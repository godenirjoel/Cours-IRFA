<?php 

    // Quand on envoie un fichier via FILES, le fichier est mis en attente dans un repertoir temporaire, il faut donc stipuler le nom du fichier envoyer et le chemin où le fichier doit aller 

    $monFichier = $_FILES["monFichier"]["name"]; // Pour récupérer le nom du fichier envoyé 
    $leNomTemporaireDuFichier = $_FILES["monFichier"]["tmp_name"]; // tmp_name est l'adresse temporaire du fichier

    $cheminDestination = ""; // Permet ultérieurement de donner le chemin à mettre en place 
    $maDestinationFinal = $cheminDestination.$monFichier; // Donne le nom du fichier et le chemin du fichier 

    $extension = new SplFileInfo($monFichier);

    $extensionFichier = $extension -> getExtension();

    if($extensionFichier == "jpg") { // Permet de définir les fichiers accepter ou non
        if (move_uploaded_file($leNomTemporaireDuFichier, $maDestinationFinal)){ // methode pour copier des données dans un répertoir => copier fichier
            echo " Fichier bien envoyé";
       } else {
           echo " Fichier non envoyé";
       }
    } else {
        echo "Fichier non supporté";
    }

    echo $monFichier;

   

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
    <title>Title</title>
</head>

<body>

    <div class="form-group" >
        
    <form method="POST" enctype="multipart/form-data"> 
        <!-- enctype donné à transmettre au serveur qui provient d'un formulaire -->
        <!-- method POST pour pouvoir envoyer des fichiers -->
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="monFichier">

            <button type="submit" class="btn btn-primary"> Submit </button>
        </div>
    </form>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>