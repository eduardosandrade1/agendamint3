<?php

    class Empresa
    {

        public function getById($id)
        {
            $sql    = new Sql();
            $query  = "SELECT * FROM empresa WHERE id = ".$id;
            return $sql->select($query);
        }
    }
    