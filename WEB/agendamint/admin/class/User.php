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

        public function getByCompany($idCompany)
        {
            $sql  = new Sql();
            return $sql->select("SELECT * FROM usuarios where empresa_id = ".$idCompany);
        }

        public function getById($id)
        {
            $sql  = new Sql();
            return $sql->select("SELECT * FROM usuarios where id = ".$id);
        }

        public function insert($params = array())
        {
            $sql = new Sql();
            $query = "INSERT INTO usuarios(nome,email, login, senha, empresa_id) VALUES (:nome,:email, :login, :senha, :empresa_id)";
            // var_dump($params);die;
            $cmd = $sql->insert($query, $params);
            return $cmd;
        }
    }
    