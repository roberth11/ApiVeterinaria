<?php
namespace clases_pdo;
require_once 'Conexion.php';
class Mascota{
    private $id_mascota = '';
    private $nombre_mascota;
    private $tamaño;
    private $color;
    private $edad;
    private $sexo;
    private $id_cliente;

    public function __construct(){
        $this->pdo = new Conexion();
    }
    
    public function agregarMascota($nombre_mascota, $tamaño,$color, $edad,$sexo,$id_cliente){
        $this->nombre_mascota = $nombre_mascota;
        $this->tamaño = $tamaño;
        $this->color = $color;
        $this->edad = $edad;
        $this->sexo = $sexo;
        $this->id_cliente = $id_cliente;
        $result = $this->guardarMascota();
        return $result;
    }    
    private function guardarMascota(){
        $pdo = $this->pdo;
        $sql = "INSERT INTO mascota(nombre_mascotas, tamano, color, edad, sexo, id_cliente)  VALUES (:nombre_mascota,:tamano,:color,:edad,:sexo,:id_cliente)";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'nombre_mascota' => $this->nombre_mascota,
            'tamano' => $this->tamaño,
            'color' => $this->color,
            'edad' => $this->edad,
            'sexo' => $this->sexo,
            'id_cliente' => $this->id_cliente
            ]);
        return $result;
    }

    public function getMascotaId($id){
        $pdo = $this->pdo;
        $sql = "SELECT m.id_mascotas, m.nombre_mascotas, m.tamano, m.color, m.edad, m.sexo, m.id_cliente, c.id_cliente, c.nombres, c.apellidos FROM mascota m
        INNER JOIN cliente c ON m.id_cliente = c.id_cliente where id_mascotas = :id";
        $prepared = $pdo->prepare($sql);
        $resultQuery = $prepared->execute(['id' => $id]);
        $result = $prepared->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    

    public function getMascota(){
        $pdo = $this->pdo;
        $sql = "SELECT * FROM mascota utf8";
        $query = $pdo->query($sql);
        $queryResult = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $queryResult;
    }
    public function deleteMascota($id){
        $pdo = $this->pdo;
        $sql = "DELETE FROM mascota WHERE id_mascotas = :id";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'id' => $id
            ]);
        
        return $result;
    }
}

