<?php
namespace clases_pdo;
require_once 'Conexion.php';
class Raza{
    private $id_raza = '';
    private $raza;

    public function __construct(){
        $this->pdo = new Conexion();
    }
    
    public function getRaza(){
        $pdo = $this->pdo;
        $sql = "SELECT * FROM raza";
        $query = $pdo->query($sql);
        $queryResult = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $queryResult;
    }
}

