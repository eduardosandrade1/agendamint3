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
-- Table `estacionamint`.`nivel_acesso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`nivel_acesso` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `estacionamint`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `estacionamint`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`empresa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `responsavel` VARCHAR(45) NOT NULL,
  `razao_social` VARCHAR(45) NOT NULL COMMENT '-- REGRA --\n\nO MESMO USUÁRIO NÃO PODE MARCAR MAIS DE \nUM HORÁRIO POR DIA',
  `chave_pix` VARCHAR(45) NOT NULL,
  `tipo_chave_pix` VARCHAR(45) NOT NULL,
  `banco` VARCHAR(15) NOT NULL,
  `cpf_cnpj` VARCHAR(14) NOT NULL COMMENT 'máximo de 14',
  `cor_primaria` VARCHAR(6) NOT NULL DEFAULT '031927' COMMENT 'HEXADECIMAL - AZUL\n',
  `cor_secundaria` VARCHAR(6) NOT NULL DEFAULT 'FFFFFF' COMMENT 'HEXADECIMAL - BRANCO',
  `cor_terciaria` VARCHAR(6) NOT NULL DEFAULT 'E88233' COMMENT 'HEXADECIMAL - LARANJA\n',
  `nova` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0 = EMPRESA ja configurou o ambiente\n1 = primeira configuração DA EMPRESA master',
  `email` VARCHAR(45) CHARACTER SET 'big5' NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_cnpj_UNIQUE` (`cpf_cnpj` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estacionamint`.`funcionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`funcionarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `empresa_id` INT NOT NULL,
  `nivel_acesso_id` INT(11) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_funcionarios_empresa1_idx` (`empresa_id` ASC),
  INDEX `fk_funcionarios_nivel_acesso1_idx` (`nivel_acesso_id` ASC),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  CONSTRAINT `fk_funcionarios_empresa1`
    FOREIGN KEY (`empresa_id`)
    REFERENCES `estacionamint`.`empresa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionarios_nivel_acesso1`
    FOREIGN KEY (`nivel_acesso_id`)
    REFERENCES `estacionamint`.`nivel_acesso` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estacionamint`.`agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`agendamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuarios_id` INT(11) NOT NULL,
  `funcionarios_id` INT NOT NULL,
  `data_marcada` DATE NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_agendamento_usuarios1_idx` (`usuarios_id` ASC),
  INDEX `fk_agendamento_funcionarios1_idx` (`funcionarios_id` ASC),
  UNIQUE INDEX `data_marcada_UNIQUE` (`data_marcada` ASC),
  CONSTRAINT `fk_agendamento_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `estacionamint`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agendamento_funcionarios1`
    FOREIGN KEY (`funcionarios_id`)
    REFERENCES `estacionamint`.`funcionarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estacionamint`.`forma_pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`forma_pagamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estacionamint`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`pedidos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `agendamento_id` INT NOT NULL,
  `forma_pagamento_id` INT NOT NULL,
  `situacao` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0 = não pago\n1 = pago',
  PRIMARY KEY (`id`),
  INDEX `fk_pedidos_agendamento1_idx` (`agendamento_id` ASC),
  INDEX `fk_pedidos_forma_pagamento1_idx` (`forma_pagamento_id` ASC),
  CONSTRAINT `fk_pedidos_agendamento1`
    FOREIGN KEY (`agendamento_id`)
    REFERENCES `estacionamint`.`agendamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_forma_pagamento1`
    FOREIGN KEY (`forma_pagamento_id`)
    REFERENCES `estacionamint`.`forma_pagamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estacionamint`.`servicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`servicos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `empresa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_servicos_empresa1_idx` (`empresa_id` ASC),
  CONSTRAINT `fk_servicos_empresa1`
    FOREIGN KEY (`empresa_id`)
    REFERENCES `estacionamint`.`empresa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estacionamint`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estacionamint`.`administrador` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
