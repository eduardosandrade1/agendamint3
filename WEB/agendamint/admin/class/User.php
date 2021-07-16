<?php

    class User
    {
        private $nome;
        private $usuario;
        private $senha;

        public function getUser()
        {
            return $this->usuario;
        }
        public function getAll()
        {
            $sql = new Sql();
            return $sql->select("SELECT * FROM usuarios");
        }

        public function getSpecificUser($user, $senha)
        {
            $sql  = new Sql();
            return $sql->select("SELECT * FROM usuarios where login = :login and senha = :senha", array(':login' => $user, ':senha' => $senha));
        }

        public function getById($id)
        {
            $sql  = new Sql();
            return $sql->select("SELECT * FROM usuarios where id = ".$id);
        }

        public function insert($params = array())
        {
            $sql = new Sql();
            $query = "INSERT INTO usuarios(nome,email, login, senha, nivel_acesso) VALUES (:nome,:email, :login, :senha, :nivel_acesso)";
            // var_dump($params);die;
            $cmd = $sql->insert($query, $params);
            return $cmd;
        }

        /**
         * Método que insere um cliente relacionado com agendamento relacionado ao funcionário logado
         *
         * @param array $paramsCli
         * @param array $paramsScheduling
         * @return array
         */
        public function insertWithScheduling($paramsCli = array(), $paramsScheduling = array())
        {
            $sql = new Sql();
            $query = "INSERT INTO usuarios(nome,email, login, senha, nivel_acesso) VALUES (:nome,:email, :login, :senha, :nivel_acesso)";
            // var_dump($params);die;
            $idCli = $sql->insertGetId($query, $paramsCli);

            $agenda = new Agendamento();
            // var_dump($query);die;
            $cmd = $agenda->insert($idCli, $paramsScheduling);
            return $cmd;
        }
    }
    