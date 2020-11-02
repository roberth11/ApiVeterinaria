<?php 
    require_once '../clases/HistoriaClinica.php';
    use clases_pdo\HistoriaClinica;
    header('Content-Type: text/html; charset=UTF-8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Methods: DELETE');


    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $temperatura=$_POST['temperatura'];
            $peso=$_POST['peso'];
            $frecuencia=$_POST['frecuencia'];
            $fecha=$_POST['fecha'];
            $hora=$_POST['hora'];
            $descripcion=$_POST['descripcion'];
            $id_mascota=$_POST['idmascota'];
            $id_veterinario=$_POST['veterinario'];

            $historiaclinica = new HistoriaClinica();
            $result = $historiaclinica->agregarHistoriaClinica($temperatura,$peso,$frecuencia,$fecha,$hora,$descripcion,$id_mascota,$id_veterinario);
            echo json_encode($result);
        break;
        case 'GET':
            if (isset($_GET['idHistoria']) && !empty($_GET['idHistoria'])) {
                $id=$_GET['idHistoria'];
                $historiaclinica = new HistoriaClinica();
                $result = $historiaclinica->getHistoriaClinicaId($id);
                echo json_encode($result);
            }
            else{
                $historiaclinica = new HistoriaClinica();
                $result = $historiaclinica->getHistoriasClinicas();
                echo json_encode($result);
            }    
        break;
        case 'PUT':
            if (isset($_GET['idHistoria']) && !empty($_GET['idHistoria'])) {
                $idhistoria=$_GET['idHistoria'];
                $temperatura=$_GET['temperatura'];
                $peso=$_GET['peso'];
                $frecuencia=$_GET['frecuencia'];
                $fecha=$_GET['fecha'];
                $hora=$_GET['hora'];
                $descripcion=$_GET['descripcion'];
                $id_mascota=$_GET['idmascota'];
                $historiaclinica = new HistoriaClinica();
                $result = $historiaclinica->actualizarHistoriasClinicas($idhistoria,$temperatura,$peso,$frecuencia,$fecha,$hora,$descripcion,$id_mascota);
                echo json_encode($result);
            }
        break;
        case 'DELETE':
            if (isset($_GET['idHistoria']) && !empty($_GET['idHistoria'])) {
                $id=$_GET['idHistoria'];
                $historiaclinica = new HistoriaClinica();
                $result = $historiaclinica->deleteHistoriaClinica($id);
                echo json_encode($result);
            }
        break;
    }
   

?>