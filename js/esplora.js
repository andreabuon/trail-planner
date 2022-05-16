var trails;
var listed_trails;

function requestData(e){
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = processData;
    httpRequest.open('GET', 'api/request_data.php?what=trails', true);
    httpRequest.send();
    console.debug("Requested trails' data");
}
function processData(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
        console.debug("Received trails' data");
        console.debug("Parsing data...");
        trails = JSON.parse(e.target.responseText);
        console.debug("Rendering data...");
        render(trails);
    }
}

function clearDiv(div){
    //sistemare con document fragment
    while (div.firstChild) {
        div.removeChild(div.firstChild);
    }
}

function render(array){
    var div = document.getElementById('div_trails');
    clearDiv(div);
    var template = document.getElementById('card_template');
    array.forEach(element => {div.appendChild(newCard(element, template))});
    //map.resize(); //sistemare
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
        card.querySelector('#view').setAttribute('onclick', 'reqTrail("' + sentiero['track_path'] + '");');
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
    render(listed_trails, 'div_trails');
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
    requestData();
});

