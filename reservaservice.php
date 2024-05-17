<?php
require_once 'backend/entity/reserva.php';
require_once 'backend/dao/reservaDAO.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date'])) {
//     $date_input = $_POST['date'];
//     $date = date_create($new_date_incial);
//     if ($date = $date_input  ) {
//         echo date_format($date, "Y/m/d");
        
//     } else {
//         echo "Formato inválido";
//     }
// }



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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>status</title>
</head>
<body>
    <h1>reserva efetuada com sucesso</h1>
    <button><a href="index.php">voltar para a pagina inicial</a></button>
    
</body>
</html>