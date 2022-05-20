var trails;
var listed_trails;

function loadData(){
    if(!localStorage.getItem('trails')){
        console.debug('No local data found');
        requestData();
        return;
    }
    console.debug('Local data found');
    if( (new Date).getTime() - localStorage.getItem('timestamp') > 10000 ){ //10 seconds
        console.debug('Data is outdated');
        console.debug('Requesting new data.');
        requestData();
    }
    else{
        console.debug('Loading data...');
        trails = JSON.parse(localStorage.trails);
        console.debug('Data loaded.');
        processData();
    }
}

function requestData(e){
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = saveData;
    httpRequest.open('GET', 'api/request_data.php?what=trails', true);
    httpRequest.send();
    console.debug("Requested trails' data");
}
function saveData(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
        console.debug("Received trails' data");
        console.debug("Parsing data...");
        trails = JSON.parse(e.target.responseText);
        console.debug("Saving local copy...");
        localStorage.setItem('trails', e.target.responseText);
        localStorage.setItem('timestamp', (new Date).getTime());
        processData();
    }
}

function processData(){
    console.debug("Rendering data...");
    renderTrails(trails);
}

function clearDiv(div){
    //sistemare con document fragment
    while (div.firstChild) {
        div.removeChild(div.firstChild);
    }
}

function renderTrails(array){
    var div = document.getElementById('div_trails');
    clearDiv(div);
    var template = document.getElementById('card_template');
    //sistemare con document fragment
    array.forEach(element => {div.appendChild(newCard(element, template))});

}

function newCard(sentiero, template){
    //cambiare!!!!! basta usare tag con nome template (forse)
    var card = template.content.cloneNode(true);
    card.querySelector('[name="parco"]').innerHTML = sentiero['parco_nome'];
    card.querySelector('[name="sigla"]').innerHTML = sentiero['sigla'];
    card.querySelector('[name="nome"]').innerHTML = sentiero['nome'];
    card.querySelector('[name="lunghezza"]').innerHTML = sentiero['lunghezza'];
    card.querySelector('[name="dislivello"]').innerHTML = sentiero['dislivello'];
    card.querySelector('[name="difficolta"]').innerHTML = sentiero['difficolta'];
    
    if(sentiero['descrizione']){
        card.querySelector('#info').setAttribute('onclick', 'alert("' + sentiero['descrizione'] + '");');
    }else
       card.querySelector('#info').hidden = true;

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

function filtra(){
    listed_trails = trails;
    listed_trails = listed_trails.filter(filterByString);
    listed_trails = listed_trails.filter(filterByPark);
    renderTrails(listed_trails, 'div_trails');
}

function filterByPark(sentiero){
    //inefficiente sistemare
    parco = document.getElementById('filter_parco').value;
    if(!parco) return true;
    return sentiero['parco_nome'] === parco;
}

function filterByString(sentiero){
    //inefficiente sistemare
    stringa = document.getElementById('search').value.toLowerCase();
    if(!stringa) return true;
    return (sentiero.nome + sentiero.sigla).toLowerCase().includes(stringa);
}

window.addEventListener('DOMContentLoaded', (event) => {
    loadData();
});

