<?php 
    require_once '../clases/Mascota.php';
    use clases_pdo\Mascota;
    header('Content-Type: text/html; charset=UTF-8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Methods: DELETE');

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
                $nombre_mascota=$_POST['nombremascota'];
                $tamano=$_POST['tamano'];
                $color=$_POST['color'];
                $edad=$_POST['edad'];
                $sexo=$_POST['sexo'];
                $raza=$_POST['raza'];
                $id_cliente=$_POST['selectCliente'];

                $mascota = new Mascota();
                $result = $mascota->agregarMascota($nombre_mascota, $tamano,$color, $edad,$sexo,$raza,$id_cliente);
                echo json_encode($result);
        break;
        case 'GET':
            if (isset($_GET['idmascota']) && !empty($_GET['idmascota'])) {
                $id=$_GET['idmascota'];
                $mascota = new Mascota();
                $result = $mascota->getMascotaId($id);
                echo json_encode($result);
            }
            else{
                $mascota = new Mascota();
                $result = $mascota->getMascota();
                echo json_encode($result);
            }            
        break;
        case 'PUT':
            echo "GET Ingreso";
        break;
        case 'DELETE':
            if (isset($_GET['idmascota']) && !empty($_GET['idmascota'])) {
                $id=$_GET['idmascota'];
                $mascota = new Mascota();
                $result = $mascota->deleteMascota($id);
                echo json_encode($result);
            }
        break;
    }
   

?>