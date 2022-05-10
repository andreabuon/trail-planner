<!doctype html>
<html lang='it'>
<head>
	<title>Organizza</title>
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

<h1>Organizza</h1>
<form method='post' class='container' action='php/new_event.php'>
	<label for='parco' class='form-label'>Parco:</label>
	<select name='parco' class='form-control' id='select_parco' onchange='listTrails()' required>
		<option selected disabled>Seleziona Parco...</option>
		<?php include 'php/display_parks_select.php'; ?>
	</select>

	<label for='sigla' class='form-label'>Sigla sentiero:</label>
	<select name='sigla' class='form-control' id='select_sigla' required disabled>
		<option selected disabled hidden>Seleziona Sentiero...</option>
	</select>
	
	<label for='data' class='form-label'>Data:</label>
	<input class='form-control' name='data' type='date' required>

	<label for='organizzatore' class='form-label'>Organizzatore:</label>
	<input class='form-control' name='organizzatore' type='text' required readonly value=<?php echo $_SESSION['username'];?>>

	<label for='note' class='form-label'>Note:</label>
	<input name='note' class='form-control' placeholder='Note aggiuntive' maxlength='200' value=''>

	<input type=submit name='btn_submit' value='Organizza' class='btn btn-primary btn-block'>
</form>

<script src='js/add_trail_options.js'></script>

</body>
