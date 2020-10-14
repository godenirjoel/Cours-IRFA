function disUneCouleurAuHasard(idDeLaDivEnQuestion) {
    var caracteresHexa = '0123456789ABCDEF'.split(''),
        couleurAuHasard = '#';

    for (var i = 0; i < 6; i++) {
        couleurAuHasard += caracteresHexa[Math.floor(Math.random() * 16)]
    }
    document.getElementById(idDeLaDivEnQuestion).style.backgroundColor = couleurAuHasard;
}