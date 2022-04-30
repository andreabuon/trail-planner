<!doctype html>
<html lang="eng">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TrailPlanner</title>
	<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
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
            <input name="password" type="text" maxlength="25" size="25" required class="form-control" placeholder="Password">
            <label for="password">Password</label>
        </div>
        <input name="signup_button" type="submit" class="btn btn-primary" value="Registrati">
        </form>

    </div>

	<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>