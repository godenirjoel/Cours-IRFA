<?php

include('requetes/authentification/connectionBDD.php');


function recupereToutesLesCartes()
{
    global $maConnection;

    $maRequete = "SELECT `image` AS 'monImage', `nom` AS 'nomEntreprise' , `taille` AS 'dimensionPropose', `region` AS 'region' , `tarif` AS 'prix' FROM `matableprojet`";

    if ($reponseRequete =  mysqli_query($maConnection, $maRequete)) {
        $mesDonnees = array();
        echo 'requete  OK';

        while ($maRow  =    mysqli_fetch_array($reponseRequete)) {

            $mesDonnees[] = $maRow;
        }

        return $mesDonnees;
    } else {

        return 'Requete foirée';
    }
}


?>
