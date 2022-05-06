function assignBtnFn(){
    var btn = document.getElementById('btn');
    btn.onclick = updateTrails();
}

function updateTrails(e){
    console.log("Updating displayed trails...")
    document.getElementById('div_trails').innerHTML = 'Caricamento...';
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = manageResponse;
    httpRequest.open('GET', './scripts/display_trails.php', true);
    httpRequest.send();
}

function manageResponse(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
        document.getElementById('div_trails').innerHTML = e.target.responseText;
    }
}

window.onload = assignBtnFn();