function downloadTrailsData(e){
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = manageResponse;
    httpRequest.open('GET', '../php/display_trails.php', true);
    httpRequest.send();
}

function manageResponse(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
        var data = JSON.parse(e.target.responseText);
        printData(data);
    }
}

function printData(trails_array){
    trails_array.forEach(element => {insert(createCard(element));});
}

function createCard(sentiero){
    return "<div class='card'><div class='card-body'><h5 class='card-title'>" + sentiero['parco_nome'] + ": " + sentiero['sigla'] + " - " + sentiero['nome'] + "</h5><p class='card-text'> Lunghezza:" + sentiero['lunghezza'] + "Km; Dislivello:" + sentiero['dislivello'] + "m </p><button class='btn btn-outline-info'>Scarica</button><button class='btn btn-outline-info' >Visualizza</button></div></div>";
}

function insert(card){
    //document.getElementById('div_trails').appendChild(card);
    document.getElementById('div_trails').innerHTML += card;
}

window.addEventListener('DOMContentLoaded', (event) => {
    //console.log('DOM loaded');
    downloadTrailsData();
});

