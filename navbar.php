<link rel='stylesheet' href='css/navbar.css'>

<?php
    function newNavItem($label, $href) {
        if(basename($_SERVER['SCRIPT_NAME']) == $href) 
            return '<li class="nav-item"><a class="nav-link active" href="'.$href.'">'.$label.'</a></li>';
        else
            return '<li class="nav-item"><a class="nav-link" href="'.$href.'">'.$label.'</a></li>';
    }

?>

<nav class='navbar navbar-expand-md navbar-dark' id='navbarAndrea'>
        <a class='navbar-brand' href='index.php'>TrailPlanner</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav'>
            <span class='navbar-toggler-icon'></span>
        </button>
        
        <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav'>
                <?php
                    $l_items = array(['Esplora', 'esplora.php'], ['Partecipa', 'partecipa.php']);
                    foreach($l_items as $el){
                        echo newNavItem($el[0], $el[1]);
                    }
                ?>
            </ul>
            <ul class='navbar-nav ms-auto'>
                <?php
                    session_start();
                    if(isset($_SESSION['username'])){
                        $r_items = array(['Carica  Percorso', 'carica.php'], ['Gestione Escursioni', 'gestisci.php'], [$_SESSION['username'], ''], ['Esci', 'esci.php']);
                    }else
                        $r_items = array(['Registrati', 'registrati.php'], ['Accedi', 'accedi.php']);
                    foreach($r_items as $el){
                        echo newNavItem($el[0], $el[1]);
                    }
                ?>
            </ul>
       </div>
</nav>

<script src='../js/bootstrap/bootstrap.bundle.min.js'></script>