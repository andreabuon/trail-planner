function getData(e){
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = manageResponse;
    httpRequest.open('GET', '../php/display_trails.php', true);
    httpRequest.send();
}

function manageResponse(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
        var trails = JSON.parse(e.target.responseText);
        render(trails);
    }
}

function render(array){
    var template = document.getElementById('card_template');
    array.forEach(element => {insert(newCard(element, template));});
}

function newCard(sentiero, template){
    var card = template.content.cloneNode(true);
    card.querySelector('[name="parco"]').innerHTML = sentiero['parco_nome'];
    card.querySelector('[name="sigla"]').innerHTML = sentiero['sigla'];
    card.querySelector('[name="nome"]').innerHTML = sentiero['nome'];
    card.querySelector('[name="lunghezza"]').innerHTML = sentiero['lunghezza'];
    card.querySelector('[name="dislivello"]').innerHTML = sentiero['dislivello'];
    return card;
}

function insert(card){
    document.getElementById('div_trails').appendChild(card);
}

function clear(){
    div = document.getElementById('div_trails').innerHTML = '';
    while (div.firstChild) {
        div.firstChild.remove()
    }
}

window.addEventListener('DOMContentLoaded', (event) => {
    getData();
});

