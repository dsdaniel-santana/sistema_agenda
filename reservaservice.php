<?php
require_once 'backend/entity/reserva.php';
require_once 'backend/dao/reservaDAO.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date'])) {
    $date_input = $_POST['date'];
    $date = date_create($new_date_incial);
    if ($date = $date_input  ) {
        echo date_format($date, "Y/m/d");
        
    } else {
        echo "Formato inválido";
    }
}



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

?>