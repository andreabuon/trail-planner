const TOKEN = '-------'; // INSERIRE TOKEN MAPBOX 
const MAP_DIV = 'div_map';
const UPLOADDIR = 'uploads/';

// Scarica traccia del sentiero dal server
function getTrailTrack(relative_path) {
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = processTrailTrack;
	httpRequest.open('GET',  UPLOADDIR + relative_path, true);
	httpRequest.send();
}

function processTrailTrack(e) {
	if (e.target.readyState == 4 && e.target.status == 200) {
		var track = parseData(e.target.responseText);
		if(track)
			renderTrail(track);	
	}
}

function parseData($source){
	try{
		return JSON.parse($source);
	}
	catch{
		console.error('Trail data is invalid');
		return 0;
	}
}

// Pulisce la mappa, aggiunge la traccia del sentiero e la visualizza. Centra mappa sul primo punto del sentiero.
function renderTrail(track) {
	clearMap();

	if(!track.features[0].geometry)
		return;

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
	//sistemare
	try{
		if(map.getLayer('route'))
			map.removeLayer('route');
		if(map.getSource('route'));
	    	map.removeSource('route');
	}catch{}
}

mapboxgl.accessToken = TOKEN;
const map = new mapboxgl.Map({
	container: MAP_DIV, // div dove visualizzare la mappa
	style: 'mapbox://styles/mapbox/satellite-v9', // stile mappa
	// style: 'mapbox://styles/mapbox/outdoors-v11'
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