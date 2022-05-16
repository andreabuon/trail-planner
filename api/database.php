<?php
    class Database{
        private static $conn_string;
        //sistemare!!!!
        //caricare da file di configurazione
        public static function init(){
            self::$conn_string = 'host=localhost port=5432 dbname=progettoLTW_db user=andrea password=password'; 
        }

        public static function connect(){
            //Database::init();
            return pg_connect(self::$conn_string);
        }
    }
    Database::init();
?>
