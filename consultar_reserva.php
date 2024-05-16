<?php
require_once 'backend/config/database.php';
require_once 'backend/dao/reservaDAO.php';
$action = $_GET ['action'];

switch($action){
    case 'listar':
        getAll();
        break;

        default:
        http_response_code(400); // Requisição inválida
        echo json_encode(['error' => 'Ação inválida']);
}

function getAll() {
    $reservaDao = new reservaDAO();
    $reservas = $reservaDao->getAll();
    echo json_encode($reservas);
}


?>