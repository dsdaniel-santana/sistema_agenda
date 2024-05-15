<?php

class reservaDAO implements BaseDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

function createReserva($data_incial, $hora_inicio, $hora_finaliza, $curso_id, $sala_id, $conn) {
    $sql = "INSERT INTO reserva (data_incial, data_final, hora_inicio, hora_finaliza, curso_id, sala_id) VALUES (:data_incial, CURRENT_TIMESTAMP, :hora_inicio, :hora_finaliza, :curso_id, :sala_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":data_incial", $data_incial, PDO::PARAM_STR);
    $stmt->bindParam(":hora_inicio", $hora_inicio, PDO::PARAM_STR);
    $stmt->bindParam(":hora_finaliza", $hora_finaliza, PDO::PARAM_STR);
    $stmt->bindParam(":curso_id", $curso_id, PDO::PARAM_INT);
    $stmt->bindParam(":sala_id", $sala_id, PDO::PARAM_INT);
  
    if ($stmt->execute()) {
      echo "Reserva criada com sucesso! <br>";
    } else {
      echo "Erro ao criar reserva: " . $stmt->errorCode();
    }
  }

  function getReservas($conn) {
    $sql = "SELECT * FROM reserva";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
    return $reservas;
  }
  
  // Example usage:
  $reservas = getReservas($conn);
  
  foreach ($reservas as $reserva) {
    echo "ID: " . $reserva['id'] . "<br>";
    echo "Data Inicial: " . $reserva['data_incial'] . "<br>";
    echo "... (display other reservation details) <br>";
  }

  function updateReserva($id, $data_incial, $hora_inicio, $hora_finaliza, $curso_id, $sala_id, $conn) {
    // 1. Prepare the SQL UPDATE statement
    $sql = "UPDATE reserva SET
              data_incial = :data_incial,
              hora_inicio = :hora_inicio,
              hora_finaliza = :hora_finaliza,
              curso_id = :curso_id,
              sala_id = :sala_id
            WHERE id = :id";
  
    // 2. Prepare the PDOStatement object
    $stmt = $conn->prepare($sql);
  
    // 3. Bind the parameters to the prepared statement
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":data_incial", $data_incial, PDO::PARAM_STR);
    $stmt->bindParam(":hora_inicio", $hora_inicio, PDO::PARAM_STR);
    $stmt->bindParam(":hora_finaliza", $hora_finaliza, PDO::PARAM_STR);
    $stmt->bindParam(":curso_id", $curso_id, PDO::PARAM_INT);
    $stmt->bindParam(":sala_id", $sala_id, PDO::PARAM_INT);
  
    // 4. Execute the prepared statement
    if ($stmt->execute()) {
      // Update was successful
      echo "Reserva atualizada com sucesso! <br>";
    } else {
      // Update failed
      echo "Erro ao atualizar reserva: " . $stmt->errorCode();
    }
  }

  function deleteReserva($id, $conn) {
    $sql = "DELETE FROM reserva WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
  
    if ($stmt->execute()) {
      echo "Reserva deletada com sucesso! <br>";
    } else {
      echo "Erro ao deletar reserva: " . $stmt->errorCode();
    }
  }
  
  // Example usage:
  $id = 1; // Replace with the actual reservation ID
  
  deleteReserva($id, $conn);

?>