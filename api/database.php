<?php
    class Database{
        private static $conn_string;
        public static function init(){
            if(!isset(self::$conn_string)){
                $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../config.ini');
                self::$conn_string = "host={$config['host']} port={$config['port']} dbname={$config['dbname']} user={$config['user']} password={$config['password']}";
            }
        }

        public static function connect(){
            Database::init();
            return pg_connect(self::$conn_string);
        }
    }
?>
