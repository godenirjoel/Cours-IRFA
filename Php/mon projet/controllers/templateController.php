<?php


function genereUnTemplateToutPret($unTemplate, $desDonneesPourLeTemplate)
{

   if (!file_exists($unTemplate)) {

      return "déso j'ai pas trouvé ton template, la";
   }


   if (is_array($desDonneesPourLeTemplate)) {

      extract($desDonneesPourLeTemplate);
   } else {

      return "Hela gamin ! moi, j'ai besoin d'un TABLEAU pour fonctionner";
   }

   ob_start();
   include($unTemplate);

   return ob_get_clean();
}

?>