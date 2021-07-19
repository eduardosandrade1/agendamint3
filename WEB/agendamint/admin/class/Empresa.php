<?php

    class Empresa
    {

        public function getById($id)
        {
            $sql    = new Sql();
            $query  = "SELECT * FROM empresa WHERE id = ".$id;
            return $sql->select($query);
        }

        public function update($id, $_nome)
        {
            $query = "UPDATE empresa SET nome = ".$_nome." WHERE ";
        }
    }
    