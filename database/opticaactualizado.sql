-- MySQL Script generated by MySQL Workbench
-- mar 05 feb 2019 21:22:27 -05
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=1;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=1;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema OPTICAIJC
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `OPTICAIJC` ;

-- -----------------------------------------------------
-- Schema OPTICAIJC
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `OPTICAIJC` DEFAULT CHARACTER SET utf8 ;
USE `OPTICAIJC` ;

-- -----------------------------------------------------
-- Table `OPTICAIJC`.`USUARIOCOMUN`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`USUARIOCOMUN` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`USUARIOCOMUN` (
  `cusuario` INT NOT NULL,
  `nombre` VARCHAR(500) NOT NULL,
  `fechanac` DATE NOT NULL,
  `telefono` VARCHAR(15) NULL,
  `direccion` TEXT NOT NULL,
  `correo` TEXT NULL,
  PRIMARY KEY (`cusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`SESIONUSR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`SESIONUSR` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`SESIONUSR` (
  `contrasena` VARCHAR(500) NOT NULL,
  `USUARIO_cusuario` INT NOT NULL,
  PRIMARY KEY (`USUARIO_cusuario`),
  CONSTRAINT `fk_SESIONUSR_USUARIO`
    FOREIGN KEY (`USUARIO_cusuario`)
    REFERENCES `OPTICAIJC`.`USUARIOCOMUN` (`cusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`USUARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`USUARIO` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`USUARIO` (
  `csalud` VARCHAR(500) NOT NULL,
  `uuc_cusuario` INT NOT NULL,
  `estadousr` TINYINT(1) NOT NULL,
  PRIMARY KEY (`uuc_cusuario`),
  CONSTRAINT `fk_USUARIO_USUARIOCOMUN1`
    FOREIGN KEY (`uuc_cusuario`)
    REFERENCES `OPTICAIJC`.`USUARIOCOMUN` (`cusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`EMPLEADO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`EMPLEADO` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`EMPLEADO` (
  `cempleado` VARCHAR(500) NOT NULL,
  `euc_cusuario` INT NOT NULL,
  `tipoempleado` INT(11) NOT NULL COMMENT '1 -> Usuario comun\n2 -> Empleado doctor\n3 -> Empleado comun\n0 -> Administrador',
  PRIMARY KEY (`cempleado`, `euc_cusuario`),
  CONSTRAINT `fk_EMPLEADO_USUARIOCOMUN1`
    FOREIGN KEY (`euc_cusuario`)
    REFERENCES `OPTICAIJC`.`USUARIOCOMUN` (`cusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`CITAMEDICA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`CITAMEDICA` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`CITAMEDICA` (
  `ccita` VARCHAR(50) NOT NULL,
  `usr_uc_cusuario` INT NOT NULL,
  `fechacita` DATE NOT NULL,
  `horacita` TIME NOT NULL,
  `noconsultorio` INT(11) NOT NULL,
  `estadocita` TINYINT(1) NOT NULL,
  `ce_cempleado` VARCHAR(500) NULL,
  `e_uc_cusuario` INT NULL,
  INDEX `fk_CITAMEDICA_USUARIO1_idx` (`usr_uc_cusuario` ASC),
  INDEX `fk_CITAMEDICA_EMPLEADO1_idx` (`ce_cempleado` ASC, `e_uc_cusuario` ASC),
  UNIQUE INDEX `fechacita_UNIQUE` (`fechacita` ASC),
  UNIQUE INDEX `horacita_UNIQUE` (`horacita` ASC),
  PRIMARY KEY (`ccita`),
  CONSTRAINT `fk_CITAMEDICA_USUARIO1`
    FOREIGN KEY (`usr_uc_cusuario`)
    REFERENCES `OPTICAIJC`.`USUARIO` (`uuc_cusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_CITAMEDICA_EMPLEADO1`
    FOREIGN KEY (`ce_cempleado` , `e_uc_cusuario`)
    REFERENCES `OPTICAIJC`.`EMPLEADO` (`cempleado` , `euc_cusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`HISTORIACLINICA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`HISTORIACLINICA` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`HISTORIACLINICA` (
  `chistoria` INT NOT NULL,
  `fechasolicitud` DATETIME NOT NULL,
  `u_uc_cusuario` INT NOT NULL,
  PRIMARY KEY (`chistoria`, `u_uc_cusuario`),
  INDEX `fk_HISTORIACLINICA_USUARIO1_idx` (`u_uc_cusuario` ASC),
  CONSTRAINT `fk_HISTORIACLINICA_USUARIO1`
    FOREIGN KEY (`u_uc_cusuario`)
    REFERENCES `OPTICAIJC`.`USUARIO` (`uuc_cusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`DIAGNOSTICO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`DIAGNOSTICO` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`DIAGNOSTICO` (
  `codiagnostico` INT NOT NULL,
  `sintomas` TEXT NULL,
  `antecedente` TEXT NULL,
  `observacion` TEXT NULL,
  `fechadiagnostico` DATETIME NOT NULL,
  `hc_chistoria` INT NOT NULL,
  `hc_u_uc_cusuario` INT NOT NULL,
  PRIMARY KEY (`codiagnostico`),
  INDEX `fk_DIAGNOSTICO_HISTORIACLINICA1_idx` (`hc_chistoria` ASC, `hc_u_uc_cusuario` ASC),
  CONSTRAINT `fk_DIAGNOSTICO_HISTORIACLINICA1`
    FOREIGN KEY (`hc_chistoria` , `hc_u_uc_cusuario`)
    REFERENCES `OPTICAIJC`.`HISTORIACLINICA` (`chistoria` , `u_uc_cusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`EVOLUCION`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`EVOLUCION` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`EVOLUCION` (
  `cevolucion` INT NOT NULL,
  `observaciones` TEXT NULL,
  `estadoevolucion` VARCHAR(50) NOT NULL,
  `gravedad` VARCHAR(50) NOT NULL,
  `d_codiagnostico` INT NOT NULL,
  PRIMARY KEY (`cevolucion`, `d_codiagnostico`),
  INDEX `fk_EVOLUCION_DIAGNOSTICO1_idx` (`d_codiagnostico` ASC),
  CONSTRAINT `fk_EVOLUCION_DIAGNOSTICO1`
    FOREIGN KEY (`d_codiagnostico`)
    REFERENCES `OPTICAIJC`.`DIAGNOSTICO` (`codiagnostico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`FORMULA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`FORMULA` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`FORMULA` (
  `cformula` VARCHAR(500) NOT NULL,
  `fechaformula` DATE NOT NULL,
  `horaformula` TIME NOT NULL,
  `c_ccita` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`cformula`, `c_ccita`),
  INDEX `fk_FORMULA_CITAMEDICA1_idx` (`c_ccita` ASC),
  CONSTRAINT `fk_FORMULA_CITAMEDICA1`
    FOREIGN KEY (`c_ccita`)
    REFERENCES `OPTICAIJC`.`CITAMEDICA` (`ccita`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`PROVEEDOR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`PROVEEDOR` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`PROVEEDOR` (
  `cproveedor` VARCHAR(500) NOT NULL,
  `nomproveedor` VARCHAR(45) NOT NULL,
  `ciuproveedor` VARCHAR(45) NOT NULL,
  `contproveedor` VARCHAR(45) NOT NULL,
  `telproveedor` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`cproveedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`INVENTARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`INVENTARIO` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`INVENTARIO` (
  `cproducto` VARCHAR(500) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `cantidaddisponible` INT(11) NOT NULL,
  `costocompra` DOUBLE NOT NULL,
  `costoventa` DOUBLE NOT NULL,
  `copago` TINYINT(1) NOT NULL,
  `pi_cproveedor` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`cproducto`),
  INDEX `fk_INVENTARIO_PROVEEDOR1_idx` (`pi_cproveedor` ASC),
  CONSTRAINT `fk_INVENTARIO_PROVEEDOR1`
    FOREIGN KEY (`pi_cproveedor`)
    REFERENCES `OPTICAIJC`.`PROVEEDOR` (`cproveedor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`LISTAMEDICAMENTO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`LISTAMEDICAMENTO` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`LISTAMEDICAMENTO` (
  `nombremedicamento` TEXT NOT NULL,
  `cantidad` INT(11) NOT NULL,
  `prescripcion` VARCHAR(500) NOT NULL,
  `observaciones` TEXT NULL,
  `f_cformula` VARCHAR(500) NOT NULL,
  `f_c_ccita` VARCHAR(50) NOT NULL,
  `if_cproducto` VARCHAR(500) NOT NULL,
  INDEX `fk_LISTAMEDICAMENTO_FORMULA1_idx` (`f_cformula` ASC, `f_c_ccita` ASC),
  INDEX `fk_LISTAMEDICAMENTO_INVENTARIO1_idx` (`if_cproducto` ASC),
  CONSTRAINT `fk_LISTAMEDICAMENTO_FORMULA1`
    FOREIGN KEY (`f_cformula` , `f_c_ccita`)
    REFERENCES `OPTICAIJC`.`FORMULA` (`cformula` , `c_ccita`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_LISTAMEDICAMENTO_INVENTARIO1`
    FOREIGN KEY (`if_cproducto`)
    REFERENCES `OPTICAIJC`.`INVENTARIO` (`cproducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`LABORATORIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`LABORATORIO` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`LABORATORIO` (
  `clab` INT NOT NULL,
  `fecharesl` DATE NOT NULL,
  `horaresl` TIME NOT NULL,
  `c_l_ccita` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`clab`, `c_l_ccita`),
  INDEX `fk_LABORATORIO_CITAMEDICA1_idx` (`c_l_ccita` ASC),
  CONSTRAINT `fk_LABORATORIO_CITAMEDICA1`
    FOREIGN KEY (`c_l_ccita`)
    REFERENCES `OPTICAIJC`.`CITAMEDICA` (`ccita`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`NOMINA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`NOMINA` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`NOMINA` (
  `cnomina` VARCHAR(500) NOT NULL,
  `fechapago` DATE NOT NULL,
  `valorpagado` DOUBLE NOT NULL,
  `EMPLEADO_cempleado` VARCHAR(500) NOT NULL,
  `EMPLEADO_euc_cusuario` INT NOT NULL,
  PRIMARY KEY (`cnomina`),
  UNIQUE INDEX `fechapago_UNIQUE` (`fechapago` ASC),
  INDEX `fk_NOMINA_EMPLEADO1_idx` (`EMPLEADO_cempleado` ASC, `EMPLEADO_euc_cusuario` ASC),
  CONSTRAINT `fk_NOMINA_EMPLEADO1`
    FOREIGN KEY (`EMPLEADO_cempleado` , `EMPLEADO_euc_cusuario`)
    REFERENCES `OPTICAIJC`.`EMPLEADO` (`cempleado` , `euc_cusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`FACTURA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`FACTURA` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`FACTURA` (
  `cfactura` INT NOT NULL,
  `clienteid` INT NOT NULL,
  `observacionecompra` TEXT NOT NULL,
  `fechacompra` DATETIME NOT NULL,
  `totalcomprafact` DOUBLE NOT NULL,
  PRIMARY KEY (`cfactura`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`COMPRA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`COMPRA` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`COMPRA` (
  `ccompra` INT ZEROFILL NOT NULL AUTO_INCREMENT,
  `cantidadp` INT(11) NOT NULL,
  `ci_cproducto` VARCHAR(500) NOT NULL,
  `totalcompra` DOUBLE NOT NULL,
  `fac_cfactura` INT NOT NULL,
  PRIMARY KEY (`ccompra`, `fac_cfactura`),
  INDEX `fk_COMPRA_INVENTARIO1_idx` (`ci_cproducto` ASC),
  INDEX `fk_COMPRA_FACTURA1_idx` (`fac_cfactura` ASC),
  CONSTRAINT `fk_COMPRA_INVENTARIO1`
    FOREIGN KEY (`ci_cproducto`)
    REFERENCES `OPTICAIJC`.`INVENTARIO` (`cproducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_COMPRA_FACTURA1`
    FOREIGN KEY (`fac_cfactura`)
    REFERENCES `OPTICAIJC`.`FACTURA` (`cfactura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`CONSINFORMADO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`CONSINFORMADO` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`CONSINFORMADO` (
  `cconsentimiento` INT NOT NULL,
  `observacionconsent` TEXT NOT NULL,
  `ciu_uuc_cusuario` INT NOT NULL,
  PRIMARY KEY (`cconsentimiento`),
  INDEX `fk_CONSINFORMADO_USUARIO1_idx` (`ciu_uuc_cusuario` ASC),
  CONSTRAINT `fk_CONSINFORMADO_USUARIO1`
    FOREIGN KEY (`ciu_uuc_cusuario`)
    REFERENCES `OPTICAIJC`.`USUARIO` (`uuc_cusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`PAGO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`PAGO` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`PAGO` (
  `cpago` INT NOT NULL,
  `fecha_pago` DATE NOT NULL,
  `horapago` TIME NOT NULL,
  `valorasignado` DOUBLE NOT NULL,
  `pagadoa` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`cpago`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`PAGO_PROVEEDOR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`PAGO_PROVEEDOR` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`PAGO_PROVEEDOR` (
  `pp_cpago` INT NOT NULL,
  `pprov_cproveedor` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`pp_cpago`, `pprov_cproveedor`),
  INDEX `fk_PAGO_has_PROVEEDOR_PROVEEDOR1_idx` (`pprov_cproveedor` ASC),
  INDEX `fk_PAGO_has_PROVEEDOR_PAGO1_idx` (`pp_cpago` ASC),
  CONSTRAINT `fk_PAGO_has_PROVEEDOR_PAGO1`
    FOREIGN KEY (`pp_cpago`)
    REFERENCES `OPTICAIJC`.`PAGO` (`cpago`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_PAGO_has_PROVEEDOR_PROVEEDOR1`
    FOREIGN KEY (`pprov_cproveedor`)
    REFERENCES `OPTICAIJC`.`PROVEEDOR` (`cproveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`GANANCIA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`GANANCIA` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`GANANCIA` (
  `cgananciadia` VARCHAR(500) NOT NULL,
  `fechacaja` DATE NOT NULL,
  `totalganancia` DOUBLE NOT NULL,
  `totalretiros` DOUBLE NOT NULL,
  `pg_cpago` INT NOT NULL,
  `fg_cfactura` INT NOT NULL,
  PRIMARY KEY (`cgananciadia`),
  UNIQUE INDEX `cgananciadia_UNIQUE` (`cgananciadia` ASC),
  INDEX `fk_GANANCIA_PAGO1_idx` (`pg_cpago` ASC),
  INDEX `fk_GANANCIA_FACTURA1_idx` (`fg_cfactura` ASC),
  CONSTRAINT `fk_GANANCIA_PAGO1`
    FOREIGN KEY (`pg_cpago`)
    REFERENCES `OPTICAIJC`.`PAGO` (`cpago`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_GANANCIA_FACTURA1`
    FOREIGN KEY (`fg_cfactura`)
    REFERENCES `OPTICAIJC`.`FACTURA` (`cfactura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`ENTREGA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`ENTREGA` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`ENTREGA` (
  `centrega` INT NOT NULL,
  `FORMULA_cformula` VARCHAR(500) NOT NULL,
  `FORMULA_c_ccita` VARCHAR(50) NOT NULL,
  `estadoentrega` TINYINT(1) NOT NULL,
  PRIMARY KEY (`centrega`, `FORMULA_cformula`, `FORMULA_c_ccita`),
  INDEX `fk_ENTREGA_FORMULA1_idx` (`FORMULA_cformula` ASC, `FORMULA_c_ccita` ASC),
  CONSTRAINT `fk_ENTREGA_FORMULA1`
    FOREIGN KEY (`FORMULA_cformula` , `FORMULA_c_ccita`)
    REFERENCES `OPTICAIJC`.`FORMULA` (`cformula` , `c_ccita`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTICAIJC`.`REGENTREGA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `OPTICAIJC`.`REGENTREGA` ;

CREATE TABLE IF NOT EXISTS `OPTICAIJC`.`REGENTREGA` (
  `er_centrega` INT NOT NULL,
  `ef_cformula` VARCHAR(500) NOT NULL,
  `ef_c_ccita` VARCHAR(50) NOT NULL,
  INDEX `fk_REGENTREGA_ENTREGA1_idx` (`er_centrega` ASC, `ef_cformula` ASC, `ef_c_ccita` ASC),
  CONSTRAINT `fk_REGENTREGA_ENTREGA1`
    FOREIGN KEY (`er_centrega` , `ef_cformula` , `ef_c_ccita`)
    REFERENCES `OPTICAIJC`.`ENTREGA` (`centrega` , `FORMULA_cformula` , `FORMULA_c_ccita`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
