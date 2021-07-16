<?php
    
    class NivelUser 
    {
        private $listaNivel;

        // atribuindo valor
        public function setNivel($newNivel){
            $this->listaNivel = $newNivel;
        }

        public function getNivel(){
            return $this->$listaNivel;
        }

        public function getAll(){
            $sql = new Sql();
            return $sql->select("SELECT * FROM nivel_acesso");
        }
    }
    