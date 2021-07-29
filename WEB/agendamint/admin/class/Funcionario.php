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
         * @return array 
         */
        public function getSpecificFuncionario($user, $senha_)
        {
            $sql  = new Sql();
            $funcionarioLogin = $sql->select("SELECT * FROM funcionarios where login = :login and senha = :senha", array(':login' => $user, ':senha' => $senha_));
            // PEGA FUNCIONARIOS DE EMPRESAS ATIVAS/CONFIGURADAS
            var_dump($funcionarioLogin);die;
            if(count($funcionarioLogin) > 0){
                $empresa        = new Empresa();
                $statusEmpresa  = $empresa->getById($funcionarioLogin[0]['empresa_id']);
                // var_dump($funcionarioLogin[0]['nivel_acesso_id']);die;
                // se for um
                if(($statusEmpresa[0]['nova'] == NEW_COMPANY && $funcionarioLogin[0]['nivel_acesso_id'] == USER_MASTER) || ($funcionarioLogin[0]['nivel_acesso_id'] == USER_FUNCIONARIO && $statusEmpresa[0]['nova'] == NEW_COMPANY) ){
                    return $funcionarioLogin;
                }
            }
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
    