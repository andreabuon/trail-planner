const TRAILS_DIV = 'div_trails';
const TRAIL_TEMPLATE = 'card_template';

var trails;
 
// Funzione che verifica l'esistenza dei dati sui sentieri in locale (localStorage). 
// Se esistono e sono abbastanza recenti vengono caricati dallo storage locale. 
// Se invece i dati non esistono o sono troppo datati vengono scaricati dal server.
function loadData(){
    if(!localStorage.getItem('trails')){
        console.debug('No local data found');
        requestData();
        return;
    }
    console.debug('Local data found');
    if( localStorage.getItem('timestamp') && (new Date).getTime() - localStorage.getItem('timestamp') > 25000 ){ // 25 secondi
        console.debug('Data is outdated.');
        requestData();
    }
    else{
        console.debug('Loading data...');
        trails = parseData(localStorage.trails);
        if(!trails){
            requestData();
            return;
        }
        console.debug('Data loaded from local storage.');
        listTrails(trails);
    }
}

// Manda richiesta al server per scaricare i dati sui sentieri
function requestData(){
    console.debug("Downloading new data");
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = saveData;
    httpRequest.open('GET', 'api/request_data.php?what=trails', true);
    httpRequest.send();
    console.debug("Requested trails' data");
}

// Salva i dati mandati dal server
function saveData(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
        console.debug("Received trails' data");

        trails = parseData(e.target.responseText);
        if(!trails){
            alert('Invalid data')
            return;
        }

        console.debug("Saving local copy...");
        localStorage.setItem('trails', e.target.responseText);
        localStorage.setItem('timestamp', (new Date).getTime());

        listTrails(trails);
    }
}

// Costruisce oggetti dai dati JSON
function parseData($source){
    console.debug("Parsing data...");
    try{
        return JSON.parse($source);
    }
    catch{
        console.error('Data is invalid.');
        return 0;
    }
}

// Rimuove tutti figli da un elemento HTML
function clearDiv(elem){
    //%% document fragment?
    while (elem.firstChild) {
        elem.removeChild(elem.firstChild);
    }
}

// Inserisce nel documento una card per ogni sentiero
function listTrails(list){
    console.debug("Listing trails...");

    var target_div = document.getElementById(TRAILS_DIV);
    clearDiv(target_div);

    var template = document.getElementById(TRAIL_TEMPLATE);

    //%% document fragment??
    list.forEach(element => {target_div.appendChild(newCard(element, template))});

}

// Crea una card sentiero
function newCard(sentiero, template){
    var card = template.content.cloneNode(true);
    
    //%%
    card.querySelector('[name="parco"]').innerHTML = sentiero['parco_nome'];
    card.querySelector('[name="sigla"]').innerHTML = sentiero['sigla'];
    card.querySelector('[name="nome"]').innerHTML = sentiero['nome'];
    card.querySelector('[name="lunghezza"]').innerHTML = sentiero['lunghezza'];
    card.querySelector('[name="dislivello"]').innerHTML = sentiero['dislivello'];
    card.querySelector('[name="difficolta"]').innerHTML = sentiero['difficolta'];
    card.querySelector('#info').setAttribute('href', 'trail.php?parco=' + sentiero['parco_nome'] + '&sigla=' + sentiero['sigla']);

    if(sentiero['track_path']){
        card.querySelector('#view').setAttribute('onclick', 'getTrailTrack("' + sentiero['track_path'] + '");');
        card.querySelector('#download').setAttribute('href', 'uploads/' + sentiero['track_path']);
    }
    else{
        card.querySelector('#view').hidden = true;
        card.querySelector('#download').hidden = true;
    }
    return card;
}

// Filtra i sentieri da visualizzare
function filtra(){
    var listed_trails = trails.filter(filterByString);
    listed_trails = listed_trails.filter(filterByPark);
    listTrails(listed_trails, TRAILS_DIV);
}

function filterByPark(sentiero){
    //%%
    parco = document.getElementById('filter_parco').value;
    if(!parco) return true;
    return sentiero['parco_nome'] === parco;
}

function filterByString(sentiero){
    //%%
    stringa = document.getElementById('search').value.toLowerCase();
    if(!stringa) return true;
    return (sentiero.nome + ' ' + sentiero.sigla).toLowerCase().includes(stringa);
}

window.addEventListener('DOMContentLoaded', (event) => {
    loadData();
});

