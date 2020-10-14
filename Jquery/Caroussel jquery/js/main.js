// var mesImages = [
//     "./img/2.jpg",
//     "./img/3.jpg",
//     "./img/4.jpg"
// ];

// var monIndex = 0;

// function changerLeBackground(){

//     monIndex++;

//     if(monIndex == mesImages.length) {
//         monIndex = 0 ;
//     }

//     var monNouvelUrl = "url('" + mesImages[monIndex] + "')";

//     $(".maDiv").css('background-image', monNouvelUrl );

// };

// setInterval(changerLeBackground, 2000);


$(".droite").click (function(){

    var imageEnCours = $(this).closest('div').find('.visible');

    var imageSuivante = $(imageEnCours).next();

    if(imageSuivante.length){
    
        imageEnCours.removeClass('visible');

        imageSuivante.addClass('visible');
    } else {

        imageEnCours.parent().children().first().addClass('visible');

        imageEnCours.removeClass('visible');
    }

});

$(".gauche").click (function(){

    var imageEnCours = $(this).closest('div').find('.visible');

    var imagePrecedente = $(imageEnCours).prev();

    if(imagePrecedente.length){
        
        imageEnCours.removeClass('visible');

        imagePrecedente.addClass('visible');
    } else {
        imageEnCours.parent().children().last().addClass('visible');

        imageEnCours.removeClass('visible');
    }
});