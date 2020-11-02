<?php 
    require_once '../clases/Cliente.php';
    use clases_pdo\Cliente;

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Methods: DELETE');

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
        break;
        case 'GET':
            $cliente = new Cliente();
            $result = $cliente->getCliente();
            echo json_encode($result);
        break;
        case 'PUT':
            echo "GET Ingreso";
        break;
        case 'DELETE':
        break;
    }
   

?>