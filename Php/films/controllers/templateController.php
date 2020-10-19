<?php




// notre logique de generation de HTML en utilisant le template


function genereUnTemplateToutPret($unTemplate, $desDonneesPourLeTemplate)
{


   //verifie la bonne composition des arguments passés à la methode


   //pour le template lui-même

   if (!file_exists($unTemplate)) {

      return "déso j'ai pas trouvé ton template, la";
   }


   if (is_array($desDonneesPourLeTemplate)) {

      extract($desDonneesPourLeTemplate);
   } else {

      return "Hela gamin ! moi, j'ai besoin d'un TABLEAU pour fonctionner";
   }






   //extraire les données recues du tableau ($desDonneesPourLeTemplate) 

   /* 
$titreCard = $desDonneesPourLeTemplate['titreCard'];
$texteCard = $desDonneesPourLeTemplate['texteCard'];
 */










   // passer ces données au template

   // buffering du template 

   //output buffer
   ob_start();
   include($unTemplate);

   return ob_get_clean();
}
