<?php
namespace clases_pdo;
require_once 'Conexion.php';
class HistoriaClinica{
    private $id_historia= '';
    private $temperatura;
    private $peso;
    private $frecuencia;
    private $fecha;
    private $hora;
    private $descripcion;
    private $id_mascota;
    private $id_veterinario;


    public function __construct(){
        $this->pdo = new Conexion();
    }
    
    public function agregarHistoriaClinica($temperatura, $peso,$frecuencia, $fecha,$hora,$descripcion,$id_mascota,$id_veterinario){
        $this->temperatura = $temperatura;
        $this->peso = $peso;
        $this->frecuencia = $frecuencia;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->descripcion = $descripcion;
        $this->id_mascota = $id_mascota;
        $this->id_veterinario = $id_veterinario;
        $result = $this->guardarHistoriaClinica();
        return $result;
    }    
    private function guardarHistoriaClinica(){
        $pdo = $this->pdo;
        $sql = "INSERT INTO historia_clinica(temperatura, peso, frecuencia_cardiaca, fecha, hora, descripcion_historia__clinica, id_mascota,id_veterinario)  VALUES (:temperatura,:peso,:frecuencia,:fecha,:hora,:descripcion,:id_mascota,:id_veterinario)";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'temperatura' => $this->temperatura,
            'peso' => $this->peso,
            'frecuencia' => $this->frecuencia,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'descripcion' => $this->descripcion,
            'id_mascota' => $this->id_mascota,
            'id_veterinario' => $this->id_veterinario
            ]);
        return $result;
    }
    public function getHistoriaClinicaId($identidad){
        $pdo = $this->pdo;
        $sql = "SELECT h.id_historia_clinica, h.temperatura, h.peso, h.frecuencia_cardiaca, h.fecha, h.hora, h.descripcion_historia__clinica, h.id_mascota, m.nombre_mascotas FROM historia_clinica h
        INNER JOIN mascota m ON h.id_mascota = m.id_mascotas WHERE id_historia_clinica=:identidad";
        $prepared = $pdo->prepare($sql);
        $resultQuery = $prepared->execute(['identidad' => $identidad]);
        $result = $prepared->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function getHistoriaClinicaxMascota($identidad){
        $pdo = $this->pdo;
        $sql = "SELECT h.id_historia_clinica, h.temperatura, h.peso, h.frecuencia_cardiaca, h.fecha, h.hora, h.descripcion_historia__clinica, h.id_mascota, m.nombre_mascotas FROM historia_clinica h
        INNER JOIN mascota m ON h.id_mascota = m.id_mascotas WHERE id_mascotas=:identidad";
        $prepared = $pdo->prepare($sql);
        $resultQuery = $prepared->execute(['identidad' => $identidad]);
        $result = $prepared->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getHistoriasClinicas(){
        $pdo = $this->pdo;
        $sql = "SELECT h.id_historia_clinica, h.temperatura, h.peso, h.frecuencia_cardiaca, h.fecha, h.hora, h.descripcion_historia__clinica, h.id_mascota, m.nombre_mascotas FROM historia_clinica h
        INNER JOIN mascota m ON h.id_mascota = m.id_mascotas";
        $query = $pdo->query($sql);
        $queryResult = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $queryResult;
    }

    public function actualizarHistoriasClinicas($id_historia,$temperatura, $peso,$frecuencia, $fecha,$hora,$descripcion,$id_mascota){
        $pdo = $this->pdo;
        $sql = "UPDATE historia_clinica SET temperatura=:temperatura,peso=:peso,frecuencia_cardiaca=:frecuencia,fecha=:fecha,hora=:hora,descripcion_historia__clinica=:descripcion,id_mascota=:id_mascota WHERE id_historia_clinica = :id_historia_clinica";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'id_historia_clinica'=>$id_historia,
            'temperatura' => $temperatura,
            'peso' => $peso,
            'frecuencia' => $frecuencia,
            'fecha' => $fecha,
            'hora' => $hora,
            'descripcion' => $descripcion,
            'id_mascota' => $id_mascota
            ]);
        return $result;
    }

    public function deleteHistoriaClinica($id){
        $pdo = $this->pdo;
        $sql = "DELETE FROM historia_clinica WHERE id_historia_clinica = :id";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'id' => $id
            ]);
        
        return $result;
    }

}

