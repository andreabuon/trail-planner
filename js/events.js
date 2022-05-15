function getData(e){
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = manageResponse;
    httpRequest.open('GET', 'php/get_events.php', true);
    httpRequest.send();
}

function manageResponse(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
        var events;
        try{
            events = JSON.parse(e.target.responseText);
            render(events);
        }
        catch(e){
            console.log('Errore:\n' + e);
        }
    }
}

function render(array){
    var template = document.getElementById('event_template');
    array.forEach(element => {insert(newCard(element, template));});
}

function newCard(evento, template){
    var card = template.content.cloneNode(true);
    card.querySelector('[name="parco"]').innerHTML = evento['sentiero_parco'];
    card.querySelector('[name="sigla"]').innerHTML = evento['sentiero_sigla'];
    card.querySelector('[name="data"]').innerHTML = evento['data'];
    card.querySelector('#partecipa').setAttribute('href', 'php/join_event.php?escursione='+evento['id']);
 	return card;
}

function insert(card){
    document.getElementById('div_events').appendChild(card);
}

window.addEventListener('DOMContentLoaded', (event) => {
    getData();
});
