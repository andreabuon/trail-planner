function updateTrails(e){
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = manageResponse;
    httpRequest.open('GET', '../php/display_trails.php', true);
    httpRequest.send();
}

function manageResponse(e) {
    if (e.target.readyState == 4 && e.target.status == 200) {
        document.getElementById('div_trails').innerHTML = e.target.responseText;
    }
}


window.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM fully loaded and parsed');
});