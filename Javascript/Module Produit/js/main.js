
$('.plus').click (function(){

    var maVariable = $('.champQuantite').val();

    maVariable = eval(maVariable + '+ 1' );

    $('.champQuantite').val(maVariable);

});

$('.moins').click (function(){

    var maVariable = $('.champQuantite').val();

    maVariableInt = parseInt(maVariable);

    if (maVariableInt > 1 ){

        maVariableInt--;
    }

    $('.champQuantite').val(maVariableInt);

});