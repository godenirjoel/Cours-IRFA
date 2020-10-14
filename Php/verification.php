<?php

$unSecret = "<div class='card' style='width: 18rem;'>
<img class='card-img-top' src='img/fromage.png' alt='Card image cap'>
<div class='card-body'>
  <h5 class='card-title'>Les elephants roses existent en Picardie</h5>
  <p class='card-text'>   </p>

</div>
</div>";

$revelation = "";

$membres = array(

    'patricia' => 'zebre',

    'michel' => 'dauphin',

    'pascal' =>  'cheval',

    'magali' => 'tortue'


);

$maVariableGET = array(

'utilisateur' => '',
'motDePasse' => ''


);

/// verifier si l'utilisateur a bien rempli les deux champs pour se connecter
//si oui, on continue nos verifications
//si non, on lui répond que les deux champs doivent etre remplis pour se connecter



//on verifie que quelquechose se trouve aux index utilisateur et motDePasse
//ET on verifie que ce qui se trouve à ces index est different d'une chaine de caractere vide

$chaineVide = '';

if(isset($_GET['utilisateur'])    &&    isset($_GET['motDePasse'])){


if(              $_GET['utilisateur']  !=  $chaineVide   &&   $_GET['motDePasse']   != $chaineVide      ){

  //on continuer nos verifications
  // On crée nos propres variables qui contiennent les données entrées;
  $utilisateurEntre =  $_GET['utilisateur'];
  $motDePasseEntre =   $_GET['motDePasse'];

   //On verifie si le nom entré existe en tant qu'index du tableau membres

    if(array_key_exists($utilisateurEntre, $membres)){

        //Si c'est le cas, on veut vérifier que le mot de passe est correct
        //on compare le mot de passe entré au mot de passe associé à l'utilisateur dans le tableau des membres
        //le bon mot de passe ser trouve dans le tableau membres, à l'index de l'utilisateur
        $leBonMotDePasse = $membres[$utilisateurEntre];

          ///on veut verifier que le mot de passe entré est identique au bon mot de passe


            if($motDePasseEntre == $leBonMotDePasse){
              //alors la connection est bonne

              $revelation = "Connecté";

            }else{

              $revelation = "Désolé ".$utilisateurEntre.", mauvais mot de passe";

            }


    }else{


      $revelation = "Vous ne faites pas partie des membres";



     }



}else{

  //on lui fait savoir que les deux champs sont à remplir pour se connecter

  $revelation = "Les deux champs sont requis pour se connecter";

}



}else{
  $revelation = "Bonjour ! Connectez vous pour acceder au secret";
}



// 1 . Si un utilisateur tente de se connecter et fait bien partie des membres
//et a entré le bon mot de passe, alors on peut reveler $unSecret dans la div revelation




// 2. remplacer le contenu de unSecret par un module de cette page web beaucoup
//plus développé , plusieurs fois la meme card avec le meme contenu (dauphin)




//3. le contenu de ce qui apparaitre si l'on est connecté
// n'est plus stocké dans verification.php, mais sur une autre feuille de php
//qui sera donc un template  par exemple templateDeCardDauphin.php
//il faudra trouver un moyen de récupérer ce contenu depuis verification.php
//pour l'ajouter à cette dernière
// *** se renseigner sur les methodes alternatives qui font a peu pres la meme chose




//4. reprendre ce template et de n'y mettre qu'une card dauphin "type"
// et automatiser la génération de 6 cards identiques plutot qu'une seule
//sur la page verification.php





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


<p>Bienvenue sur la page du secret</p>

<form action="">


<input type="text" name="utilisateur" placeholder = "Nom d'utilisateur">
<input type="password"  name ="motDePasse" placeholder = "Mot de passe">
<input type="submit" name="envoyer">



</form>


<div class="revelation">

<?php 

if( $revelation == "Connecté" ){
  include("envoi.php");
} else {
  echo $revelation;
}

?>




</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>