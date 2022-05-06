<!doctype html>
<html lang='it'>
<head>
	<title>Carica</title>
    <?php
		include 'php/head.php';
	?>
</head>

<body>

<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: index.php');
    }

    include 'php/navbar.php';
?>

<h1>Carica</h1>

<div class='container' id='trail_form'>
    <form method='post' action='php/upload_trail.php' enctype='multipart/form-data'>
        <label for='form_sigla' class='form-label'>Sigla:</label>
        <input class='form-control' name='form_sigla' maxlength='4' required>
        
        <label for='form_nome' class='form-label'>Nome:</label>
        <input class='form-control' name='form_nome' maxlength='70' required>

        <label for='form_descrizione' class='form-label'>Descrizione:</label>
        <textarea class='form-control' name='form_descrizione' maxlength='2000'></textarea>

        <label for='form_parco' class='form-label'>Parco:</label>
        <select class='form-control' name='form_parco' required>
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
        <input class='form-control' name='form_lunghezza' number maxlength='4' required>

        <label for='form_dislivello' class='form-label'>Dislivello:</label>
        <input class='form-control' name='form_dislivello' number maxlength='4' required>

        <label for='form_difficoltà' class='form-label'>Difficoltà:</label>
        <input class='form-control' name='form_difficolta' maxlength='3'>

        <div class='mb-3'>
            <label for='form_file' class='form-label'>Traccia GPS</label>
            <input class='form-control' type='file' name='form_file' accept='.json, .geojson'>
        </div>
        
        <div class="d-grid gap-2">
            <input type=submit class='btn btn-primary btn-block' value='Carica' name='btn_submit'>
        </div>
    </form>
</div>
</body>