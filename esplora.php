<!doctype html>
<html lang='it'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>TrailPlanner: Esplora</title>

    <script src='js/update_trails.js'> </script>
    <!-- Mapbox -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet'>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
</head>

<body>
    <?php
        include 'navbar.php';
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
                        include 'database.php';
                        $query = 'SELECT * FROM parchi ORDER BY nome';
                        $result = pg_query($query) or die('Query Failed: '.pg_last_error());
                        while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
                            echo "<option>$line[nome]</option>";
                            echo 'ciao';
                        }
                        pg_free_result($result);
                        pg_close($dbconn);
                    ?>
                </select>

                <div class='btn-group' role='group' aria-label='Difficoltà Sentiero'>
                    <button type='button' class='btn btn-info' >T</button>
                    <button type='button' class='btn btn-info' >E</button>
                    <button type='button' class='btn btn-info' >EE</button>
                </div>

                <label>Dislivello</label>
                <input placeholder='min' id='dislivelloMin'>
                <input placeholder='max' id='dislivelloMax'>

                <button class='btn btn-primary ms-auto' id='btn' onclick='return updateTrails()'>Applica filtri</button>
            </div>
        </div>

        <div class='row'>
            <div id='div_trails' class='col overflow-auto bg-light'>
                <?php
                    include 'display_trails.php';
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