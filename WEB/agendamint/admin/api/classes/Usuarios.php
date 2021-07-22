<?php

	class Usuarios
	{
		public function getAll()
		{
			$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

			$sql = "SELECT * FROM usuarios ORDER BY id ASC";
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

			$sql = "SELECT * FROM usuarios WHERE id = ".$id;
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

		/**
		 * Método que retorna o login do cliente
		 *
		 * @param string $login
		 * @param string $senha
		 * @return array
		 */
		public function login($login, $senha)
		{
			$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

			$sql = "SELECT * FROM usuarios WHERE login = '".$login."' AND senha = md5(".$senha.")" ;
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