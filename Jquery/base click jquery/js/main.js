// $('#cercle').hover(function() {
//     $('.carre').css("background-color" , "red");
// })

// $("#jean").click (function(){

//     var maBoite = $ ('#jean').parent().attr('class');

//     $("#resultat").html("Je suis contenu dans " + maBoite);
// });

// $("#luc").click (function(){

//     var monVoisin = $("#luc").next().attr('id');

//     $("#resultat").html("Mon voisin de droite s'appelle " + monVoisin);
// });


// $("#paul").click (function(){

//     var monPrenom = $("#paul").attr('id');
//     var monParent = $("#paul").parent().attr('class') ;
//     var monCousin = $("#claude").attr('id');
//     var leParentDeMonCousin = $("#claude").parent().attr('class') ;

//     $("#resultat").html ("Je m'appelle " + monPrenom + " j'habite dans " + monParent + " mon cousin " + monCousin + " habite dans " + leParentDeMonCousin );
// });


// $("#noemie").click(function(){
//     $(this).next().css("background-color","grey");
// });

$('.cercle').click(function(){

    if ($(this).next().length) {
        $(this).next().css("background-color","grey");
    } else {
        $(this).prev().css("background-color","grey");
    }
});