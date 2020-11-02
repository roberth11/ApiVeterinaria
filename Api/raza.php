<?php 
    require_once '../clases/Raza.php';
    use clases_pdo\Raza;

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Methods: DELETE');

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
        break;
        case 'GET':
            $raza = new Raza();
            $result = $raza->getRaza();
            echo json_encode($result);
        break;
        case 'PUT':
            echo "GET Ingreso";
        break;
        case 'DELETE':
        break;
    }
   

?>