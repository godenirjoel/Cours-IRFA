<?php 


function genereUneNavBar(){

    global $utilisateurConnecté;

    if($utilisateurConnecté == true) {
        include("template/navbar.php");
    } else {
        include("template/navbarconnexion.php");
    }

}




?>

