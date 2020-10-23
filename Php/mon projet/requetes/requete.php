<?php

include('requetes/connectionBDD.php');


function recupereToutesLesCartes()
{
    global $maConnection;

    $maRequete = "SELECT `imagestickers` AS 'monImage', `nomentreprise` AS 'nomEntreprise' , `taillestickers` AS 'dimensionPropose', `region` AS 'region', `email` AS 'email', `telephone` AS 'telephone', `tarifmensuel` AS 'prix' FROM `tablestickerspropose`";

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
