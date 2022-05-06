<!doctype html>
<html lang='it'>
<head>
    <title>Esplora</title>
    <?php
		include 'php/head.php';
	?>

    <script src='js/update_trails.js'> </script>
    <!-- Mapbox -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet'>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
</head>

<body>
    <?php
        include 'php/navbar.php';
    ?>

    <h1>Esplora</h1>

    <div class='container-fluid' style='max-height: 70%; overflow: auto;'>
        <div class='row'>
            <div id='div_filters' class='col d-flex'>
                <h6>Filtri</h6>
                <br>

                <label>Nome: </label>
                <input placeholder='Nome'>

                <select id='filter_parco'>
                    <option selected>Seleziona Parco...</option>;
                    <?php
                       include 'php/display_parks_select.php';
                    ?>
                </select>

                <div class='btn-group' role='group' aria-label='Difficoltà Sentiero'>
                    <button type='button' class='btn btn-info' >T</button>
                    <button type='button' class='btn btn-info' >E</button>
                    <button type='button' class='btn btn-info' >EE</button>
                </div>

                <label>Dislivello</label>
                <input placeholder='min' width='4' id='dislivelloMin'>
                <input placeholder='max' width='4' id='dislivelloMax'>

                <button class='btn btn-primary ms-auto' id='btn' onclick='return updateTrails()'>Applica filtri</button>
            </div>
        </div>

        <div class='row'>
            <div id='div_trails' class='col overflow-auto bg-light'>
                <?php
                    include 'php/display_trails.php';
                ?>
            </div>

            <div id='div_map' class='col'>
            </div>
        </div>
    </div>

    <script>
	    mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmVhLTE4OTQyNjYiLCJhIjoiY2wyNzZhMnhsMDE0czNncWxnMDRjdDZyMiJ9.WyEF7AEAWB4RKbx0ueiJHQ';
        const map = new mapboxgl.Map({
                        container: 'div_map', // container ID
                        style: 'mapbox://styles/mapbox/outdoors-v11', // style URL
                        center: [14.042513751693576, 42.068132238944344], // starting position [lng, lat] 
                        zoom: 12 // starting zoom
        });
    </script>

</body>

</html>