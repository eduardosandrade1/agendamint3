<?php

	class Agendamentos
	{
		public function mostrarTodos()
		{
			$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

			$sql = "SELECT * FROM agendamentos ORDER BY id ASC";
			$sql = $con->prepare($sql);
			$sql->execute();

			$resultados = array();

			while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
				$resultados[] = $row;
			}

			if (!$resultados) {
				throw new Exception("testeteset!");
			}
			
			return $resultados;
		}
	}