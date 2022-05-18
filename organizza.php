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
    <?php include 'head.php'; ?>
	<link href='css/form.css' rel='stylesheet'>
	<script src='js/add_options.js'></script>
</head>

<body>
<?php
    include 'navbar.php';
	include 'alerts.php';
?>
<h1>Organizza Escursione</h1>
<form action='api/new_event.php' id='form' method='post' class='container'>
	<label for='parco' class='form-label'>Parco:</label>
	<select name='parco' required id='parco' class='form-control' onchange='return requestTrailData()'>
		<option selected disabled>Seleziona Parco...</option>
		<?php 
			include 'api/get_data.php'; 
			include 'api/options.php';
			foreach(getParks() as $trail)
				echo newOption($trail['nome']);
		?>
	</select>

	<label for='sigla' class='form-label'>Sentiero:</label>
	<select name='sigla' required id='sigla' class='form-control' disabled>
		<option selected disabled>Seleziona Sentiero...</option>
	</select>
	
	<label for='data' class='form-label'>Data:</label>
	<input name='data' type='date' id='data' class='form-control' required>

	<label for='organizzatore' class='form-label'>Organizzatore:</label>
	<input name='organizzatore' type='text' id='organizzatore' class='form-control' required readonly value=<?php echo $_SESSION['username'];?>>

	<label for='note' class='form-label'>Note:</label>
	<textarea name='note' id='note' class='form-control' placeholder='Note aggiuntive' maxlength='200' value='' pattern='[a-zA-Z0-9 ]+'></textarea>

	<input type=submit name='btn_submit' value='Organizza' class='btn btn-primary'>
</form>
</body>
