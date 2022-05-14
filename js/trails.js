function getData(e){
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = manageResponse;
    httpRequest.open('GET', '../php/display_trails.php', true);
    httpRequest.send();
}

function manageResponse(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
        var trails;
        try{
            trails = JSON.parse(e.target.responseText);
            render(trails);
        }
        catch{
            console.log('Nessun sentiero trovato');
        }
    }
}

function render(array){
    var template = document.getElementById('card_template');
    array.forEach(element => {insert(newCard(element, template));});
    map.resize();
}

function newCard(sentiero, template){
    //cambiare!!!!! basta usare tag con nome template (forse)
    var card = template.content.cloneNode(true);
    card.querySelector('[name="parco"]').innerHTML = sentiero['parco_nome'];
    card.querySelector('[name="sigla"]').innerHTML = sentiero['sigla'];
    card.querySelector('[name="nome"]').innerHTML = sentiero['nome'];
    card.querySelector('[name="lunghezza"]').innerHTML = sentiero['lunghezza'];
    card.querySelector('[name="dislivello"]').innerHTML = sentiero['dislivello'];
    //card.querySelector('#info').setAttribute('href', '');
    //card.querySelector('#view').setAttribute('onclick', 'scaricaSentiero('+sentiero['track_path']+');');
    //card.querySelector('#download').setAttribute('href', 'uploads/'+sentiero['track_path']);
    return card;
}

function insert(card){
    document.getElementById('div_trails').appendChild(card);
}

function clearList(){
    var div = document.getElementById('div_trails');
    while (div.firstChild) {
        div.firstChild.remove()
    }
}

function clearMap(){
    map.removeLayer('route');
    map.removeSource('route');
    return true;
}

function toggleFilters(){
    document.getElementById('div_filters').hidden = !document.getElementById('div_filters').hidden;
}

window.addEventListener('DOMContentLoaded', (event) => {
    getData();
});

