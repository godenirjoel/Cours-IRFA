<?php

session_start();


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


$utilisateurConnecté = false;

if (isset($_SESSION['modeInscription']) || isset($_POST["modeInscription"])) {

    $modeInscription = true;
} else {

    $modeInscription = false;
}


$deconnexion = (isset( $_POST["deconnexion"])) ;

if (isset($deconnexion)) {
    session_unset();
}


if (isset($_SESSION["nomUtilisateur"])   &&   isset($_SESSION["motDePasse"])) {
    $_POST["nomUtilisateur"] = $_SESSION["nomUtilisateur"];
    $_POST['motDePasse'] = $_SESSION["motDePasse"];
};

if (isset($_POST["nomUtilisateur"]) &&   isset($_POST['motDePasse'])) {


    $nomUtilisateurEntre = $_POST["nomUtilisateur"];
    $motDePasseEntre = $_POST["motDePasse"];

    $salt = "ncejnjcen872%$";
    $motDePasseCrypteEntre = md5($motDePasseEntre);

    $motDePasseFinalEntre = $motDePasseCrypteEntre.$salt;


    if ($nomUtilisateurEntre != "" && $motDePasseFinalEntre != "") {

        $maRequetteDeConnexion = "SELECT * FROM `utilisateurs` WHERE `utilisateurs`.`nom` = '" . $nomUtilisateurEntre . "'";

        if ($retourDeMaRequette = mysqli_query($maConnection, $maRequetteDeConnexion)) {

            echo "La requette s'est effectué <br> ";

            $monResultat = mysqli_fetch_array($retourDeMaRequette);

            if ($monResultat) {

                echo "L'utilisateur existe <br>";

                $leBonMotDePasse = $monResultat["motDePasse"];
                if ($motDePasseFinalEntre == $leBonMotDePasse) {

                    echo "Bravo " . $nomUtilisateurEntre . " vous êtes bien connecté <br>";

                    $utilisateurConnecté = true;

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
        echo "Les deux champs doivent êtres rempli  <br>";
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


        $maNavbar = 'template/navbar';

        include("controllers/navbarController.php");

        print genereUneNavBar();





        include('controllers/templateController.php');

        include('requetes/requete.php');

        $unTemplateDeTest = 'template/monTemplateDeCard.php';

        foreach (recupereToutesLesCartes() as $carte) {

            print genereUnTemplateToutPret($unTemplateDeTest, $carte);
        }




    } elseif ($modeInscription == true) {

        include("requetes/inscription.php");
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
            </div>";

        echo "Pour voir le tableau connectez vous !";

        echo " <form action='' method='POST'>

        <button type='submit' name='modeInscription' class='btn btn-success'> Inscription </button> 

        </form>";
    }

    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="main.js"></script>

</body>

</html>