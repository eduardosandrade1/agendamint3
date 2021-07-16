<?php

    class Agendamento
    {
        public function insert($idCli, $params = array())
        {
            $sql = new Sql();
            $query = "INSERT INTO agendamento VALUES (null, ".$idCli.", :funcionario_id, :data_marcada, :servico_id)";
            $cmd = $sql->insert($query,$params);
            return $cmd;
        }

        public function getByFuncionario($idFuncionario)
        {
            $sql    = new Sql();
            $query  = "SELECT * FROM agendamento WHERE funcionario_id = ".$idFuncionario;
            $cmd    = $sql->select($query);
            return $cmd;
        }
    }
    