<?php
    // incluindo as configurações globais do projeto
    include '../constants.php';

    class Sql
    {
        private $connection;
        public function __construct() {
            $this->connection = new PDO("mysql:dbname=". NOME_BANCO .";host=". IP_SERVER_DB .":". PORT_MYSQL_SERVE, USER_DB, PASS_DB);
        }
        # chama a função simples de atribuir valores e atribui a query a quantidade de vezes passada dentro do array
        public function setParams($comando, $parametros = array())
        {
            foreach($parametros as $key => $value){
                $this->setParam($comando, $key, $value);
            }   
        }
        # Função que básicamente atribui a query indicada uma chave e um valor
        public function setParam($cmd, $key, $value)
        {
            // bindParam só recebe valores referenciados ($var, consts ou valores retornados de Functions), não aceita direto
            $cmd->bindParam($key, $value);
        }
        
        public function query($querySql, $param = array())
        {
            # prepara a query 
            $cmd = $this->connection->prepare($querySql);
            # atribui os parametros passados a query
            $this->setParams($cmd, $param);
            # retorna a execução da query
            $cmd->execute();
            return $cmd;
        }

        public function select($querySql, $params = array())
        {
            $cmd = $this->query($querySql, $params);
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert($querySql, $param = array())
        {
            $cmd = $this->query($querySql, $param);
            return $cmd;
        }
    }
?>