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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_nivel_acesso_id_idx` (`empresa_id`),
  CONSTRAINT `fk_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Eduardo da Silva Andrade','edu@master.com','3fa6e1540a9e5b94313c5907267a7331',2,'eduardo.cliente'),(2,'EDU TESTE API 2','tst@mail.com','3fa6e1540a9e5b94313c5907267a7331',2,'TST.cliente'),(3,'Fun teste','funciona@agendamint.com','3fa6e1540a9e5b94313c5907267a7331',2,'funcionario.comum'),(6,'Julia Vieira Amado Dias','ju@mail.com','3fa6e1540a9e5b94313c5907267a7331',2,'ju.vadias'),(9,'Eduardo da Silva Andrade','edu@mail.com','3fa6e1540a9e5b94313c5907267a7331',2,'edu.user'),(10,'RogÃ©rio','roger@mail.com','3fa6e1540a9e5b94313c5907267a7331',2,'roger.cliente'),(11,'RogÃ©rio Santos','roger2@mail.com','3fa6e1540a9e5b94313c5907267a7331',2,'roger.cliente2'),(12,'Eduardo da Silva Andrade','eduardo@cliente.com.br','3fa6e1540a9e5b94313c5907267a7331',2,'edu.cliente'),(14,'Eduardo da Silva Andrade','eduardoteste@mail.com','3fa6e1540a9e5b94313c5907267a7331',2,'teste.testes'),(15,'tsetesstete','testetesettes','3fa6e1540a9e5b94313c5907267a7331',2,'tessteettes'),(16,'Eduardo da Silva Andrade','dudu@mail.com','3fa6e1540a9e5b94313c5907267a7331',2,'dudu.teste'),(17,'agora foi','agora@foi.com','3fa6e1540a9e5b94313c5907267a7331',2,'agora.foi'),(18,'Eduardo da Silva Andrade','testse','3fa6e1540a9e5b94313c5907267a7331',2,'setset'),(24,'sdasda','sdasdasda','3fa6e1540a9e5b94313c5907267a7331',2,'sdasda'),(25,'Eduardo da Silva Andrade','eduardo.sandrade1','3fa6e1540a9e5b94313c5907267a7331',2,'eduardo.sandrade1'),(26,'sadfdfdfd','sfdadfsdsfafd','3fa6e1540a9e5b94313c5907267a7331',2,'fdsafaddffdsa'),(28,'Mario de Carmo','mario123@mail.com','3fa6e1540a9e5b94313c5907267a7331',2,'mario123'),(29,'teste','testestestes','3fa6e1540a9e5b94313c5907267a7331',2,'ju.test'),(30,'Dante barbeiro','dante@barber.com','3fa6e1540a9e5b94313c5907267a7331',2,'date.barbeiro'),(31,'ANA VITÃ“RIA','ana@mail.com','3fa6e1540a9e5b94313c5907267a7331',2,'aninha.teste');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-27 12:01:45
