<?php
require_once 'backend/config/database.php';
require_once 'backend/entity/reserva.php';
require_once 'baseDAO.php';

class reservaDAO implements BaseDAO {
  private $db;

  public function __construct(){
    $this->db = database::getInstance();
  }

  public function getById($id){
    try {
      $sql = "SELECT *FROM reserva WHERE Id= :id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      if($result){
        return new reserva(
          $result['id'],
          $result['data_incial'],
          $result['data_final'],
          $result['hora_inicio'],
          $result['hora_finaliza'],
          $result['curso_id'],
          $result['sala_id']
        );
      }
      return null;
    }catch (PDOException $e){
      return null;
    }
  }

  public function getAll(){
    try {
      $sql = "SELECT *FROM reserva WHERE";
      $stmt = $this->db->prepare($sql);
      $grupos = [];

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $grupos = new reserva( 
              null,
              $row['data_incial'],
              $row['data_final'],
              $row['hora_inicio'],
              $row['hora_finaliza'],
              $row['curso_id'],
              $row['sala_id']
            );
      }

      return $grupos;
    }catch (PDOException $e){
      return [];
    }
  }


  public function create($reserva) {
    try {
      $sql = "INSERT INTO reserva (data_incial, data_final, hora_inicio, hora_finaliza, curso_id, sala_id) 
      VALUES (:data_incial, :data_final, CURRENT_TIMESTAMP, :hora_inicio, :hora_finaliza, :curso_id, :sala_id)";
      
      $stmt = $this->db->prepare($sql);
      
      $data_incial = $reserva-> getDataIncial();
      $data_final = $reserva-> getDataFinal();
      $hora_inicio = $reserva-> getHoraInicio();
      $hora_finaliza = $reserva-> getHoraFinaliza();
      $curso_id = $reserva-> getCursoId();
      $sala_id = $reserva-> getSalaId();
      
      $stmt->bindParam(":data_incial", $data_incial);
      $stmt->bindParam(":data_final", $data_final);
      $stmt->bindParam(":hora_inicio", $hora_inicio);
      $stmt->bindParam(":hora_finaliza", $hora_finaliza);
      $stmt->bindParam(":curso_id", $curso_id);
      $stmt->bindParam(":sala_id", $sala_id);

      return $stmt->execute();
    } catch (PDOException $e){
      return false;
  }
    
  }
}

?>