<?php

    class Servico
    {
        /**
         * Mátodo que pega o serviço do funcionário da empresa logada
         *
         * @param int $idCompany
         * @return array
         */
        public function getByCompany($idCompany)
        {
            $sql    = new Sql();
            $query  = "SELECT * FROM servicos WHERE empresa_id = ".$idCompany;
            $cmd    = $sql->select($query);
            return $cmd;
        }

        public function getById($id)
        {
            $sql    = new Sql();
            $query  = "SELECT * FROM servicos WHERE id = ".$id;
            return $sql->select($query);
        }

        public function insert($params = array())
        {
            $sql = new Sql();
            $query = "INSERT servicos VALUES (null, :descricao, :empresa_id, :valor)";
            $cmd = $sql->insert($query, $params);
            return $cmd;
        }
    }
    