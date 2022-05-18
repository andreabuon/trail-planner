<link rel='stylesheet' href='css/navbar.css'>

<?php
    class navItem{
        private $text;
        private $href;

        function __construct($text, $href){
            $this->text = $text;
            $this->href = $href;
        }

        function __toString(){
            if(basename($_SERVER['SCRIPT_NAME'])==$this->href) 
                return '<li class="nav-item"><a class="nav-link active" href="'.$this->href.'">'.$this->text.'</a></li>';
            else
                return '<li class="nav-item"><a class="nav-link" href="'.$this->href.'">'.$this->text.'</a></li>';
        }
    }
    function stampaNavs($array){
        foreach($array as $el)
        echo (new navItem($el[0], $el[1]));
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
                    stampaNavs($l_items);
                ?>
            </ul>
            <ul class='navbar-nav ms-auto'>
                <?php
                    session_start();
                    if(isset($_SESSION['username'])){
                        $r_items = array(['Carica', 'carica.php'],['Organizza', 'organizza.php'], [$_SESSION['username'], ''], ['Esci', 'esci.php']);
                    }else
                        $r_items = array(['Registrati', 'registrati.php'], ['Accedi', 'accedi.php']);
                    stampaNavs($r_items);
                ?>
            </ul>
       </div>
</nav>

<script src='../js/bootstrap/bootstrap.bundle.min.js'></script>