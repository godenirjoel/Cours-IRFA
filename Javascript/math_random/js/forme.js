function changeSesMesures(idDelaDivEnQuestion) {


    var topAuHasard = Math.random() * 100 + "%";

    var leftAuHasard = Math.random() * 100 + "%";

    var largeurAuHasard = Math.random() * 450 + "px";

    var hauteurAuHasard = Math.random() * 450 + "px";


    // Deux possibilités : cercle ou pas cercle
    // deux possibilités de border-radius : 0% ou 50%
    // choisir par contre de manière aléatoire parmis ces deux valeurs


    var monChiffre = Math.random();

    if (monChiffre > 0.5) {

        document.getElementById(idDelaDivEnQuestion).style.borderRadius = "50%";

    } else {

        document.getElementById(idDelaDivEnQuestion).style.borderRadius = "0%";

    }

    document.getElementById(idDelaDivEnQuestion).style.top = topAuHasard;
    document.getElementById(idDelaDivEnQuestion).style.left = leftAuHasard;
    document.getElementById(idDelaDivEnQuestion).style.width = largeurAuHasard;
    document.getElementById(idDelaDivEnQuestion).style.height = hauteurAuHasard;
    document.getElementById(idDelaDivEnQuestion).style.visibility = "visible";
}