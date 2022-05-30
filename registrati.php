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
        include 'head.php'; 
    ?>
    <script src="js/signup_form_validation.js"></script>
    <link href='css/form.css' rel='stylesheet'>
</head>
<body>
	<?php
        include 'navbar.php';
        include 'alerts.php';
    ?>
    <div class='container'>
        <form action='api/signup_script.php' method='post' id='form' name='form_registrazione'>
            <h1>Registrati</h1>
            <div class='form-group form-floating'>
                <input name='username' id='username' type='text' maxlength='25' size='25' required class='form-control' placeholder='Username' pattern='[a-zA-Z0-9]{1,25}'>
                <label for='username'>Username</label>
                <span class="form-text">Deve essere composto solo da lettere e numeri.</span>
            </div>
            <div class='form-group form-floating'>
                <input name='password' id='password' type='password' minlenght='3' maxlength='25' size='25' required class='form-control' placeholder='Password'>
                <label for='password'>Password</label>
                <span class="form-text">Deve essere composta da almeno 3 caratteri e da massimo 25.</span>
            </div>
            <div class='form-group form-floating'>
                <input name='passwordConfirm' id='passwordConfirm' type='password' maxlength='25' size='25' required class='form-control' placeholder='Password'>
                <label for='passwordConfirm'>Conferma Password</label>
            </div>
            <div class='form-group form-floating'>
                <input name='mobile' id='mobile' type='tel' maxlength='20' size='25' required class='form-control' placeholder='Cellulare' pattern='[0-9]{1,25}'>
                <label for='mobile'>Cellulare</label>
            </div>
            <input name='signup_button' type='submit' class='btn btn-primary' value='Registrati' onclick='return validaRegistrazione();'>
            <input name='reset_button' type='reset' class='btn btn-outline-secondary' value='Reset'>
            <span class="form-text">Sei già registrato? <a href='accedi.php'>Accedi</a></span>
        </form>
    </div>
</body>
</html>