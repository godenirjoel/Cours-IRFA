<?php

// test de connexion à la base de donnée
$hote = "localhost";
$base = "mabase";
$utilisateur = "bibi";
$pass = "coucou";


// Test de la base de donnée
$maConnexion = mysqli_connect($hote, $utilisateur, $pass, $base);

if (mysqli_connect_error()) {

    die("Problème de connexion");
} else {
    echo "bien connecté <br>";
};

$monTableauBootstrap = "";

$monSelectAnimaux = "";

// A placer avant le script qui génére le tableau pour éviter les erreurs de refresh. 
// Permet d'ajouter à la Base de donné un nom et un animal en fonction de l'input qu'on rentre dans le formulaire

if (isset($_POST["ajouter"]) && isset($_POST["ajoutNom"]) && isset($_POST["ajoutAnimal"])) {

    if (isset($_POST["ajouter"])) {
        $leNomAjouter = $_POST["ajoutNom"];
        $lAnimialAjouter = $_POST["ajoutAnimal"];

        $monAjout = "INSERT INTO `monautretable` (`nom`,`animal`) VALUES ('" . $leNomAjouter . "','" . $lAnimialAjouter . "')";

        if ($reponseRequette = mysqli_query($maConnexion, $monAjout)) {
            echo "mon ajout est ok ";
        } else {
            echo "mon ajout à  raté";
        }
    }
}

// Script qui permet de supprimé un élement du tableau. 


if (isset($_POST['supprimer'])) { // Avec isset supprimer je récupérée l'ID du button supprimer donc il se verifie lui même 

    $monId = $_POST['supprimer']; // je reafect = $monId au name de mon input supprimer plus bas (affichermontableau)

    $maSuppression = "DELETE FROM `monautretable` WHERE `id` = " . $monId; // j'affecte une variable a la requet SQL delete

    mysqli_query($maConnexion, $maSuppression); // mysqli query envoie la requette au serveur SQL 
}



// Permet d'afficher tout ce qu'il y a dans la table 

$maRequettePourTout = "SELECT * FROM monautretable"; // je vais récupérer tout (*) dans la table que je souhaite

if ($reponseRequette = mysqli_query($maConnexion, $maRequettePourTout)) { // si la requette SQL avec ma connexion et ma variable de récupération est bonne

    echo "requete OK ";

    while ($maRow = mysqli_fetch_array($reponseRequette)) { // Tu boucle tant que tu as quelque chose dans le tableau 
 
        afficheMonTableau($maRow); // et tu l'affiche dans mon tableau
    };
} else {
    echo "requete foiré";
}


function afficheMonTableau($unTableaux)
{

    global $monTableauBootstrap;

    $prenom = $unTableaux["nom"];
    $animal = $unTableaux["animal"];
    $monId = $unTableaux["id"];

    $delete = "<button type='submit' class='btn btn-danger' value='" . $monId . "' name='supprimer'> Supprimer </button>";

    $rowBootstrap = "<tr> <td>" . $prenom . " </td> <td>" . $animal . " </td> <td>" . $delete . " </td> <td>" . $monId . " </td> </tr>";

    $monTableauBootstrap .= $rowBootstrap;
}



function afficheLeSelectAnimal($unTableaux)
{

    global $monSelectAnimaux;

    $animal = $unTableaux["animal"];

    $optionPourLeSelect =  "<option value='" . $animal . "'> " . $animal . " </option>";

    if (strpos($monSelectAnimaux, $optionPourLeSelect) === false) {
        $monSelectAnimaux .= $optionPourLeSelect;
    }
}


// Requete qui affiche les animaux dans le select 

$maRequettePourLesAnimaux = "SELECT DISTINCT animal FROM monautretable"; // DISTINC permet de ne pas doubles les selections, je vais recuperer uniquement les elements "animal" dans mon tableau "monautretable"

if ($reponseRequette = mysqli_query($maConnexion, $maRequettePourLesAnimaux)) {

    echo "requete OK ";

    while ($maRow = mysqli_fetch_array($reponseRequette)) { // mysqli_fetch_array va cherche le premier element dans le tableau c'est pour ca qu'on met dans un while pour récupérer tous les élements les uns aprés les autres

        afficheLeSelectAnimal($maRow);
    };
} else {
    echo "requete foiré";
}


function creeMaRequeteAnimal($animal)
{
    $maRequetteAnimalPrefere = "SELECT * FROM monautretable WHERE animal = '" . $animal . "'";

    return $maRequetteAnimalPrefere;
}


if (isset($_POST['animal'])) {

    $animalDemande = $_POST['animal'];
    $monTableauBootstrap = "";

    $maRequetteAnimalPrefere = creeMaRequeteAnimal($animalDemande);

    if ($reponseRequette = mysqli_query($maConnexion, $maRequetteAnimalPrefere)) {

        echo "requete OK ";

        while ($maRow = mysqli_fetch_array($reponseRequette)) {

            afficheMonTableau($maRow);
        };
    } else {
        echo "requete foiré";
    }
} else {
    if ($reponseRequette = mysqli_query($maConnexion, $maRequettePourLesAnimaux)) {

        echo "requete OK ";

        while ($maRow = mysqli_fetch_array($reponseRequette)) {

            afficheLeSelectAnimal($maRow);
        };
    } else {
        echo "requete foiré";
    }
}


// Rajout d'une personne à la BDD au click d'un bouon submit

if (isset($_POST["ajouterGhislain"])) {
    $maRequetteDeGhislain = "INSERT INTO `monautretable` (`nom`,`animal`) VALUES ('Ghislain', 'poulpe')";

    if ($reponseRequette = mysqli_query($maConnexion, $maRequetteDeGhislain)) {
        echo "requette Ghislain ok ";
    } else {
        echo "requete Ghislain raté";
    }
}


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
    <h1> Notre page sur les requetes SQL partie 2</h1>

    <form action="" method="POST">
        <table class="table table-dark table-striped">
            <thead>
                <th> Nom </th>
                <th> Animal </th>
                <th> Supprimer </th>
                <th> Mon id</th>
            </thead>
            <tbody>

                <?php echo $monTableauBootstrap ?>

            </tbody>

        </table>
    </form>


    <form action="" method="POST">

        <label for="animal"> Afficher au tableau les personnes dont l'animal préféré est : </label>
        <select name="animal" id="">
            <?php echo $monSelectAnimaux ?>
        </select>
        <input class="btn btn-secondary" type="submit" name="boutonAnimal" value="Go !">
    </form>

    <form action="" method="POST">
        <input class="btn btn-secondary" type="submit" name="reinitialiser" value="Afficher tout">
    </form>


    <form action="" method="POST">
        <input type="submit" class="btn btn-secondary" name="ajouterGhislain" value="Ajouter Ghislain">
    </form>

    <form action="" method="POST">

        <input type="text" name="ajoutNom">
        <input type="text" name="ajoutAnimal">
        <input type="submit" class="btn btn-secondary" name="ajouter" value="Ajout">

    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>