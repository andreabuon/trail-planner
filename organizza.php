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
<form action='api/new_event.php' id='form' method='post' class='container'>
	<h1>Organizza Escursione</h1>
	<label class='form-label'>Parco:
		<select name='parco' required autofocus id='parco' class='form-control' onchange='return requestParkTrails();'>
			<option selected disabled>Seleziona Parco...</option>
			<?php 
				include 'api/get_data.php'; 
				include 'options.php';
				foreach(getParks() as $trail)
					echo newOption($trail['nome']);
			?>
		</select>
	</label>

	<label class='form-label'>Sentiero:
		<select name='sigla' required id='sigla' class='form-control' disabled>
			<option selected disabled>Seleziona Sentiero...</option>
		</select>
	</label>

	<label class='form-label'>Data:
		<input name='data' type='date' id='data' class='form-control' required>
	</label>

	<label class='form-label'>Organizzatore:
		<input name='organizzatore' type='text' id='organizzatore' class='form-control' required readonly value=<?php echo $_SESSION['username'];?>>
	</label>

	<label class='form-label'>Note:
		<textarea name='note' id='note' class='form-control' placeholder='Note aggiuntive' maxlength='200' value='' pattern='[a-zA-Z0-9 ]+'></textarea>
	</label>

	<input type=submit name='btn_submit' value='Organizza' class='btn btn-primary'>
</form>
</body>
</html>