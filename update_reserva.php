<?php
require_once 'backend/config/database.php';  // Include database connection
require_once 'backend/dao/reservaDAO.php';
require_once 'backend/entity/reserva.php';

// Check if form is submitted using POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get reservation ID from hidden field (assuming it exists in the form)
  $reserva_id = filter_input(INPUT_POST, 'reserva_id', FILTER_VALIDATE_INT);

  // Validate reservation ID
  if (!$reserva_id) {
    echo "Erro: ID da reserva inválido.";
    exit;
  }

  // Get other form data (assuming names match form field names)
  $new_data_incial = filter_input(INPUT_POST, 'new_data_incial');
  $new_data_final = filter_input(INPUT_POST, 'new_data_final');
  $new_hora_inicio = filter_input(INPUT_POST, 'new_hora_inicio');
  $new_hora_finaliza = filter_input(INPUT_POST, 'new_hora_finaliza');
  $new_curso_id = filter_input(INPUT_POST, 'new_curso_id');
  $new_sala_id = filter_input(INPUT_POST, 'new_sala_id');

  // Create a reserva object with retrieved ID and new data
  $reserva = new reserva($reserva_id, $new_data_incial, $new_data_final, 
                          $new_hora_inicio, $new_hora_finaliza, $new_curso_id, $new_sala_id);

  // Create a reservaDAO instance
  $dao = new reservaDAO();

  try {
    // Call update function to update the reservation
    if ($dao->update($reserva)) {
      echo "Reserva atualizada com sucesso!";
    } else {
      echo "Erro ao atualizar reserva.";
    }
  } catch (PDOException $e) {
    // Handle database-related errors
    echo "Erro ao atualizar reserva: " . $e->getMessage();
  } catch (Exception $e) {
    // Handle general exceptions
    echo "Erro inesperado: " . $e->getMessage();
  }
} else {
  echo "Erro: requisição inválida.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status da Reserva</title>
</head>
<body>
  <button><a href="index.php">Voltar para a página inicial</a></button>
</body>
</html>
