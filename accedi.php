<?php
	session_start();
	if(isset($_SESSION['username'])) {
		header('Location: index.php?logged=1');
		exit();
	}
?>

<!doctype html>
<html lang="it">
<head>
	<title>Accedi</title>
	<?php include 'php/head.php'; ?>
</head>
<body>
	<?php 
		include 'php/navbar.php'; 
		include 'php/alerts.php';
	?>
	<h1>Accedi</h1>

	<form action='php/login_script.php' method='post' class='container' name='login_form'>
		<div class='form-group row form-floating'>
			<input name='username' id='username' type='text' maxlength='25' size='25' required autofocus class='form-control' placeholder='Username' pattern='[a-zA-Z0-9]{1,25}'>
			<label for='username'>Username</label>
		</div>
		<div class='form-group row form-floating'>
			<input name='password' id='password' type='password' minlenght='3' maxlength='25' size='25' required class='form-control' placeholder='Password'>
			<label for='password'>Password</label>
		</div>
			<input name='login_button' type='submit' class='btn btn-primary' value='Accedi'>
	</form>

</body>
</html>