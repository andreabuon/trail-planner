<?php

    function new_Card(){
        echo '
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
        </div><br>';
    }
    #<!-- prima width era 18rem-->


    echo "<br>";
    for($i=0; $i<$_GET["num"]; $i++){
        new_Card();
    }
?>