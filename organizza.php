<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: accedi.php?enforcelogin=1');
		exit();
    }
?>

<!doctype html>
<html lang='it'>
<head>
	<title>Organizza</title>
    <?php include 'php/head.php'; ?>
	<script src='js/add_trail_options.js'></script>
</head>

<body>
<?php
    include 'php/navbar.php';
	include 'php/alerts.php';
?>
<h1>Organizza Escursione</h1>
<form action='php/new_event.php' id='form' method='post' class='container'>
	<label for='parco' class='form-label'>Parco:</label>
	<select name='parco' required id='parco' class='form-control' onchange='listTrails()'>
		<option selected disabled>Seleziona Parco...</option>
		<?php include 'php/display_parks_select.php'; ?>
	</select>

	<label for='sigla' class='form-label'>Sigla sentiero:</label>
	<select name='sigla' required id='sigla' class='form-control' disabled>
		<option selected disabled>Seleziona Sentiero...</option>
	</select>
	
	<label for='data' class='form-label'>Data:</label>
	<input name='data' type='date' id='data' class='form-control' required>

	<label for='organizzatore' class='form-label'>Organizzatore:</label>
	<input name='organizzatore' type='text' id='organizzatore' class='form-control' required readonly value=<?php echo $_SESSION['username'];?>>

	<label for='note' class='form-label'>Note:</label>
	<input name='note' id='note' class='form-control' placeholder='Note aggiuntive' maxlength='200' value='' pattern='[a-zA-Z0-9 ]+'>

	<input type=submit name='btn_submit' value='Organizza' class='btn btn-primary'>
</form>
</body>
