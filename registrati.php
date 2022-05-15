<?php
    session_start();
    if(isset($_SESSION['username'])) {
        header('Location: index.php');
        exit();
    }
?>
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
        include 'php/navbar.php';
        include 'php/alerts.php';
    ?>
	<h1>Registrati</h1>
    <form action='php/signup_script.php' method='post' class='container' name='form_registrazione'>
        <div class='form-group  form-floating'>
            <input name='username' id='username' type='text' maxlength='25' size='25' required class='form-control' placeholder='Username' pattern='[a-zA-Z0-9]{1,25}'>
            <label for='username'>Username</label>
        </div>
        <div class='form-group form-floating'>
            <input name='password' id='password' type='password' minlenght='3' maxlength='25' size='25' required class='form-control' placeholder='Password'>
            <label for='password'>Password</label>
        </div>
        <div class='form-group form-floating'>
            <input name='passwordConfirm' id='passwordConfirm' type='password' maxlength='25' size='25' required class='form-control' placeholder='Password'>
            <label for='passwordConfirm'>Conferma Password</label>
        </div>
        <input name='signup_button' type='submit' class='btn btn-primary' value='Registrati' onclick='return validaRegistrazione();'>
        <input name='reset_button' type='reset' class='btn btn-outline-secondary' value='Reset'>
    </form>
</body>
</html>