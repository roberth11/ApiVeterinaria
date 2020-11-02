<?php
namespace clases_pdo;
require_once 'Conexion.php';
class Cliente{
    private $id_cliente = '';
    private $nombres;
    private $apellidos;
    private $dirección;
    private $telefono;
    private $correo;
    private $documento;
    private $sexo;

    public function __construct(){
        $this->pdo = new Conexion();
    }
    public function getCliente(){
        $pdo = $this->pdo;
        $sql = "SELECT * FROM cliente";
        $query = $pdo->query($sql);
        $queryResult = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $queryResult;
    }
}

