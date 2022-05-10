function listTrails(){
	var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = manageResponse;
	url = '../php/display_trails_select.php?parco=' + document.getElementById('select_parco').value;
    httpRequest.open('GET', url, true);
    httpRequest.send();
}

function manageResponse(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
        document.getElementById('select_sigla').innerHTML = e.target.responseText;
		if(e.target.responseText == ""){
			document.getElementById('select_sigla').disabled = true;
			document.getElementById('select_sigla').innerHTML = "<option selected disabled>Nessun sentiero disponibile</option>";
		}
		else{
			document.getElementById('select_sigla').disabled = false;
		}
    }
}