<?php
class database{
    private static $instance = null;

    public static function getInstance(){
        if(self::$instance === null){
            $host = 'localhost';
            $dbname = 'senac_reservaSalas';
            $usename = 'root';
            $password = '';

            self::$instance = new PDO("myswl; host=$host, dbname=$dbname; $usename, $password");
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}

?>