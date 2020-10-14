<?php


$maVariable = "Robert";

$unBoutDePhrase = "je suis un bout de phrase";

$laSuite = "et moi je suis la suite de la phrase";

// Faire une concaténation des deux variables dans un echo


echo $unBoutDePhrase." ".$laSuite;

$monNombre = 34;

//un saut de ligne s'effectue



echo $monNombre;

//afficher le résultat de monNombre multiplié par 45 divisé par 6

// le resultat s'affiche sous la forme "le resultat est .... "


echo "<br>";

echo "Le resultat est ".$monNombre*45/6;

echo "<br>";


$unString = "";

$maBooleene = false;

$monAutreBooleene = true;

//faire un echo du contenu de cette variable

//et une ligne plus loin, un echo du nom de cette variable

echo $maBooleene;
echo "<br>";
echo $monAutreBooleene;
echo "<br>";
echo var_dump($maBooleene);
echo "<br>";
echo var_dump($monAutreBooleene);
echo "<br>";

    if($monAutreBooleene){

         echo "ELLE EXISTE !";
    }else{

        echo "ELLE EXISTE PAS !";
    }

   
//echo $$maBooleene;
//echo $$monAutreBooleene;
//echo $$unBoutDePhrase;
echo "<br>";
echo "<br>";

$prenom = "michel";

$unNomDeVariable = "prenom";

// TABLEAUX

$monTableau = array("luc", "patricia", "pascal", "dauphin");

//echo $monTableau;

var_dump($monTableau);

echo "<br>";
echo "<br>";


print_r($monTableau);


$monTableau[2] = "pascalou";

echo "<br>";

print_r($monTableau);

/// ajouter un element "crevette" au tableau

array_push($monTableau, "crevette");


echo "<br>";
print_r($monTableau);

 $monTableau[]  = "huitre";


echo "<br>";
print_r($monTableau);

$monTableau["monFruitDeMerPrefere"]  = "coquille saint-jacques";


echo "<br>";
print_r($monTableau);
echo "<br>";
echo "<br>";
echo($monTableau["monFruitDeMerPrefere"]);

$monAutreTableau = array(


    "unIndex" => "maChaine",

    "Zeeede" => "un truc en Z",

    "monAutreIndex" => "uneAutreChaine",

    "monTroisiemeIndex" => "encore des autres trucs"



);

echo "<br>";echo "<br>";
print_r($monAutreTableau);
echo "<br>";echo "<br>";
echo var_dump($monAutreTableau);
echo "<br>";echo "<br>";


echo "la longueur de monAutreTableau est de ".sizeof($monAutreTableau);


$mesTrucs = array(


    "outil" => "tournevis",

    "couvert" => "une fourchette",

    "bijou" => "un bracelet",

    "couvre-chef" => "un fedora noir mais avec des pois bleus et verts"



);

//afficher toutes les valeurs des elements du tableau avec une boucle for




/* echo "<br>";echo "<br>";
echo var_dump($monTableau);

for($i=0; $i<sizeof($monTableau); $i++){

echo $monTableau[$i] ."<br>";

} */






echo "<br>";echo "<br>";
echo var_dump($mesTrucs);
echo "<br>";echo "<br>";

foreach($mesTrucs as $monElement ){

        echo var_dump($monElement)."<br>";

}


echo "<br>";echo "<br>";

foreach($mesTrucs as $key => $value ){

        echo "à l'index ".$key." se trouve l'élément ".$value."<br>";  

}





?>

<!-- // Commencer votre code html

//utiliser bootstrap

//ajouter RAPIDEMENT un navbar de bootstrap

//générer un card (bootstrap) pour chaque élément du tableau $mesTrucs

//Titre de la card qui portera l'index de chaque element
//le corps de la card qui contiendra un paragraphe contenant la valeurs//associée à ladîte clé


 -->