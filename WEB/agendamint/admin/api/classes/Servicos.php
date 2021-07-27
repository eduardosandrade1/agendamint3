<?php 

    class Servicos
    {
        /**
		 * Método que trás todos os usuários
		 *
		 * @return array
		 */
		public function getAll()
		{
			try {
				$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

				$sql = "SELECT * FROM servicos ORDER BY id ASC";
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


        public function getByEmpresa($idEmpresa)
        {
            try {
				$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

				$sql = "SELECT * FROM servicos WHERE empresa_id = ".$idEmpresa;
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