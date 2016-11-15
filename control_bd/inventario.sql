-- MySQL Script generated by MySQL Workbench
-- 08/11/16 15:13:18
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema inventario_bd
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cliente` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nit` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NULL DEFAULT NULL,
  `telefono` VARCHAR(45) NULL DEFAULT NULL,
  `correo` VARCHAR(150) NULL DEFAULT NULL,
  `tipocliente` VARCHAR(2) NOT NULL,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `documento` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NULL DEFAULT NULL,
  `direccion` VARCHAR(45) NULL DEFAULT NULL,
  `correo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`cuenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cuenta` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(45) NOT NULL,
  `estado` TINYINT(1) NOT NULL,
  `id_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_cuenta_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `mydb`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`tipocuenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipocuenta` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`cuenta_tipocuenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cuenta_tipocuenta` (
  `id_cuenta` INT(11) NOT NULL,
  `id_tipousuario` INT(11) NOT NULL,
  PRIMARY KEY (`id_cuenta`, `id_tipousuario`),
  INDEX `fk_cuenta_has_tipousuario_cuenta1_idx` (`id_cuenta` ASC),
  CONSTRAINT `fk_cuenta_has_tipousuario_cuenta1`
    FOREIGN KEY (`id_cuenta`)
    REFERENCES `mydb`.`cuenta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_has_tipousuario_tipousuario1`
    FOREIGN KEY (`id_tipousuario`)
    REFERENCES `mydb`.`tipocuenta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`proveedor` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nit` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`factura_compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`factura_compra` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_compra` DATETIME NOT NULL,
  `id_proveedor` INT(11) NOT NULL,
  `numero_factura` VARCHAR(50) NULL,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `numero_factura_UNIQUE` (`numero_factura` ASC),
  CONSTRAINT `fk_compra_proveedor1`
    FOREIGN KEY (`id_proveedor`)
    REFERENCES `mydb`.`proveedor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`factura_venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`factura_venta` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `numerofactura` BIGINT(20) NULL,
  `fechaventa` DATE NOT NULL,
  `id_cliente` INT(11) NOT NULL,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`, `id_cliente`),
  UNIQUE INDEX `numerofactura_UNIQUE` (`numerofactura` ASC),
  CONSTRAINT `fk_venta_cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `mydb`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 73
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pedido` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL DEFAULT NULL,
  `fechapedido` DATETIME NOT NULL,
  `idproveedor` INT(11) NOT NULL,
  `estado` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_pedido_proveedor1`
    FOREIGN KEY (`idproveedor`)
    REFERENCES `mydb`.`proveedor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 61
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`ubicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ubicacion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`producto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `referencia` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(150) NOT NULL,
  `observacion` VARCHAR(150) NULL DEFAULT 'Sin observación',
  `ubicacion_id` INT(11) NULL DEFAULT NULL,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_producto_ubicacion1`
    FOREIGN KEY (`ubicacion_id`)
    REFERENCES `mydb`.`ubicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`pedido_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pedido_producto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` INT(11) NOT NULL,
  `id_producto` INT(11) NOT NULL,
  `cantidad` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_pedido_id`
    FOREIGN KEY (`id_pedido`)
    REFERENCES `mydb`.`pedido` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_id`
    FOREIGN KEY (`id_producto`)
    REFERENCES `mydb`.`producto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 802
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`permiso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`permiso` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`producto_compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`producto_compra` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_producto` INT(11) NOT NULL,
  `id_compra` INT(11) NOT NULL,
  `precio_compra` DECIMAL(10,2) NOT NULL,
  `cantidad` INT(11) NOT NULL,
  `iva` DECIMAL(10,2) NOT NULL,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_producto_has_compra_compra1`
    FOREIGN KEY (`id_compra`)
    REFERENCES `mydb`.`factura_compra` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_has_compra_producto1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `mydb`.`producto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`tipocuenta_permiso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipocuenta_permiso` (
  `id_tipocuenta` INT(11) NOT NULL,
  `id_permiso` INT(11) NOT NULL,
  PRIMARY KEY (`id_tipocuenta`, `id_permiso`),
  INDEX `fk_tipousuario_has_permiso_tipousuario1_idx` (`id_tipocuenta` ASC),
  CONSTRAINT `fk_tipousuario_has_permiso_permiso1`
    FOREIGN KEY (`id_permiso`)
    REFERENCES `mydb`.`permiso` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipousuario_has_permiso_tipousuario1`
    FOREIGN KEY (`id_tipocuenta`)
    REFERENCES `mydb`.`tipocuenta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`venta_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`venta_producto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_venta` INT(11) NOT NULL,
  `id_producto` INT(11) NOT NULL,
  `descuento` INT(11) NULL DEFAULT NULL,
  `valor` DECIMAL(10,2) NOT NULL,
  `cantidad` INT(11) NOT NULL,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`, `id_venta`, `id_producto`),
  CONSTRAINT `fk_venta_has_producto_producto1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `mydb`.`producto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_has_producto_venta1`
    FOREIGN KEY (`id_venta`)
    REFERENCES `mydb`.`factura_venta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 110
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;