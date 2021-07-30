<?php

    class Empresas
    {
        public function getById($idCompany)
        {
            try {
				$con = new PDO('mysql: host=locahost; dbname=estacionamint;','root','usbw');

				$sql = "SELECT * FROM empresa WHERE id = ".$idCompany;
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
                // var_dump($resultados);die;
			return $resultados;
        }
    }