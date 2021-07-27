<?php

    class Funcionarios {
        public function getAll()
		{
			$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

			$sql = "SELECT * FROM funcionarios";
			$sql = $con->prepare($sql);
			$sql->execute();

			$resultados = array();

			while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
				$resultados[] = $row;
			}

			if (!$resultados) {
				throw new Exception("Nenhum usuário encontrado!");
			}
			
			return $resultados;
		}

        public function getById($id)
		{
			$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

			$sql = "SELECT * FROM funcionarios WHERE id = ".$id;
			$sql = $con->prepare($sql);
			$sql->execute();

			$resultados = array();

			while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
				$resultados[] = $row;
			}

			if (!$resultados) {
				throw new Exception("Nenhum usuário encontrado!");
			}
			
			return $resultados;
		}

		public function getByCompany($idCompany)
		{
			$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

			$sql = "SELECT * FROM funcionarios WHERE empresa_id = ".$idCompany;
			$sql = $con->prepare($sql);
			$sql->execute();

			$resultados = array();

			while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
				$resultados[] = $row;
			}

			if (!$resultados) {
				throw new Exception("Nenhum usuário encontrado!");
			}
			
			return $resultados;
		}
        
    }