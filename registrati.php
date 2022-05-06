<!doctype html>
<html lang="it">
<head>
	<title>Registrati</title>
    <?php
		include 'php/head.php';
	?>
    <script src="js/form_validation.js"></script>
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
	<h1>Registrati</h1>

    <div class="container">
        <form action="php/signup_script.php" method="post">
        <div class="form-group row form-floating">
            <input name="username" type="text" maxlength="25" size="25" required class="form-control" placeholder="Username">
            <label for="username">Username</label>
        </div>
        <div class="form-group row form-floating">
            <input name="password" type="password" minlenght="5" maxlength="25" size="25" required class="form-control" placeholder="Password" id="password">
            <label for="password">Password</label>
        </div>
        <div class="form-group row form-floating">
            <input name="passwordConfirm" type="password" maxlength="25" size="25" required class="form-control" placeholder="Password" id="passwordConfirm">
            <label for="password">Conferma Password</label>
        </div>
        <input name="signup_button" type="submit" class="btn btn-primary" value="Registrati" onclick="return validaRegistrazione();">
        <input name="reset_button" type="reset" class="btn btn-secondary" value="Reset">
        </form>

    </div>

</body>
</html>