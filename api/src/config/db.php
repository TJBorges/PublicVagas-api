<?php
    class db {

    public static $instance;
    public function __construct() {
        $this->getInstance();
    }
    public static function getInstance() {
        if (!isset(self::$instance)) {            
            self::$instance = new PDO('mysql:host=localhost;dbname=publicvagas', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));        
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;
    }
}

?>