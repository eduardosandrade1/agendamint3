<?php

	class Agendamentos
	{
		public function getAll()
		{
			$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

			$sql = "SELECT * FROM agendamento";
			$sql = $con->prepare($sql);
			$sql->execute();

			$resultados = array();

			while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
				$resultados[] = $row;
			}

			if (!$resultados) {
				throw new Exception("Agendas não encontradas!");
			}
			
			return $resultados;
		}

		public function getByFuncionario($idFuncionario)
		{
			try {
				$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

				$sql = "SELECT * FROM agendamento WHERE funcionario_id = " . $idFuncionario;
				$sql = $con->prepare($sql);
				$sql->execute();

				$resultados = array();

				while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
					$resultados[] = $row;
				}

				if (!$resultados) {
					$resultados = [];
				}
			} catch (\Throwable $e) {
				return $e;
			}
			return $resultados;
		}

		public function agendar($idFuncionario, $idUsuario, $servico, $horario)
		{
			
		}

		public function getByCliente($idCliente)
		{
			try {
				$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

				$sql = "SELECT * FROM agendamento WHERE usuario_id = " . $idCliente;
				$sql = $con->prepare($sql);
				$sql->execute();

				$resultados = array();

				while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
					$resultados[] = $row;
				}

				if (!$resultados) {
					$resultados = [];
				}
			} catch (\Throwable $e) {
				return $e;
			}
			return $resultados;
		}
	}