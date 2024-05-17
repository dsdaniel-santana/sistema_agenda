<?php
require_once 'backend/config/database.php';
require_once 'backend/entity/reserva.php';
require_once 'baseDAO.php';

class reservaDAO implements BaseDAO
{
  private $db;

  public function __construct()
  {
    $this->db = database::getInstance();
  }

  public function getById($id)
  {
    try {
      $sql = "SELECT *FROM reserva WHERE Id= :id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($result) {
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
    } catch (PDOException $e) {
      return null;
    }
  }

  //   public function getById($id){
  //     try{
  //         $sql = "SELECT * FROM reserva WHERE Id= :id"; 

  //         $stmt = $this->db->prepare($sql);

  //         $stmt->execute();

  //         $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);


  //         return array_map(function ($reserva) {
  //             return new reserva(
  //               $result['id'],
  //                        $result['data_incial'],
  //                        $result['data_final'],
  //                        $result['hora_inicio'],
  //                        $result['hora_finaliza'],
  //                        $result['curso_id'],
  //                        $result['sala_id']
  //             );
  //         }, $reservas); 
  //     } catch (PDOException $e) {
  //         return [ ];
  //     }
  // }






  public function getAll()
  {
    try {
      $sql = "SELECT * FROM reserva";

      $stmt = $this->db->prepare($sql);

      $stmt->execute();

      $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

      echo "<pre>";
      print_r($reservas);
      echo "</pre>";

      return array_map(function ($reserva) {
        return new reserva(
          $reserva['id'],
          $reserva['data_incial'],
          $reserva['data_final'],
          $reserva['hora_inicio'],
          $reserva['hora_finaliza'],
          $reserva['curso_id'],
          $reserva['sala_id']
        );
      }, $reservas);
    } catch (PDOException $e) {
      return [];
    }
  }



  public function create($reserva)
  {
    try {
      $sql = "INSERT INTO reserva (data_incial, data_final, hora_inicio, hora_finaliza, curso_id, sala_id) 
      VALUES (:data_incial, :data_final, :hora_inicio, :hora_finaliza, :curso_id, :sala_id)";

      $stmt = $this->db->prepare($sql);

      $data_incial = $reserva->getDataIncial();
      $data_final = $reserva->getDataFinal();
      $hora_inicio = $reserva->getHoraInicio();
      $hora_finaliza = $reserva->getHoraFinaliza();
      $curso_id = $reserva->getCursoId();
      $sala_id = $reserva->getSalaId();

      $stmt->bindParam(":data_incial", $data_incial);
      $stmt->bindParam(":data_final", $data_final);
      $stmt->bindParam(":hora_inicio", $hora_inicio);
      $stmt->bindParam(":hora_finaliza", $hora_finaliza);
      $stmt->bindParam(":curso_id", $curso_id);
      $stmt->bindParam(":sala_id", $sala_id);

      return $stmt->execute();
    } catch (PDOException $e) {
      return false;
    }
  }



  public function update($reserva) {
    try {
        $sql = "UPDATE reserva 
                SET DataInicial = :data_incial, DataInicial = :data_final, HoraInicio = :hora_inicio, 
                    HoraTermina = :hora_finaliza, IdCurso = :curso_id, IdSala = :sala_id 
                     
                WHERE Id = :id";
        $stmt = $this->db->prepare($sql);
        $id = $reserva->getId();
        $data_incial = $reserva->getDataIncial();
        $data_final = $reserva->getDataFinal();
        $hora_inicio = $reserva->getHoraInicio();
        $hora_finaliza = $reserva->getHoraFinaliza();
        $curso_id = $reserva->getCursoId();
        $sala_id = $reserva->getSalaId();

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $data_incial);
        $stmt->bindParam(':descricao', $data_final);
        $stmt->bindParam(':dataCriacao', $hora_inicio);
        $stmt->bindParam(':dataAtualizacao', $hora_finaliza);
        $stmt->bindParam(':usuarioAtualizacao', $curso_id);
        $stmt->bindParam(':ativo', $sala_id);

        return $stmt->execute();
    } catch (PDOException $e) {
        // Handle exception (e.g., log error)
        return false;
    }
  }
}
