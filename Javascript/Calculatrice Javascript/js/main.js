document.getElementById("egal").onclick = function(){
    resultat();
}

document.getElementById('0').onclick = function(){
    remplirChamp(0);
}


document.getElementById('1').onclick = function(){
    remplirChamp(1);
}

document.getElementById('2').onclick = function(){
    remplirChamp(2);
}

document.getElementById('3').onclick = function(){
    remplirChamp(3);
}

document.getElementById('4').onclick = function(){
    remplirChamp(4);
}

document.getElementById('5').onclick = function(){
    remplirChamp(5);
}

document.getElementById('6').onclick = function(){
    remplirChamp(6);
}

document.getElementById('7').onclick = function(){
    remplirChamp(7);
}

document.getElementById('8').onclick = function(){
    remplirChamp(8);
}

document.getElementById('9').onclick = function(){
    remplirChamp(9);
}

document.getElementById('e').onclick = function(){
    effacerTout();
};

document.getElementById('+').onclick = function(){
    remplirChamp("+");
}

document.getElementById('*').onclick = function(){
    remplirChamp("*");
}

document.getElementById("-").onclick = function(){
    remplirChamp("-");
}

document.getElementById("/").onclick = function(){
    remplirChamp("/");
}

document.getElementById(".").onclick = function(){
    remplirChamp(".");
}


////////////////////////////////////////////////////


function remplirChamp(touche){

    document.getElementById('champ').value += touche;
}

function resultat() {
    document.getElementById('champ').value = eval(document.getElementById('champ').value);
}

function effacerTout(){
    document.getElementById('champ').value = "";
}


////////////////////////////////////////////////////////

function enleverChamp(touche){
    document.getElementById('champ').value -= touche;
}

document.getElementById('c').onclick = function() {
    enleverChamp('c');
}