<?php 
    require_once '../clases/Veterinario.php';
    use clases_pdo\Veterinario;

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Methods: DELETE');

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
        break;
        case 'GET':
            $veterinario = new Veterinario();
            $result = $veterinario->getVeterinarios();
            echo json_encode($result);
        break;
        case 'PUT':
            echo "GET Ingreso";
        break;
        case 'DELETE':
        break;
    }
   

?>