var trails;

function requestData(e){
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = processData;
    httpRequest.open('GET', 'php/get_trails.php', true);
    httpRequest.send();
}

function processData(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
        trails = JSON.parse(e.target.responseText);
        render(trails, 'div_trails');
    }
}

function render(array, div_id){
    var div = document.getElementById(div_id);
    while (div.firstChild) {
        div.removeChild(div.firstChild);
    }
    var template = document.getElementById('card_template');
    array.forEach(element => {div.appendChild(newCard(element, template))});
    map.resize(); //sistemare
}

function newCard(sentiero, template){
    //cambiare!!!!! basta usare tag con nome template (forse)
    var card = template.content.cloneNode(true);
    card.querySelector('[name="parco"]').innerHTML = sentiero['parco_nome'];
    card.querySelector('[name="sigla"]').innerHTML = sentiero['sigla'];
    card.querySelector('[name="nome"]').innerHTML = sentiero['nome'];
    card.querySelector('[name="lunghezza"]').innerHTML = sentiero['lunghezza'];
    card.querySelector('[name="dislivello"]').innerHTML = sentiero['dislivello'];
    
    if(sentiero['descrizione']){
        card.querySelector('#info').setAttribute('onclick', 'alert("'+sentiero['descrizione']+'");');
    }else   card.querySelector('#info').hidden = true;

    if(sentiero['track_path']){
        card.querySelector('#view').setAttribute('onclick', 'scaricaSentiero('+sentiero['track_path']+');');
        card.querySelector('#download').setAttribute('href', 'uploads/'+sentiero['track_path']);
    }
    else{
        card.querySelector('#view').hidden = true;
        card.querySelector('#download').hidden = true;
    }
    return card;
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
    var btn = document.getElementById('btn_toggleFilters');
    btn.classList.toggle("active");
    document.getElementById('div_filters').hidden = !document.getElementById('div_filters').hidden;
}

function filterTrails(array, filter_fnc){
    //trails = array.filter(filter_fnc);
    render(array.filter(filter_fnc), 'div_trails');
}

function filterByPark(sentiero){
    park = document.getElementById('filter_parco').value;
    if(park=='')
        return true;
    return sentiero.parco_nome == park;
}

function filterByName(sentiero){
    string = document.getElementById('search').value.toLowerCase();
    if(string=='')
        return true;
    return sentiero.nome.toLowerCase().includes(string) ||  sentiero.sigla.toLowerCase().includes(string);
}

window.addEventListener('DOMContentLoaded', (event) => {
    requestData();
});

