<?php

define("host","localhost");
define("user",'root');
define("pass",'');
define("db",'wiki');

class Database{
    private $host ;
    private $db_name ;
    private $username ;
    private $password;
    
   

    private function __construct() {
        
    }

    public static function getInstance(){
        try {
            $conn = new PDO("mysql:host=". host .";dbname=". db , user, pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        return $conn;
    }


}