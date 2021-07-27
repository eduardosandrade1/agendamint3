-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: estacionamint
-- ------------------------------------------------------
-- Server version	5.6.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `responsavel` varchar(45) NOT NULL,
  `razao_social` varchar(45) NOT NULL COMMENT '-- REGRA --\n\nO MESMO USUÁRIO NÃO PODE MARCAR MAIS DE \nUM HORÁRIO POR DIA',
  `chave_pix` varchar(45) NOT NULL,
  `tipo_chave_pix` varchar(45) NOT NULL,
  `banco` varchar(45) NOT NULL,
  `cpf_cnpj` varchar(14) NOT NULL COMMENT 'máximo de 14',
  `cor_primaria` varchar(7) DEFAULT '031927' COMMENT 'HEXADECIMAL - AZUL\\\\n',
  `cor_secundaria` varchar(7) DEFAULT 'FFFFFF' COMMENT 'HEXADECIMAL - BRANCO',
  `cor_terciaria` varchar(7) DEFAULT 'E88233' COMMENT 'HEXADECIMAL - LARANJA\\\\n',
  `nova` tinyint(1) DEFAULT '0' COMMENT '0 = EMPRESA ja configurou o ambiente\\n1 = primeira configuração DA EMPRESA master',
  `email` varchar(45) CHARACTER SET big5 NOT NULL,
  `cod_empresa` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf_cnpj_UNIQUE` (`cpf_cnpj`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (2,'Eduardo','Responsável AgendaMint','13262255214','2','Banco do Brasil S.A.','46530022821','#270070','#ffffff','#000000',1,'teste7@teste.com.br','2612');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-27 12:01:44
