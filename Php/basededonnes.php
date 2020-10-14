
<?php 

// GueGuerre entre PDO vs mysqli()  (Anciennement Mysql())

// Premiere étape : connexion à la base de donnée 

$hote = "localhost";
$base = "mabase";
$utilisateur = "bibi";
$pass = "coucou";


$maConnexion = mysqli_connect($hote,$utilisateur,$pass,$base); // DANS CET ORDRE PRECIS

if (mysqli_connect_error()) { // Permet de voir si la connexion s'est bien executé

    die("Problème de connexion"); // Die permet de stoper tout le script si il y a un problème

} else {
    echo "bien connecté <br>";
}; 

// Seconde étape : Envoyer une requete SQL

$maRequette = "SELECT nom,animal FROM monautretable"; //Je selectionne TOUT ce qui as dans ma table // Where permet de récupérer ce que je veux il faut regarde la colonne souhaité dans phpmyadmin

$mesDivs = "";

    if($monResultat = mysqli_query($maConnexion,$maRequette)){
        echo "la requete est bien passe <br> <br>" ;

        while($recupereLaPremiereLigne = mysqli_fetch_array($monResultat)) { // Récupére la première ligne de la table et mettre dans une boucle while pour dérouler TOUT le tableau ("tant que tu peux lire le tableau donne toutes les infos ")
       
            embellisMaRequette($recupereLaPremiereLigne, $mesDivs);

        };
           
    }else {
        echo "la requette n'est pas bien passé";
    };


function embellisMaRequette($uneLigne, $mesDivs) {

    global $mesDivs;

    // $avant = "<th> </th>";
    // $apres = " <th> </th>";

    $prenom = $uneLigne['nom'];
    $animal = $uneLigne['animal'];
    
    $maPhrase = " <th> <td>". $prenom. "</td> <td> " . $animal . "</td> </th> </tr>";

    $mesDivs.=$maPhrase;;
}

//////////////////////////////////////////////////////////////////////////////



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

    <h2> Coucou je suis la page sur les bases de données </h2>
    <br>

    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nom</th>
      <th scope="col">Animal</th>
    </tr>
  </thead>
  <tbody>
        <?php echo $mesDivs ?>
  </tbody>
</table>



    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>