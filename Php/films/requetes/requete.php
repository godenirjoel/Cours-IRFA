<?php

include('requetes/authentification/connectionBDD.php');

function recupereToutesLesCartes()
{

    global $maConnection;

    $maRequete = "SELECT `image` AS 'monImage', `nom` AS 'monTitre' , `realisateur` AS 'monRealisateur', `resume` AS 'monResume' , `sortie` AS 'dateSortie' FROM `mesfilms`";

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

function recupereUneCarte(){
    global $maConnection;

    $maRequete = "SELECT `image` AS 'monImage', `nom` AS 'monTitre' , `realisateur` AS 'monRealisateur', `resume` AS 'monResume' , `sortie` AS 'dateSortie' FROM `mesfilms`";

    $reponseRequete = mysqli_query($maConnection, $maRequete);

    $mesDonnees = array();
    
    $maRow = mysqli_fetch_array($reponseRequete);

    $mesDonnees[] = $maRow;

    return $mesDonnees;
}

