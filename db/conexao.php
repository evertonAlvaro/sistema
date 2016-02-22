<?php 
    class Conexao { 
        public static $instance;
        private function __construct() { 
        // 
        } 
        public static function create() { 
            $localhost = 'localhost';
            $dbname = 'cadastro_clientes';
            $user = 'root';
            $password = 'yourPass';
            
            if (!isset(self::$instance)) { 
                self::$instance = new PDO('mysql:host='.$localhost.';dbname='.$dbname, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING); 
            } 
            return self::$instance;
        } 
    }
?>

