<?php
require_once 'backend/entity/docente.php';
require_once 'backend/entity/reserva.php';
require_once 'backend/dao/docenteDAO.php';
require_once 'backend/dao/reservaDAO.php';


$type = filter_input(INPUT_POST, "type");

if($type === "register") {
 
    // Lógica de registro do usuário
    $new_nome = filter_input(INPUT_POST, "new_nome");
    $new_email = filter_input(INPUT_POST, "new_email", FILTER_SANITIZE_EMAIL);

    $docente = new docente (null, $new_nome, $new_email);

  
    $dao= new docenteDao();
    echo $dao->create($docente);

    $new_data_incial = filter_input (INPUT_POST, "new_data_incial");
    $new_data_final = filter_input (INPUT_POST, "new_data_final");
    $new_hora_inicio = filter_input (INPUT_POST, "new_hora_inicio");
    $new_hora_finaliza = filter_input (INPUT_POST, "new_hora_finaliza");
    $new_curso_id = filter_input (INPUT_POST, "new_curso_id");
    $new_sala_id = filter_input (INPUT_POST, "new_sala_id");

    $reserva = new reserva (null, $new_data_incial, $new_data_final, $new_hora_inicio, 
    $new_hora_finaliza, $new_curso_id, $new_sala_id);

    $dao= new reservaDAO();
    echo $dao->create($reserva); 
}

?>