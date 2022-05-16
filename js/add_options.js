function requestTrailData(){
	var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = manageTrailData;
	url = '/php/request_data.php?what=trails&park=' + document.getElementById('parco').value;
    httpRequest.open('GET', url, true);
    httpRequest.send();
}

function manageTrailData(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
		var select = document.getElementById('sigla');
		if(e.target.responseText == ''){
			select.innerHTML = "<option selected disabled>Nessun sentiero disponibile</option>";
			select.disabled = true;
		}
		else{
			//sistemare!!!
			select.innerHTML = e.target.responseText;
			select.disabled = false;
		}
    }
}