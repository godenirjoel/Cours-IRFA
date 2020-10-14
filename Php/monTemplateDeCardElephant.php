<?php


 $maDiv =   "<div class='card' style='width: 18rem;'>
        <img class='card-img-top' src='img/fromage.png' alt='Card image cap'>
        <div class='card-body'>
            <h5 class='card-title'>Les elephants roses existent en Picardie</h5>
            <p class='card-text'> </p>

        </div>
    </div>";

$mesDivs = "";

        for($i=0;$i<6;$i++){


            $mesDivs   .=   $maDiv;
        }


    return $mesDivs;


 
?>

