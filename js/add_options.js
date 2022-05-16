function requestTrailData(){
	var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = manageTrailData;
	url = 'api/request_data.php?what=trails&park=' + document.getElementById('parco').value;
    httpRequest.open('GET', url, true);
    httpRequest.send();
}

function manageTrailData(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
		var select = document.getElementById('sigla');
		select.innerHTML='';
		if(e.target.responseText == ''){
			select.innerHTML = "<option selected disabled>Nessun sentiero disponibile</option>";
			select.disabled = true;
		}
		else{
			var options = JSON.parse(e.target.responseText);
			options.forEach(e => {
				var opt_el = document.createElement('option');
				opt_el.value = e['sigla'];
				opt_el.innerText = e['sigla'] +": " + e['nome'];
				//console.log(opt_el);
				select.appendChild(opt_el);
			});
			select.disabled = false;
		}
    }
}