-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema hospital
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema hospital
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8 ;
USE `hospital` ;

-- -----------------------------------------------------
-- Table `hospital`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hospital`.`user` ;

CREATE TABLE IF NOT EXISTS `hospital`.`user` (
  `user_id` INT NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `phone_number` INT NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password_hash` VARCHAR(45) NOT NULL,
  `bio` VARCHAR(45) NULL,
  `profile_pic` TINYTEXT NULL,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hospital`.`visitor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hospital`.`visitor` ;

CREATE TABLE IF NOT EXISTS `hospital`.`visitor` (
  `visitor_id` INT NOT NULL,
  `ip_address` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`visitor_id`, `user_id`),
  INDEX `fk_visitor_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_visitor_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `hospital`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hospital`.`staff`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hospital`.`staff` ;

CREATE TABLE IF NOT EXISTS `hospital`.`staff` (
  `staff_id` INT NOT NULL,
  `employee_type` VARCHAR(45) NULL,
  `date_employed` DATE NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`staff_id`, `user_id`),
  INDEX `fk_staff_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_staff_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `hospital`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hospital`.`shift`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hospital`.`shift` ;

CREATE TABLE IF NOT EXISTS `hospital`.`shift` (
  `shift_id` INT NOT NULL,
  `start_time` DATETIME NULL,
  `end_time` DATETIME NULL,
  `working` BINARY(1) NULL,
  `staff_id` INT NOT NULL,
  `staff_user_id` INT NOT NULL,
  PRIMARY KEY (`shift_id`, `staff_id`, `staff_user_id`),
  INDEX `fk_shift_staff1_idx` (`staff_id` ASC, `staff_user_id` ASC) ,
  CONSTRAINT `fk_shift_staff1`
    FOREIGN KEY (`staff_id` , `staff_user_id`)
    REFERENCES `hospital`.`staff` (`staff_id` , `user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hospital`.`patient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hospital`.`patient` ;

CREATE TABLE IF NOT EXISTS `hospital`.`patient` (
  `patient_id` INT NOT NULL,
  `date_of_birth` DATE NOT NULL,
  `sex` VARCHAR(45) NULL,
  `address` TINYTEXT NOT NULL,
  `emergency_contact` VARCHAR(45) NULL,
  `medical_data` VARCHAR(45) NULL,
  `billing_info` VARCHAR(45) NULL,
  `insurance_info` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`patient_id`, `user_id`),
  INDEX `fk_patient_user_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_patient_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `hospital`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hospital`.`bill`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hospital`.`bill` ;

CREATE TABLE IF NOT EXISTS `hospital`.`bill` (
  `bill_id` INT NOT NULL,
  `date` DATETIME NULL,
  `amount` DOUBLE NULL,
  `description` VARCHAR(45) NULL,
  `notes` TINYTEXT NULL,
  `patient_id` INT NOT NULL,
  `patient_user_id` INT NOT NULL,
  `staff_id` INT NOT NULL,
  `staff_user_id` INT NOT NULL,
  PRIMARY KEY (`bill_id`, `patient_id`, `patient_user_id`),
  INDEX `fk_bill_patient1_idx` (`patient_id` ASC, `patient_user_id` ASC) ,
  INDEX `fk_bill_staff1_idx` (`staff_id` ASC, `staff_user_id` ASC) ,
  CONSTRAINT `fk_bill_patient1`
    FOREIGN KEY (`patient_id` , `patient_user_id`)
    REFERENCES `hospital`.`patient` (`patient_id` , `user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bill_staff1`
    FOREIGN KEY (`staff_id` , `staff_user_id`)
    REFERENCES `hospital`.`staff` (`staff_id` , `user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hospital`.`prescription`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hospital`.`prescription` ;

CREATE TABLE IF NOT EXISTS `hospital`.`prescription` (
  `prescription_id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `date_prescribed` DATE NULL,
  `dose` VARCHAR(45) NULL,
  `dosage` VARCHAR(45) NULL,
  `refill_time` VARCHAR(45) NULL,
  `patient_id` INT NOT NULL,
  `staff_id` INT NOT NULL,
  `bill_id` INT NOT NULL,
  PRIMARY KEY (`prescription_id`),
  INDEX `fk_prescription_patient1_idx` (`patient_id` ASC) ,
  INDEX `fk_prescription_staff1_idx` (`staff_id` ASC) ,
  INDEX `fk_prescription_bill1_idx` (`bill_id` ASC) ,
  CONSTRAINT `fk_prescription_patient1`
    FOREIGN KEY (`patient_id`)
    REFERENCES `hospital`.`patient` (`patient_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prescription_staff1`
    FOREIGN KEY (`staff_id`)
    REFERENCES `hospital`.`staff` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prescription_bill1`
    FOREIGN KEY (`bill_id`)
    REFERENCES `hospital`.`bill` (`bill_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hospital`.`appointment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hospital`.`appointment` ;

CREATE TABLE IF NOT EXISTS `hospital`.`appointment` (
  `appointment_id` INT NOT NULL,
  `datetime` DATETIME NULL,
  `appointment_type` VARCHAR(45) NULL,
  `room_number` VARCHAR(45) NULL,
  `notes` TINYTEXT NULL,
  `patient_id` INT NOT NULL,
  `staff_id` INT NOT NULL,
  `bill_id` INT NOT NULL,
  PRIMARY KEY (`appointment_id`, `patient_id`),
  INDEX `fk_appointment_patient1_idx` (`patient_id` ASC) ,
  INDEX `fk_appointment_staff1_idx` (`staff_id` ASC) ,
  INDEX `fk_appointment_bill1_idx` (`bill_id` ASC) ,
  CONSTRAINT `fk_appointment_patient1`
    FOREIGN KEY (`patient_id`)
    REFERENCES `hospital`.`patient` (`patient_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_appointment_staff1`
    FOREIGN KEY (`staff_id`)
    REFERENCES `hospital`.`staff` (`staff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_appointment_bill1`
    FOREIGN KEY (`bill_id`)
    REFERENCES `hospital`.`bill` (`bill_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hospital`.`reminder`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hospital`.`reminder` ;

CREATE TABLE IF NOT EXISTS `hospital`.`reminder` (
  `reminder_id` INT NOT NULL,
  `time` DATETIME NULL,
  `message` MEDIUMTEXT NULL,
  `appointment_id` INT NOT NULL,
  `patient_id` INT NOT NULL,
  PRIMARY KEY (`reminder_id`, `appointment_id`, `patient_id`),
  INDEX `fk_reminder_appointment1_idx` (`appointment_id` ASC, `patient_id` ASC) ,
  CONSTRAINT `fk_reminder_appointment1`
    FOREIGN KEY (`appointment_id` , `patient_id`)
    REFERENCES `hospital`.`appointment` (`appointment_id` , `patient_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hospital`.`lab_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hospital`.`lab_order` ;

CREATE TABLE IF NOT EXISTS `hospital`.`lab_order` (
  `order_id` INT NOT NULL,
  `location` VARCHAR(45) NULL,
  `type` VARCHAR(45) NULL,
  `estimated_cost` DOUBLE NULL,
  `notes` TINYTEXT NULL,
  `appointment_id` INT NOT NULL,
  `patient_id` INT NOT NULL,
  `staff_id` INT NOT NULL,
  `staff_user_id` INT NOT NULL,
  PRIMARY KEY (`order_id`),
  INDEX `fk_lab_order_appointment1_idx` (`appointment_id` ASC, `patient_id` ASC) ,
  INDEX `fk_lab_order_staff1_idx` (`staff_id` ASC, `staff_user_id` ASC) ,
  CONSTRAINT `fk_lab_order_appointment1`
    FOREIGN KEY (`appointment_id` , `patient_id`)
    REFERENCES `hospital`.`appointment` (`appointment_id` , `patient_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lab_order_staff1`
    FOREIGN KEY (`staff_id` , `staff_user_id`)
    REFERENCES `hospital`.`staff` (`staff_id` , `user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hospital`.`lab_result`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hospital`.`lab_result` ;

CREATE TABLE IF NOT EXISTS `hospital`.`lab_result` (
  `result_id` INT NOT NULL,
  `tests` MEDIUMTEXT NULL,
  `results` MEDIUMTEXT NULL,
  `notes` TINYTEXT NULL,
  `order_id` INT NOT NULL,
  PRIMARY KEY (`result_id`, `order_id`),
  INDEX `fk_lab_result_lab_order1_idx` (`order_id` ASC) ,
  CONSTRAINT `fk_lab_result_lab_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `hospital`.`lab_order` (`order_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hospital`.`user_token`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hospital`.`user_token` ;

CREATE TABLE IF NOT EXISTS `hospital`.`user_token` (
  `token_id` INT NOT NULL,
  `selector` VARCHAR(45) NOT NULL,
  `hashed_validator` VARCHAR(45) NOT NULL,
  `expiry` VARCHAR(45) NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`token_id`),
  INDEX `fk_user_token_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_user_token_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `hospital`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
