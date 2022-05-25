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
	<?php include 'head.php'; ?>
	<link href='css/form.css' rel='stylesheet'>
</head>
<body>
	<?php 
		include 'navbar.php'; 
		include 'alerts.php';
	?>
	<h1>Accedi</h1>
	<form action='api/login_script.php' method='post' class='container' id='form' name='login_form'>
		<div class='form-group row form-floating'>
			<input name='username' id='username' type='text' maxlength='25' size='25' required autofocus class='form-control' placeholder='Username' pattern='[a-zA-Z0-9]{1,25}'>
			<label for='username'>Username</label>
		</div>
		<div class='form-group row form-floating'>
			<input name='password' id='password' type='password' minlenght='3' maxlength='25' size='25' required class='form-control' placeholder='Password'>
			<label for='password'>Password</label>
		</div>
			<input name='login_button' type='submit' class='btn btn-primary' value='Accedi'>
			<span class="form-text">Non sei registrato? <a href='registrati.php'>Registrati</a></span>
	</form>
</body>
</html>