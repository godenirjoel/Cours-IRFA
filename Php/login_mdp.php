<?php


$motDePasse = "choucroute";
$monSecret = " Bob l'Eponge est le vrai assassin de Kennedy ";
$revelation = "";

if(   isset($_GET['demande']) &&  isset($_GET['monPass'])  ){


//$monTableau = array('unElement'=>'quelquechose', 'unAutreElement'=>'autrechose');

//$monTest = print_r($monTableau);
    $demandeUtilisateur = $_GET['demande'];
    $motDePasseEntre = $_GET['monPass'];


    if(  $demandeUtilisateur == 'clic' && $motDePasseEntre == $motDePasse  ){

        $revelation = $monSecret;
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

<p>Clique sur secret si tu veux connaitre mon secret</p>

<!-- l'utilisateur doit entre le bon mot de passe pour se voir reveler le secret -->

<form class="container border d-flex flex-column justify-content-center align-items-center m-5 p-5">

<input class="col-8" type="text" name="monPass" placeholder = "Entre le mot de passe ici pour connaitre le secret">
<input class="mt-3 col-2 btn btn-success" type="submit" value ="clic" name = "demande" >

</form>

<div class="secret">
<p>       <?php  echo $revelation   ?>   </p>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>