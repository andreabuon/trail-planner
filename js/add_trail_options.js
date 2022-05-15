function listTrails(){
	var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = manageResponse;
	url = '/php/display_trails_select.php?parco=' + document.getElementById('parco').value;
    httpRequest.open('GET', url, true);
    httpRequest.send();
}

function manageResponse(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
		var select = document.getElementById('sigla');
		if(e.target.responseText == ''){
			select.innerHTML = "<option selected disabled>Nessun sentiero disponibile</option>";
			select.disabled = true;
		}
		else{
			select.innerHTML = e.target.responseText;
			select.disabled = false;
		}
    }
}