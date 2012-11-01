CREATE DATABASE  IF NOT EXISTS `cakevri` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cakevri`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: cakevri
-- ------------------------------------------------------
-- Server version	5.5.25a

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `rrc`
--

DROP TABLE IF EXISTS `rrc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rrc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `dataCriacao` datetime DEFAULT NULL,
  `produto` varchar(100) DEFAULT NULL,
  `quantidadeReprovado` int(11) DEFAULT NULL,
  `contato` varchar(100) DEFAULT NULL,
  `quantidadeRecebido` int(11) DEFAULT NULL,
  `documentoOrigem` varchar(100) DEFAULT NULL,
  `numeroDeLote` varchar(50) DEFAULT NULL,
  `placa` varchar(50) DEFAULT NULL,
  `descricao` text,
  `relatorio` text,
  `anexo` varchar(300) DEFAULT NULL,
  `setorOuEmpresa` varchar(100) DEFAULT NULL,
  `rnc_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rrc`
--

LOCK TABLES `rrc` WRITE;
/*!40000 ALTER TABLE `rrc` DISABLE KEYS */;
INSERT INTO `rrc` VALUES (3,4,'2012-09-19 15:28:00','jv0235',2,'joaquim',100,'doc origem','nlote123','jv tambem','Problema','aqui não o relatório porra','anexos/3/dnl.rar','comercial',1),(4,5,'2012-10-04 20:47:27','jv123',10,'Ninguem',80,'nf','123456','nao precisa','deu pau em tudo','asdsad',NULL,'ti',2),(5,5,'2012-10-04 20:54:32','',NULL,'',NULL,'','','','sdfsadfsdf sdf sf','','','as fsa df sadfsad f',3),(6,5,'2012-10-05 10:23:33','as dasda',1212312,'a sda sd',12312,'a da das d','a da sdas da',' ad asd asd',' sd ad as',' asda',NULL,'a sd asd',5),(7,7,'2012-10-17 22:47:20','',NULL,'',NULL,'','','','sdfsdfsdf','','anexos/7/IMG_16102012_171716.png','sdfsdf',4),(9,5,'2012-10-19 21:08:53','',NULL,'',NULL,'','','','as das das d','','anexos/9/12142_7.pdf','as da sdda',NULL),(10,7,'2012-10-25 22:20:22','',NULL,'',NULL,'','','','Erro ','','anexos/10/iunidanfe3.3.19 release.exe','rh',NULL);
/*!40000 ALTER TABLE `rrc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `nomeContato` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `departamento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (4,'administrador','123','','admin','','admin@admin.com','admin','0ded05ab489a7d799dda45ffb1300a0d05099065','interno','admin'),(5,'Douglas','456','','eu','','nassifrroma@gmail.com','douglas','0b811a687b5c8878398a135bd7ee614f12b874c8','interno','admin'),(6,'Maiara','num tem aqui é CPF','cm','ela mema','da oi','maiara@maiara.com','maiara','0ded05ab489a7d799dda45ffb1300a0d05099065','interno','na justiça'),(7,'fabio','asdasd','','asdasd','','asdasd@asdasd.com','fabio','e4f867744ed07400f5a9586417d9812a0a3d1072','externo','asdasdasd'),(8,'teste','teste','','teste','','teste@teste.com','teste','e4f867744ed07400f5a9586417d9812a0a3d1072','interno','teste'),(9,'Alessandro','38340691830','','','','teste@teste.com','kraemer','0ded05ab489a7d799dda45ffb1300a0d05099065','interno','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-10-31  8:19:44
