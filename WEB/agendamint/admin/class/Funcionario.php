<?php
    class Funcionario
    {
        private $empresa_id;

        public function setEmpresaId($id)
        {
            $this->empresa_id = $id;
        }

        public function getEmpresaId()
        {
            return $this->empresa_id;
        }
        /**
         * RETORNA UM FUNCIONÁRIO ESPECÍFICO
         * @return BOOL 
         */
        public function getSpecificFuncionario($user, $senha_)
        {
            $sql  = new Sql();
            return $sql->select("SELECT * FROM funcionarios where login = :login and senha = :senha", array(':login' => $user, ':senha' => $senha_));
        }

        public function getAll()
        {
            $sql = new Sql();
            return $sql->select("SELECT * FROM funcionarios WHERE empresa_id = ".$this->getEmpresaId());
        }

        /**
         * Insere novo usuário de uma determinada empresa
         */
        public function insert($params = array())
        {
            $sql    = new Sql();
            $query  = "INSERT funcionarios (empresa_id, nivel_acesso_id, nome, cpf, login, senha, email) VALUES(:empresa_id, :nivel_acesso_id, :nome, :cpf, :login, md5(:senha), :email)";

            $cmd = $sql->insert($query, $params);
            return $cmd;
        }

    }
    