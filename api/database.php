<?php
    class Database{
        private static $conn_string;
        public static function init(){
            if(!isset(self::$conn_string)){
                //self::$conn_string = 'host=localhost port=5432 dbname=progettoLTW_db user=andrea password=password'; 
                $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../config.ini');
                //brutto ma con le doppie virgolette non funge
                self::$conn_string = 'host=' . $config['host'] . ' port=' . $config['port'] . ' dbname=' . $config['dbname'] . ' user=' . $config['user'] . ' password=' . $config['password']; ;
            }
        }

        public static function connect(){
            Database::init();
            return pg_connect(self::$conn_string);
        }
    }
?>
