<!doctype html>
<html lang="it">
<head>
	<title>Accedi</title>
	<?php
		include 'php/head.php';
	?>
</head>
<body>
	<?php
		session_start();
		if(isset($_SESSION['username'])) {
			header('Location: index.php');
			return;
		}
		include 'php/navbar.php';
	?>
	<h1>Accedi</h1>

	<form action='php/login_script.php' method='post' class='container' name='login_form'>
		<div class='form-group row form-floating'>
			<input name='username' type='text' maxlength='25' size='25' required autofocus class='form-control' placeholder='Username' pattern="[a-zA-Z0-9-]+">
			<label for='username'>Username</label>
		</div>
		<div class='form-group row form-floating'>
			<input name='password' type='password' maxlength='25' size='25' required class='form-control' placeholder='Password'>
			<label for='password'>Password</label>
		</div>
			<input name='login_button' type='submit' class='btn btn-primary' value='Accedi'>
			<!-- <input name="reset_button" type="reset" class="btn btn-secondary" value="Reset"> -->
	</form>

</body>
</html>