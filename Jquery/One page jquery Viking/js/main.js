$(".cadre").click (function(){
    $(this).toggleClass("blocOuvert");
});


// APPARITION DES CARDS //

$(window).scroll(function(){
    if (  ($(document).scrollTop() >= $(".cadre").height())   ){
        $(".blocCarteUn").addClass("blocOuvertUn");
        $(".blocCarteDeux").addClass("blocOuvertDeux");
    };
});

$(window).scroll(function(){
    if (($(document).scrollTop() >= $(".blocCarteTrois").height() + $(".blocCarteUn").height())){
        $(".blocCarteTrois").addClass("blocOuvertTrois");
        $(".blocCarteQuatre").addClass("blocOuvertQuatre");
    }
})

$(window).scroll(function(){
    if (($(document).scrollTop()  >= $(".blocCarteTrois").height() + $(".blocCarteUn").height() + $(".cadre").height())){
        $(".blocCarteCinq").addClass("blocOuvertCinq");
        $(".blocCarteSix").addClass("blocOuvertSix");
    }
})


// CARROUSSEL IMAGE // 

$(".chevronDroit").click (function(){
    var imageEnCours = $(this).closest('div').find('.visible');

    var imageSuivante = $(imageEnCours).next();

    if(imageSuivante.length) {
        imageEnCours.removeClass('visible');
        imageSuivante.addClass('visible');
    }else {
        imageEnCours.parent().children().first().addClass('visible');

        imageEnCours.removeClass('visible');
    }
});

$(".chevronGauche").click (function(){
    var imageEnCours = $(this).closest('div').find('.visible');

    var imagePrecedente = $(imageEnCours).prev();

    if(imagePrecedente.length) {
        imageEnCours.removeClass('visible');
        imagePrecedente.addClass('visible');
    }else {
        imageEnCours.parent().children().last().addClass('visible');

        imageEnCours.removeClass('visible');
    }
});

// INCREMENTATION ET DECREMENTATION //

$('.boutonPanierPlus').click (function(){

    var maVariable =  $(this).parent().find('.saisie').val();

    maVariableNombre = parseInt(maVariable);

    maVariableNombre++;

    $(this).parent().find('.saisie').val(maVariableNombre);
})

$(".boutonPanierMoins").click (function(){

    var maVariable = $(this).parent().find('.saisie').val();

    maVariableNombre = parseInt(maVariable);

    if (maVariableNombre > 1 ){
        maVariableNombre--;
    }

    $(this).parent().find('.saisie').val(maVariableNombre);
});




// TABLEAU //

function remplirMonTableau(monTableau) {

    document.getElementById("monBody").innerHTML = "";

    for(i=0 ; i < monTableau.length ; i++){
        document.getElementById("monBody").innerHTML = + monTableau[i][0] + "</td><td>" + monTableau[i][1] + "</td><td>" + monTableau[i][2] + "</td><td>" + "<bouton id='" + i + "'class='btn btn-danger'> supprimer </bouton>" + "</td></tr>" ;
    }
}

$(".boutonAjout").click(function(){
    
})