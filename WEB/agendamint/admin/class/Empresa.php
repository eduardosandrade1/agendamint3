<?php

    class Empresa
    {

        public function getById($id)
        {
            $sql    = new Sql();
            $query  = "SELECT * FROM empresa WHERE id = ".$id;
            return $sql->select($query);
        }

        /**
         * Empresa preenchendo dados iniciais
         *
         * @param $_SESSION $idEmpresa
         * @param array $params
         * @return array
         */
        public function update($idEmpresa, $params = array())
        {
            $sql = new Sql();
            $query = "UPDATE empresa SET chave_pix = :chave_pix, tipo_chave_pix = :tipo_chave_pix, banco = :banco, cor_primaria = :cor_primaria, cor_secundaria= :cor_secundaria, cor_terciaria = :cor_terciaria, email = :email, nova = :nova WHERE id = $idEmpresa";
            $cmd = $sql->insert($query, $params);
            // var_dump($cmd);die;
            return $cmd;
        }
    }
    