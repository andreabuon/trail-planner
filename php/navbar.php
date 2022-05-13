<link rel='stylesheet' href='../css/navbar.css'>

<nav class='navbar navbar-expand-md navbar-dark' id='navbarAndrea'>
        <a class='navbar-brand' href='index.php'>TrailPlanner</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav'>
                <!--
                <li class='nav-item'>
                    <a class='nav-link' aria-current='page' href='index.php'>Home</a>
                -->
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='../esplora.php'>Esplora</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='../partecipa.php'>Partecipa</a>
                </li>
            </ul>
            <ul class='navbar-nav ms-auto'>
                
                <?php
                    session_start();
                    if(isset($_SESSION['username'])){
                        echo '
                        <!--
                        <li class="nav-item">
                            <a class="nav-link disabled" href="../escursioni.php">Escursioni</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="../tracce.php">Tracce</a>
                        </li>
                        -->
                        <li class="nav-item">
                            <a class="nav-link" href="../carica.php">Carica</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../organizza.php">Organizza</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" >'.$_SESSION['username'].'</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../esci.php">Esci</a>
                        </li>
                        ';
                    }else{
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" href="../registrati.php">Registrati</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../accedi.php">Accedi</a>
                        </li>
                        ';
                    }
                ?>
            </ul>
       </div>
</nav>

<script src='../js/bootstrap/bootstrap.bundle.min.js'></script>