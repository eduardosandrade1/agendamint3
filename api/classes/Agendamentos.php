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

		public function agendar($idFuncionario, $idUsuario, $horario, $servico)
		{
			try {
				$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

				$sql = "INSERT INTO agendamento VALUES (null, $idUsuario, $idFuncionario, '$horario', $servico)";

				$sql = $con->prepare($sql);
				$sql->execute();
				if($sql){
					$result = true;
				}else{
					$result = false;
				}
			} catch (\Throwable $e) {
				return $e;
			}
			return $result;
		}

		public function getByCliente($idCliente)
		{
			try {
				$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

				$sql = "SELECT 	usuario_id,
								funcionario_id,
								data_marcada,
								servicos.descricao as nome_servico,
								servicos.valor as valor_servico	
								FROM agendamento 
								INNER JOIN servicos on servicos.id = agendamento.servico_id
								WHERE usuario_id = ". $idCliente;
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