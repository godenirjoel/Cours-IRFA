
var lesGens = [
    ["Luc", "34 ans", "comptable"],
    ["Marla", "28 ans", "Professeure"],
    ["Marc", "52 ans", "Chirurgien obstétriste du bulbe rachidien"]
];

var lesAutresGens = [
    ["Cedric", "34 ans", "comptable"],
    ["Paul", "28 ans", "Professeure"],
    ["Jacques", "52 ans", "Chirurgien obstétriste du bulbe rachidien"],
    ["Marina", "12 ans", "Capitaine du Titanic"],
    ["Pascaline", "52 ans", "Chirurgien obstétriste du bulbe rachidien"],
    ["Maxime", "52 ans", "Dentiste"],
    ["Lucienne", "52 ans", "Plasticienne"],
    ["Claudio", "52 ans", "Acteur"]

];

var encoreDesAutresGens = [
    ["Sonia", "34 ans", "comptable"],
    ["Michel", "28 ans", "Professeure"],
    ["Gaetan", "18 ans", "Pilote"],
    ["Pascal", "12 ans", "Capitaine du Titanic"],
    ["Sophie", "67 ans", "Chirurgien obstétriste du bulbe rachidien"],
    ["Patricia", "22 ans", "Couturiere"],
    ["Mael", "35 ans", "Dirige une secte"],
    ["Bastien", "52 ans", "Plombier"]

];

var lesGensAjoutable = [
   ["Francois","14 ans","Ministre de l'interieur"],
   ["Jean-Pasteque", "270 ans", "Général des armées"]
]

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

for ( i = 0 ; i < lesGens.length ; i++ ) {

    document.getElementById('monBody').innerHTML += "<tr><td>" + lesGens[i][0] + "</td><td>" + lesGens[i][1] + "</td><td>" + lesGens[i][2] + "</td></tr>" ;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function remplirTableau(monTableau){

    document.getElementById('monBody3').innerHTML = "";

    for (i=0 ; i < monTableau.length ; i++){
        document.getElementById('monBody3').innerHTML += "<tr><td>" + monTableau[i][0] + "</td><td>" + monTableau[i][1] + "</td><td>" + monTableau[i][2] + "</td><td>" + "<bouton id='" + i + "'class='btn btn-danger'> supprimer </bouton>" + "</td></tr>" ;
    }
    
    $('.btn-danger').click(function(){

        var elementASupprimer = $(this).attr('id');
    
        lesGens.splice(elementASupprimer,1);
    
        remplirTableau(monTableau);
    })

    
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


document.getElementById('lesGens').onclick = function() {
    remplirTableau(lesGens);
} 

document.getElementById('lesAutreGens').onclick = function() {
    remplirTableau(lesAutresGens);
} 

document.getElementById('encoreAutreGens').onclick = function() {
    remplirTableau(encoreDesAutresGens);
} 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$('.ajouterDesGens').click(function(){

    var indexDeLaPersonne = $(this).attr("data-key");

    var personneAAjouter = lesGensAjoutable[indexDeLaPersonne]

    lesGens.push(personneAAjouter);

    remplirTableau(lesGens);

})

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

remplirTableau(lesGens);