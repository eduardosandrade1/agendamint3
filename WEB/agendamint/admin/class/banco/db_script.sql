-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema estacionamint
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema estacionamint
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `estacionamint` DEFAULT CHARACTER SET latin1 ;
USE `estacionamint` ;

-- -----------------------------------------------------
-- Table `estacionamint`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`administrador` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `estacionamint`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`empresa` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `responsavel` VARCHAR(45) NOT NULL,
  `razao_social` VARCHAR(45) NOT NULL COMMENT '-- REGRA --\\n\\nO MESMO USUÁRIO NÃO PODE MARCAR MAIS DE \\nUM HORÁRIO POR DIA',
  `chave_pix` VARCHAR(45) NOT NULL,
  `tipo_chave_pix` VARCHAR(45) NOT NULL,
  `banco` VARCHAR(45) NOT NULL,
  `cpf_cnpj` VARCHAR(14) NOT NULL COMMENT 'máximo de 14',
  `cor_primaria` VARCHAR(7) NULL DEFAULT '031927' COMMENT 'HEXADECIMAL - AZUL\\\\\\\\n',
  `cor_secundaria` VARCHAR(7) NULL DEFAULT 'FFFFFF' COMMENT 'HEXADECIMAL - BRANCO',
  `cor_terciaria` VARCHAR(7) NULL DEFAULT 'E88233' COMMENT 'HEXADECIMAL - LARANJA\\\\\\\\n',
  `nova` TINYINT(1) NULL DEFAULT '0' COMMENT '0 = EMPRESA ja configurou o ambiente\\\\n1 = primeira configuração DA EMPRESA master',
  `email` VARCHAR(45) CHARACTER SET 'big5' NOT NULL,
  `cod_empresa` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_cnpj_UNIQUE` (`cpf_cnpj` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `estacionamint`.`nivel_acesso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`nivel_acesso` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `estacionamint`.`funcionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`funcionarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` INT(11) NOT NULL,
  `nivel_acesso_id` INT(11) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  INDEX `fk_funcionarios_empresa1_idx` (`empresa_id` ASC) VISIBLE,
  INDEX `fk_funcionarios_nivel_acesso1_idx` (`nivel_acesso_id` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `estacionamint`.`servicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`servicos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `empresa_id` INT(11) NOT NULL,
  `valor` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_servicos_empresa1_idx` (`empresa_id` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `estacionamint`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `nivel_acesso` INT(11) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  INDEX `fk_nivel_acesso_id_idx` (`nivel_acesso` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 32
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `estacionamint`.`agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`agendamento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` INT(11) NOT NULL,
  `funcionario_id` INT(11) NOT NULL,
  `data_marcada` DATETIME NOT NULL,
  `servico_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `data_marcada_UNIQUE` (`data_marcada` ASC) VISIBLE,
  INDEX `fk_agendamento_usuarios1_idx` (`usuario_id` ASC) VISIBLE,
  INDEX `fk_agendamento_funcionarios1_idx` (`funcionario_id` ASC) VISIBLE,
  INDEX `fk_agendamento_servico1_idx` (`servico_id` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 22
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `estacionamint`.`forma_pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`forma_pagamento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `estacionamint`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`pedidos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `agendamento_id` INT(11) NOT NULL,
  `forma_pagamento_id` INT(11) NOT NULL,
  `situacao` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0 = não pago\\n1 = pago',
  PRIMARY KEY (`id`),
  INDEX `fk_pedidos_agendamento1_idx` (`agendamento_id` ASC) VISIBLE,
  INDEX `fk_pedidos_forma_pagamento1_idx` (`forma_pagamento_id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
