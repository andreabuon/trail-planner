<!doctype html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TrailPlanner: Registrati</title>

    <script src="js/form_validation.js"></script>
</head>
<body>
	<?php
		include 'navbar.php';
	?>
	<h1>Registrati</h1>

    <div class="container">
        <form action="signup_script.php" method="post">
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