<?php


// Test de connection à la DB

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
