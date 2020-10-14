
document.getElementById("monCarre").onclick = function () {

    var monTimeout = Math.floor(Math.random() * 5000);
    document.getElementById("monCarre").style.visibility = "hidden";
    setTimeout(mesureEtCouleur, monTimeout);


    var leClick = Date.now().getSeconds();
    document.getElementById('para').innerHTML = "Vous avez mis " + leClick + " Entre deux click";

}

function mesureEtCouleur() {
    disUneCouleurAuHasard("monCarre")
    changeSesMesures("monCarre")
}

///////////////////////////////////////////////////////////////////////////////////////

document.getElementById('heure').innerHTML = new Date().getHours() + " H";
document.getElementById('minute').innerHTML = new Date().getMinutes() + " M";
document.getElementById('seconde').innerHTML = new Date().getSeconds() + " S";

