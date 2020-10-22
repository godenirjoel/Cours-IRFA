<?php

//session_start(); // Penser à démarrer la sessions au début du script


$hote =  'localhost';

$base = 'films';

$utilisateur = 'bibi';

$pass = 'coucou';

$maConnection = mysqli_connect($hote, $utilisateur, $pass, $base);


if (mysqli_connect_error()) {


    die('Probleme de connection <br>');
} else {

    echo 'bien connecté <br>';
}


$utilisateurConnecté = false; // De base l'utilisateur est deconnecté ( CF feuille php inscription )

if (isset($_SESSION['modeInscription']) || isset($_POST["modeInscription"])) { // Si le mode inscription est true alors il est rediriger vers la page inscription.php ce qui va donc activer le formulaire d'inscritption, si c'est faut du coup il reste sur la page du tableau ( La session est compris dans la verification isset)

    $modeInscription = true;
} else {

    $modeInscription = false;
}



if (isset($_POST["deconnexion"])) { // Permet de se deconnecté de la session en cours. 
    session_unset();
}


if (isset($_SESSION["nomUtilisateur"])   &&   isset($_SESSION["motDePasse"])) { //Dans le cas où il y a quelque chose de la session tu lui affecte le nom d'utilisateur et le mot de passe alors tu reafect les variable poste à la session qui est au milieu du code
    $_POST["nomUtilisateur"] = $_SESSION["nomUtilisateur"];
    $_POST['motDePasse'] = $_SESSION["motDePasse"];
};



// Verification des champs de saisie pour une connexion à un espace membre ( doit être verifier en php et required en html)
if (isset($_POST["nomUtilisateur"]) &&   isset($_POST['motDePasse'])) {
    // Un utilisateur a envoyé une demande de connexion en cliquant sur le submit 
    // On veut maintenant verifier si les deux champs ont été remplis 

    $nomUtilisateurEntre = $_POST["nomUtilisateur"];
    $motDePasseEntre = $_POST["motDePasse"];


    if ($nomUtilisateurEntre != "" && $motDePasseEntre != "") { // on verifie si la saisie est vide 

        $maRequetteDeConnexion = "SELECT * FROM `utilisateurs` WHERE `utilisateurs`.`nom` = '" . $nomUtilisateurEntre . "'"; // On fait une requette SQL pour recupérer la colonne nom dans la table Utilisateurs 

        if ($retourDeMaRequette = mysqli_query($maConnection, $maRequetteDeConnexion)) {

            echo "La requette s'est effectué <br> ";

            $monResultat = mysqli_fetch_array($retourDeMaRequette); // Permet de récupérée la requette et la mettre dans un tableau

            if ($monResultat) { // On verifie ici si l'utilisateur existe ou pas 

                echo "L'utilisateur existe <br>";

                $leBonMotDePasse = $monResultat["motDePasse"]; // Une fois que j'ai le nom de l'utilisateur je vérifie son mot de passe 

                if ($motDePasseEntre == $leBonMotDePasse) {

                    echo "Bravo " . $nomUtilisateurEntre . " vous êtes bien connecté <br>"; // Concatene le nom de utilisateurs saisie

                    $utilisateurConnecté = true;

                    //Partie qui permet de garder l'utilisateur et le mot de passe en SESSION. Placé ici car une fois que tout es ok bien connecté seulement à ce moment là tu enregistre tout ca dans la session

                    $_SESSION["nomUtilisateur"] = $nomUtilisateurEntre;
                    $_SESSION["motDePasse"] = $leBonMotDePasse;
                } else {

                    echo " Erreure mot de passe " . $nomUtilisateurEntre . " Veuillez saisir le bon de mot de passe <br>";
                }
            } else {
                echo "L'utilisateur n'existe pas <br>";
            }
        } else {

            echo "La Requette ne s'est pas effectué <br> ";
        }
    } else {
        echo "Les deux champs doivent êtres rempli  <br>"; // Verifie si les deux champs sont rempli 
    }
};

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title> Connexion </title>
</head>

<body>

    <?php

    if ($utilisateurConnecté == true) {

        echo "bonjour" . $nomUtilisateurEntre . "!";

        echo "<form action='' method='POST'>
            <button type='submit' name='deconnexion' class='btn btn-danger'> Se deconnecter </button>

        </form>";


       $mavar = include('controllers/templateController.php');
       
        //include("template/monTemplateDeCard.php");

    

    } elseif ($modeInscription == true) {

        include("requetes/authentification/inscription.php");
    } else {

        echo " <div class='container '> 
            <div class='row d-flex align-items-center justify-content-center'>
                <div class='col-6'>
                    <h2> Connexion </h2>
                    <form method='POST'>
                        <div class='form-group'>
                            <label for='exampleInputEmail1'>Votre Nom </label>
                            <input type='text' name='nomUtilisateur' class='form-control' id='exampleInputEmail1' placeholder='Enter name' required>
                        </div>
                        <div class='form-group'>
                            <label for='exampleInputPassword1'>Password</label>
                            <input type='password' name='motDePasse' class='form-control' id='exampleInputPassword1' placeholder='Password' required>
                        </div>
                        <button type='submit' class='btn btn-primary'>Submit</button>
                    </form>
                    
                </div>
            </div>"; // permet de generé le tableau si l'utilisateur est bien inscrit

        echo "Pour voir le tableau connectez vous !";

        echo " <form action='' method='POST'>

        <button type='submit' name='modeInscription' class='btn btn-success'> Inscription </button> 

        </form>"; // Permet d'être rediriger directement sur la page inscription
    }

    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="main.js"></script>

</body>

</html>