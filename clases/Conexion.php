<?php
namespace clases_pdo;
class Conexion extends \PDO{
    private $typeDB = 'mysql';
    private $host = 'localhost';
    private $dbname = 'bveterinaria';
    private $userDB = 'root';
    private $passwordDB = 'usbw';
    private static $persistent = false;
    public function __construct(){
        try {
            parent::__construct("$this->typeDB:host=$this->host;dbname=$this->dbname",$this->userDB,$this->passwordDB,array(
                \PDO::ATTR_PERSISTENT => self::$persistent,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_STRINGIFY_FETCHES => true,
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
            $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);   
        } catch (Exception $e) {
            echo "DATA BASE ERROR:".$e->getMessage();
        }
    }
}


?>