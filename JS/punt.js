function InitAJAX() {
    var objxml;
    var IEtypes = ["Msxml2.XMLHTTP.6.0", "Msxml2.XMLHTTP.3.0", "Microsoft.XMLHTTP"];

    try {
        // Probeer het eerst op de "moderne" standaardmanier
        objxml = new XMLHttpRequest();
    } catch (e) {
        // De standaardmanier werkte niet, probeer oude IE manieren
        for (var i = 0; i < IEtypes.length; i++) {
            try {
                objxml = new ActiveXObject(IEtypes[i]);
            } catch (e) {
                continue;
            }
        }
    }

    // Lever het XHR object op
    return objxml;
}


var punten = 0;


function GoedPunt() {

    // Maak een XHR object
    let xmlHttp = InitAJAX();

    // Lees de inhoud van het formulierveld

    let punt = punten + 1;

    // Maak de URL voor het AJAX request
    let url = '../PHP/punten_toevoeg.php?lp=' + punt;

    // Wat moet er gebeuren bij statuswijzigingen?
    xmlHttp.onreadystatechange = function() {
        // Is het request al helemaal klaar en OK ?
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            // Lees de tekst die is ontvangen
            let result = xmlHttp.responseText;

            // Plaats de tekst die is ontvangen
            document.getElementById("resultaat").innerHTML = result;
        }
    }

    // Verstuur het request
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function SlechtPunt() {

    // Maak een XHR object
    let xmlHttp = InitAJAX();

    // Lees de inhoud van het formulierveld

    let punt = punten - 1;

    // Maak de URL voor het AJAX request
    let url = '../PHP/punten_toevoeg.php?lp=' + punt;

    // Wat moet er gebeuren bij statuswijzigingen?
    xmlHttp.onreadystatechange = function() {
        // Is het request al helemaal klaar en OK ?
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            // Lees de tekst die is ontvangen
            let result = xmlHttp.responseText;

            // Plaats de tekst die is ontvangen
            document.getElementById("resultaat").innerHTML = result;
        }
    }

    // Verstuur het request
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}