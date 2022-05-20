function requestParkTrails(){
	var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = addTrailsOptions;
	url = 'api/request_data.php?what=trails&park=' + document.getElementById('parco').value;
    httpRequest.open('GET', url, true);
    httpRequest.send();
}

function addTrailsOptions(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
		sentieri = JSON.parse(e.target.responseText);
		const select = document.getElementById('sigla');
		//rimuovere tutte le opzioni dalla select
		while(select.options.length)
			select.remove(0);
		//se elenco dei sentieri parsati è vuoto
		if(Object.keys(sentieri).length === 0){
			var default_option = document.createElement('option');
			default_option.label='Nessun sentiero disponibile';
			select.appendChild(default_option);
			select.disabled = true;
			return;
		}
		sentieri.forEach(sentiero => {
			var option = document.createElement('option');
			option.value = sentiero['sigla'];
			option.label = sentiero['sigla'] + ": " + sentiero['nome'];
			select.appendChild(option);
		});
		select.disabled = false;
    }
}