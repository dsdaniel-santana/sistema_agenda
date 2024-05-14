<?php

class docente{
    private $id;
    private $nomeDocente;
    private $email;

        //metodo construtor
        public function __construct($id, $nomeDocente, $email) {
            $this->id = $id;
            $this->nomeDocente = $nomeDocente;
            $this->email = $email;

        }

        //getters 
        public function getId(){
            return $this->id;
        }

        public function getNomeDocente(){
            return $this->nomeDocente;
        }

        public function getEmail(){
            return $this->email;
        }

        public function __toString() {
            return "ID: $this->id, Nome: $this->nomeDocente, Email: $this->email";
            
        }

    }

?>