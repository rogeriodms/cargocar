CREATE SCHEMA `cargocar`;

CREATE TABLE `cargocar`.`moto` (
  `idmoto` INT NOT NULL,
  `volume` VARCHAR(45) NOT NULL,
  `km` VARCHAR(45) NOT NULL,
  `base` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idmoto`));
  
CREATE TABLE `cargocar`.`carro` (
  `idcarro` INT NOT NULL,
  `volume` VARCHAR(45) NOT NULL,
  `km` VARCHAR(45) NOT NULL,
  `base` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcarro`));
  
  CREATE TABLE `cargocar`.`pickup` (
  `idpickup` INT NOT NULL,
  `volume` VARCHAR(45) NOT NULL,
  `km` VARCHAR(45) NOT NULL,
  `base` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idpickup`));
  
  CREATE TABLE `cargocar`.`van` (
  `idvan` INT NOT NULL,
  `volume` VARCHAR(45) NOT NULL,
  `km` VARCHAR(45) NOT NULL,
  `base` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idvan`));
  
 CREATE TABLE `cargocar`.`truck` (
  `idtruck` INT NOT NULL,
  `volume` VARCHAR(45) NOT NULL,
  `km` VARCHAR(45) NOT NULL,
  `base` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtruck`));
  
  CREATE TABLE `cargocar`.`valorfrete` (
  `idvalor` INT NOT NULL,
  `valor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idvalor`));
  
INSERT INTO `cargocar`.`carro` (`idcarro`, `volume`, `km`, `base`) VALUES ('0', '0', '0', '0');
INSERT INTO `cargocar`.`moto` (`idmoto`, `volume`, `km`, `base`) VALUES ('0', '0', '0', '0');
INSERT INTO `cargocar`.`pickup` (`idpickup`, `volume`, `km`, `base`) VALUES ('0', '0', '30', '0');
INSERT INTO `cargocar`.`van` (`idvan`, `volume`, `km`, `base`) VALUES ('0', '0', '0', '0');
INSERT INTO `cargocar`.`truck` (`idtruck`, `volume`, `km`, `base`) VALUES ('0', '0', '00', '0');
INSERT INTO `cargocar`.`valorfrete` (`idvalor`, `valor`) VALUES ('0', '0');


UPDATE `cargocar`.`carro` SET `volume`='0', `base`='0', `km`='0' WHERE `idcarro`='0';

