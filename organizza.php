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

<form method='post' action='php/new_event.php'>
	<label for='sentiero' class='form-label'>Sentiero:</label>
	<select name='sentiero' class='form-control' required>
		<option selected disabled>Seleziona sentiero...</option>;
		<?php include 'php/display_trails_select.php'; ?>
	</select>
	
	<label for='data' class='form-label'>Data:</label>
	<input class='form-control' name='data' type='date' required>

	<label for='note' class='form-label'>Note:</label>
	<textarea name='note' class='form-control' placeholder='Note aggiuntive' maxlength='200'>
	</textarea>

	<input type=submit name='btn_submit' value='Organizza' class='btn btn-primary btn-block'>
</form>

</body>
