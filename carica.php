<!doctype html>
<html lang='it'>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='length=device-length, initial-scale=1'>
	<title>TrailPlanner: Carica</title>
</head>

<body>

<?php
    include 'navbar.php';
?>

<h1>Carica</h1>

<div>
<form method='post' action='insert_trail.php'>
    <label for='form_sigla' class='form-label'>Sigla:</label>
    <input class='form-control' id='form_sigla' maxlength='4' required>
    
    <label for='form_nome' class='form-label'>Nome:</label>
    <input class='form-control' id='form_nome' maxlength='70' required>

    <label for='form_descrizione' class='form-label'>Descrizione:</label>
    <textarea class='form-control' id='form_descrizione' maxlength='2000'></textarea>

    <label for='form_parco' class='form-label'>Parco:</label>
    <select class='form-control' id='form_parco' required>
        <option selected disabled>Seleziona Parco...</option>;
        <?php
            include 'database.php';
            $query = 'SELECT * FROM parchi ORDER BY nome';
            $result = pg_query($query) or die('Query Failed: '.pg_last_error());
            while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
                echo "<option>$line[nome]</option>";
            }
            pg_free_result($result);
            pg_close($dbconn);
        ?>
    </select>

    <label for='form_lunghezza' class='form-label'>Lunghezza:</label>
    <input class='form-control' id='form_lunghezza' number maxlength='4' required>

    <label for='form_dislivello' class='form-label'>Dislivello:</label>
    <input class='form-control' id='form_dislivello' number maxlength='4' required>

    <label for='form_difficoltà' class='form-label'>Difficoltà:</label>
    <input class='form-control' id='form_difficoltà' maxlength='3'>

    <div class='mb-3'>
    <label for='form_file' class='form-label'>Traccia GPS</label>
    <input class='form-control' type='file' id='form_file' accept='.json, .geojson'>
    </div>

    <input type=submit class='btn btn-primary' value='Carica' id='form_submit'>

</form>
</div>
</body>