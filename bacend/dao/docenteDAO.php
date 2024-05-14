<?php
require_once 'config/database.php';
require_once 'entity/docente.php';
require_once 'baseDAO.php';

class docenteDAO implements baseDAO {
    private $db;

    public function __construct() {
        $this->db = database::getInstance();
        
    }

    public function create ($docente){
        try{
            $sql = "INSERT INTO docente(nome, email) 
            VALUES (:nome, :email)";

            $stmt = $this->db->prepare($sql);

            $nome = $docente->getNomeDocente();
            $email = $docente->getEmail();

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);

            return $stmt->execute();
        } catch (PDOException $e){
            return false;
        }
    }

    


}


?>