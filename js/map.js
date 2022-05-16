function scaricaSentiero() {
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = gestisciResponse;
	httpRequest.open('GET', "assets/track.geojson", true);
	httpRequest.send();
}

function gestisciResponse(e) {
	if (e.target.readyState == 4 && e.target.status == 200) {
		disegnaSentiero(JSON.parse(e.target.responseText));
	}
}

function clearMap(){
    map.removeLayer('route');
    map.removeSource('route');
    return true;
}

function disegnaSentiero(track) {
	map.addSource('route', {
		'type': 'geojson',
		'data': track
	});
	map.addLayer({
		'id': 'route',
		'type': 'line',
		'source': 'route',
		'layout': {
			'line-join': 'round',
			'line-cap': 'round'
		},
		'paint': {
			'line-color': '#ff5733 ',
			'line-width': 5
		}
	});
}

mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmVhLTE4OTQyNjYiLCJhIjoiY2wyNzZhMnhsMDE0czNncWxnMDRjdDZyMiJ9.WyEF7AEAWB4RKbx0ueiJHQ';
const map = new mapboxgl.Map({
	container: 'div_map', // container ID
	style: 'mapbox://styles/mapbox/outdoors-v11', // style URL
	center: [14.042513751693576, 42.068132238944344], // starting position [lng, lat] 
	zoom: 13, // starting zoom
});

map.on('load', () => {
	map.addSource('mapbox-dem', {
		'type': 'raster-dem',
		'url': 'mapbox://mapbox.mapbox-terrain-dem-v1',
		'tileSize': 512,
		'maxzoom': 14
		});
	map.setTerrain({ 'source': 'mapbox-dem', 'exaggeration': 1.5 });
	map.setPitch(75);
	map.setBearing(40);
	/*
	map.addLayer({
		'id': 'sky',
		'type': 'sky',
		'paint': {
		'sky-type': 'atmosphere',
		'sky-atmosphere-sun': [0.0, 0.0],
		'sky-atmosphere-sun-intensity': 15
		}
	});*/
});