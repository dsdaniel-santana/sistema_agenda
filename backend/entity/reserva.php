<?php
class reserva{
    private $id;
    private $data_incial;
    private $data_final;
    private $hora_inicio;
    private $hora_finaliza;
    private $curso_id;
    private $sala_id;
    private $reservas;
    
    public function __construct($id, $data_incial, $data_final, $hora_inicio, $hora_finaliza, $curso_id, $sala_id, $reservas){
        $this->id = $id;
        $this->data_incial = $data_incial; 
        $this->data_final = $data_final; 
        $this->hora_inicio = $hora_inicio; 
        $this->hora_finaliza = $hora_finaliza; 
        $this->curso_id = $curso_id; 
        $this->sala_id = $sala_id;
        $this->reservas = $reservas;
    }

    public function getId(){
        return $this->id;
    }

    public function getDataIncial(){
        return $this->data_incial;
    }

    public function getDataFinal(){
        return $this->data_final;
    }

    public function getHoraInicio(){
        return $this->hora_inicio;
    }

    public function getHoraFinzaliza(){
        return $this->hora_finaliza;
    }

    public function getCursoId(){
        return $this->curso_id;
    }

    public function getSalaId(){
        return $this->sala_id;
    }

    public function getReservas(){
        return $this->reservas;
    }


    public function __toString() {
        return "ID: $this->id, $this->data_incial, $this->data_final, $this->hora_inicio, $this->hora_finaliza, $this->curso_id, $this->sala_id";
    }
     
}

?>