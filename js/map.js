const uploaddir = 'uploads/';

function getTrailTrack(relative_path) {
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = processTrailTrack;
	httpRequest.open('GET',  uploaddir + relative_path, true);
	httpRequest.send();
}

function processTrailTrack(e) {
	if (e.target.readyState == 4 && e.target.status == 200) {
		var track = JSON.parse(e.target.responseText);
		renderTrail(track);	
		//console.debug(track);
	}
}

function renderTrail(track) {
	clearMap();
	map.addSource('route', {'type': 'geojson', 'data': track });
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
	//centra la mappa sulle prime coordinate del sentiero
	map.flyTo({center: track.features[0].geometry.coordinates[0][0], zoom: 13});
}

function clearMap(){
	//SISTEMARE!!!!!
	try{
	if(map.getLayer('route'))
		map.removeLayer('route');
	if(map.getSource('route'));
    	map.removeSource('route');
	}catch{}
}

mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmVhLTE4OTQyNjYiLCJhIjoiY2wyNzZhMnhsMDE0czNncWxnMDRjdDZyMiJ9.WyEF7AEAWB4RKbx0ueiJHQ';
const map = new mapboxgl.Map({
	container: 'div_map', // container ID
	style: 'mapbox://styles/mapbox/satellite-v9', // 'mapbox://styles/mapbox/outdoors-v11' senza immagini satellitari
	center: [14.042513751693576, 42.068132238944344], // posizione iniziale[lng, lat] 
	zoom: 12, // zoom iniziale
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
	map.addLayer({
		'id': 'sky',
		'type': 'sky',
		'paint': {
		'sky-type': 'atmosphere',
		'sky-atmosphere-sun': [0.0, 0.0],
		'sky-atmosphere-sun-intensity': 15
		}
	});
});