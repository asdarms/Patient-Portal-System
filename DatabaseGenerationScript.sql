SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

DROP DATABASE IF EXISTS `hospital`;
CREATE SCHEMA IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8 ;
USE `hospital` ;

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `bio` mediumtext DEFAULT NULL,
  `profile_pic` longblob DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_type` varchar(45) DEFAULT NULL,
  `date_employed` date DEFAULT NULL,
  `user_id` bigint(20) NOT NULL UNIQUE,
  PRIMARY KEY (`staff_id`),
  KEY `fk_staff_user1_idx` (`user_id`),
  CONSTRAINT `fk_staff_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_of_birth` date ,
  `sex` varchar(45) DEFAULT NULL,
  `address` tinytext,
  `emergency_contact` varchar(45) DEFAULT NULL,
  `medical_data` varchar(45) DEFAULT NULL,
  `billing_info` varchar(45) DEFAULT NULL,
  `insurance_info` varchar(45) DEFAULT NULL,
  `ssn` int(11),
  `user_id` bigint(20) NOT NULL UNIQUE,
  PRIMARY KEY (`patient_id`),
  KEY `fk_patient_user_idx` (`user_id`),
  CONSTRAINT `fk_patient_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_name` varchar(45) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `appointment_type` varchar(45) DEFAULT NULL,
  `room_number` varchar(45) DEFAULT NULL,
  `notes` tinytext DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `fk_appointment_patient1_idx` (`patient_id`),
  KEY `fk_appointment_staff1_idx` (`staff_id`),
  CONSTRAINT `fk_appointment_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  CONSTRAINT `fk_appointment_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `notes` tinytext DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`bill_id`),
  KEY `fk_bill_patient1_idx` (`patient_id`),
  KEY `fk_bill_staff1_idx` (`staff_id`),
  CONSTRAINT `fk_bill_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  CONSTRAINT `fk_bill_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `date_prescribed` date DEFAULT NULL,
  `dose` varchar(45) DEFAULT NULL,
  `dosage` varchar(45) DEFAULT NULL,
  `refill_time` varchar(45) DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`prescription_id`),
  KEY `fk_prescription_patient1_idx` (`patient_id`),
  KEY `fk_prescription_staff1_idx` (`staff_id`),
  CONSTRAINT `fk_prescription_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  CONSTRAINT `fk_prescription_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `lab_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `estimated_cost` double DEFAULT NULL,
  `tests` mediumtext DEFAULT NULL,
  `results` mediumtext DEFAULT 'N/A',
  `notes` tinytext DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_lab_order_patient1_idx` (`patient_id`),
  KEY `fk_lab_order_staff1_idx` (`staff_id`),
  CONSTRAINT `fk_lab_order_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  CONSTRAINT `fk_lab_order_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `working` binary(1) DEFAULT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`shift_id`),
  KEY `fk_shift_staff1_idx` (`staff_id`),
  CONSTRAINT `fk_shift_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `user_token` (
  `token_id` int(11) NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashed_validator` varchar(255) NOT NULL,
  `expiry` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`token_id`),
  KEY `fk_user_token_user1_idx` (`user_id`),
  CONSTRAINT `fk_user_token_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `user` (`first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('Staff', 'Staff', '3043043040', 'staff@staff.com', 'staff', '$2y$10$mRL79JqLRhg9/EGZN.IUUOHTh2BWJHZyjfEpx9hVIChLK1p6F8fTO', 'This is the admin test account.', NULL);
INSERT INTO `user` (`first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('Patient', 'Patient', '3043043040', 'patient@patient.com', 'patient', '$2y$10$mRL79JqLRhg9/EGZN.IUUOHTh2BWJHZyjfEpx9hVIChLK1p6F8fTO', 'This is the patient test account.', NULL);
INSERT INTO `user` (`first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('Doctor', 'Smith', '3043043040', 'doctor@doctor.com', 'doctor', '$2y$10$mRL79JqLRhg9/EGZN.IUUOHTh2BWJHZyjfEpx9hVIChLK1p6F8fTO', 'This is the doctor test account.', NULL);
INSERT INTO `staff` (`employee_type`, `date_employed`, `user_id`) VALUES ('Administrator', '2000-01-01', '1');
INSERT INTO `staff` (`employee_type`, `date_employed`, `user_id`) VALUES ('Doctor', '2000-01-01', '3');
INSERT INTO `patient` (`date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES ('2000-01-01', 'male', '1 John Marshall Drive\nHuntington, WV, 25755', '3043043040', 'Medical data.', 'Billing info.', 'Insurance info.', 123456789, '2');
INSERT INTO `appointment` (`appointment_name`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`) VALUES ('Yearly Physical', '2025-04-01 14:00:00', 'Checkup', '69', 'Test appointment.', 1, 2);
INSERT INTO `bill` (`date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES ('2025-03-01 14:00:00', '420.69', 'Test bill.', 'This is a test bill.', 1, 2);
INSERT INTO `prescription` (`name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`) VALUES ('Fentanyl', '2025-03-01', '69420', 'every minute', '2025-03-02', 1, 2);
INSERT INTO `lab_order` (`location`, `type`, `estimated_cost`, `tests`, `notes`, `patient_id`, `staff_id`) VALUES ('hospital', 'appointment issued lab order', '69420', 'blood', 'this is a test lab order', 1, 2);
INSERT INTO `shift` (`start_time`, `end_time`, `working`, `staff_id`) VALUES ('2000-01-01 00:00:00', '2025-04-01 14:00:00', '\0', 2);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;