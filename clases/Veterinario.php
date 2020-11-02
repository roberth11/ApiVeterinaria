<?php
namespace clases_pdo;
require_once 'Conexion.php';
class Veterinario{
    private $id_veterinario = '';
    private $nombres;
    private $apellidos;
    private $telefono;
    private $dirección;
    private $correo;
    private $documento;
    private $sexo;

    public function __construct(){
        $this->pdo = new Conexion();
    }
    
    public function getVeterinarios(){
        $pdo = $this->pdo;
        $sql = "SELECT * FROM veterinarios";
        $query = $pdo->query($sql);
        $queryResult = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $queryResult;
    }
}

