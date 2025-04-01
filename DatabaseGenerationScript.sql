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
DROP DATABASE IF EXISTS `hospital`;
CREATE SCHEMA IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8 ;
USE `hospital` ;

-- 
-- TABLE STRUCTURE FOR: appointment
-- 

DROP TABLE IF EXISTS `appointment`;

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `appointment_type` varchar(45) DEFAULT NULL,
  `room_number` varchar(45) DEFAULT NULL,
  `notes` tinytext DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  PRIMARY KEY (`appointment_id`,`patient_id`),
  KEY `fk_appointment_patient1_idx` (`patient_id`),
  KEY `fk_appointment_staff1_idx` (`staff_id`),
  KEY `fk_appointment_bill1_idx` (`bill_id`),
  CONSTRAINT `fk_appointment_bill1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`),
  CONSTRAINT `fk_appointment_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  CONSTRAINT `fk_appointment_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (20268, '1982-04-23 08:01:24', 'a', '416', 'Voluptas ad saepe saepe dolorum et. Exercitationem sed voluptates omnis ratione consequatur. Fugit accusamus aut in cum quasi. Quas voluptas repellendus delectus perspiciatis quos recusandae.', 9969419, 98640156, 957682);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (84361, '2015-03-10 08:20:48', 'c', '440', 'Aut labore dolorem iure fugiat eos cum est. Corrupti dolores et fuga veritatis. Accusamus dolorem dolores soluta ratione.', 5412155, 73673923, 580307);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (221590, '2017-11-27 15:25:58', 'b', '974', 'Aut omnis numquam sunt quasi aut et. Nesciunt qui maiores aliquid aut modi. Laudantium facere nihil mollitia nemo vel tempore sit totam.', 1262631, 19289979, 123138);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (281679, '1970-07-30 18:31:31', 'b', '734', 'Aut et illum sunt voluptatem cum harum qui. Beatae aliquid et facilis qui. Consectetur eos illum laborum fuga natus consequuntur voluptatem.', 981859, 17352871, 89581);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (364834, '1994-11-08 14:07:52', 'c', '990', 'Vel deserunt iste facilis ipsam labore corporis iste qui. Et expedita nihil rerum maxime ad amet. Ipsa placeat accusamus enim quis.', 5911056, 77505062, 605952);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (407739, '1980-07-06 11:18:37', 'c', '502', 'Beatae minus quisquam inventore hic aut quia. Dignissimos qui et animi autem. Libero nemo saepe quasi tempore optio doloribus ab. Dignissimos numquam consequuntur quas.', 5960523, 81646647, 616210);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (434269, '2001-09-09 05:20:18', 'a', '751', 'Ea aliquid sed beatae quasi est doloribus aspernatur. Dolorum et adipisci cupiditate et et et sint. Assumenda deleniti aut tempora sit facere occaecati dolorem.', 9590994, 92472169, 956592);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (475306, '1985-03-16 19:32:26', 'c', '128', 'Odio ipsa temporibus eum adipisci reiciendis qui. Dolorum et impedit quae est. Maiores omnis et et nam. Inventore laudantium qui animi consequuntur recusandae cumque perferendis.', 4064521, 41715661, 375968);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (509448, '2021-05-27 10:12:56', 'c', '446', 'Assumenda illum sint alias aut. Commodi vel dolore quia quis fugit excepturi corrupti commodi. Accusantium ipsa pariatur delectus libero voluptate est dicta.', 6524232, 82787955, 678869);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (534046, '1985-08-03 02:18:05', 'c', '684', 'Fugiat fuga est iusto asperiores hic quaerat. Aut voluptatem porro atque in autem quidem iusto. Aut voluptas consequuntur ipsum quis. Consectetur enim voluptatem enim magni quidem quidem.', 4327444, 65980927, 412926);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (557842, '1984-08-16 22:07:52', 'a', '834', 'Amet fuga eius exercitationem architecto totam beatae. Assumenda quaerat suscipit quis delectus quia tempore. Inventore cupiditate est inventore beatae. Laborum eaque libero fugiat voluptatem nostrum neque.', 4254633, 45580181, 392927);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (561898, '1996-05-01 17:29:07', 'b', '335', 'Et dolores enim voluptatem omnis nihil provident. Reprehenderit incidunt nihil sit. Impedit quisquam magni atque tenetur quae blanditiis cumque. Voluptas est quo omnis.', 1757608, 20350543, 155514);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (579175, '2011-05-17 04:35:48', 'b', '974', 'Explicabo omnis est in modi. Sed illum pariatur odit aut consequatur tempore veniam ut. Qui consectetur id et quis quia libero debitis et. Voluptas consequatur eius odio tenetur. Fugiat et fugiat quisquam voluptas.', 6858589, 83875809, 779853);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (599978, '1977-01-29 13:37:49', 'a', '975', 'Voluptas non quisquam quia autem eum magni vel. Similique fugit ea eos similique hic molestiae. Iure deserunt et aut quasi voluptatum voluptatem quia.', 8410501, 91241058, 788936);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (768161, '1977-06-17 08:25:17', 'b', '110', 'Molestiae nostrum voluptas autem temporibus. Et aut amet quis a corrupti. Quae vel aut sit voluptatem rem.', 571192, 4867287, 23580);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (812446, '2025-02-02 04:43:15', 'b', '700', 'Sint exercitationem ducimus ut id nemo in. Minima molestias voluptatem enim magnam. Alias provident sunt maxime accusamus quae deleniti dolore. Doloremque commodi voluptas optio laborum enim sint sit.', 2057126, 31126862, 216797);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (836563, '2022-05-22 20:39:14', 'a', '449', 'Non dolores vel error aut et voluptatum. Enim rerum repellat ducimus neque sunt eligendi. Modi architecto adipisci vel voluptate facilis dolor. Itaque minus consectetur dolores.', 1387836, 19915689, 145397);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (841974, '2001-12-27 12:39:29', 'a', '778', 'Eum tenetur autem quas. Quidem accusamus modi consequatur.', 4475621, 73579264, 577832);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (881982, '1983-08-13 04:19:08', 'a', '669', 'Cum aut velit voluptas quae voluptatem eum. Doloribus aut tempora sunt ut natus sit. Et omnis quo sit aperiam vel omnis.', 4432435, 69455541, 501402);
INSERT INTO `appointment` (`appointment_id`, `datetime`, `appointment_type`, `room_number`, `notes`, `patient_id`, `staff_id`, `bill_id`) VALUES (962915, '1989-03-17 20:16:50', 'c', '122', 'Error aut nesciunt tempora excepturi. Animi quos occaecati dolor quidem cumque. Autem sed itaque error. Error quidem consequuntur facere voluptatum autem.', 3368421, 36076157, 270449);


--
-- TABLE STRUCTURE FOR: bill
--

DROP TABLE IF EXISTS `bill`;

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `notes` tinytext DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`bill_id`,`patient_id`),
  KEY `fk_bill_patient1_idx` (`patient_id`),
  KEY `fk_bill_staff1_idx` (`staff_id`),
  CONSTRAINT `fk_bill_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  CONSTRAINT `fk_bill_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (23580, '1974-04-21 22:09:48', '38220.31', 'Excepturi at similique necessitatibus.', 'Ullam nobis perferendis libero omnis quis. Pariatur et dicta et quo magnam enim qui. Qui est nihil exercitationem doloremque enim.', 4475621, 73579264);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (89581, '2019-01-14 19:01:17', '10514.87', 'Odit ut vel non laborum quae.', 'Beatae architecto saepe dolor quibusdam. Et et aut odio molestiae qui. Est quisquam eos in facere qui voluptatum. Voluptate quaerat nihil ullam praesentium assumenda voluptas cum.', 571192, 4867287);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (123138, '1975-06-11 20:15:26', '12395.35', 'Facere totam ab et.', 'Perferendis dicta quae nemo nisi nobis. Corrupti similique enim totam tempore ipsum non omnis. Est id pariatur ut ea exercitationem quia autem autem. Voluptatem iure quibusdam nisi ratione numquam inventore.', 5412155, 73673923);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (145397, '2016-01-15 14:26:31', '16662.87', 'Commodi corporis ad voluptatem.', 'Et aliquid quasi aut. Fugiat nam occaecati ut voluptate similique recusandae.', 2057126, 31126862);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (155514, '2008-04-19 00:04:04', '25764.19', 'Inventore dignissimos autem qui in fugit.', 'Mollitia nobis et sint est autem at. Et at architecto veniam hic sit quidem. Sit debitis ad dignissimos quam dolor maxime doloremque.', 9590994, 92472169);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (216797, '2005-04-19 20:06:39', '2845.48', 'Ut veniam provident saepe perspiciatis.', 'Aliquam soluta qui et. Molestias omnis assumenda itaque ut. Nihil alias odit necessitatibus culpa dolorem.', 4064521, 41715661);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (270449, '1994-12-22 13:05:23', '4371.23', 'Ea sequi cupiditate iure delectus.', 'Dicta voluptas in non qui. Animi doloremque aut deserunt ea. Sed et excepturi fugit omnis libero dignissimos.', 8410501, 91241058);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (375968, '1998-02-10 11:12:11', '33790.01', 'Repudiandae illo illo et.', 'Non impedit error cupiditate quos sed. Id animi dignissimos modi eaque animi laudantium. Est adipisci dolores laborum minus.', 6858589, 83875809);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (392927, '1972-04-30 15:12:59', '17305.38', 'Non assumenda rerum sunt quibusdam.', 'Deserunt cum veniam ex quia dolore dolore. Non alias reiciendis beatae exercitationem aliquid assumenda error. Quia maiores beatae aut. Tempore praesentium suscipit iure omnis voluptatem voluptatem dolorem.', 3368421, 36076157);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (412926, '1976-10-06 05:41:50', '16868.9', 'Iure id quo ipsum qui.', 'Qui eos facere quidem dolorum nostrum. Necessitatibus nihil est laudantium illo voluptatem. Quidem reprehenderit et assumenda labore eveniet impedit.', 4254633, 45580181);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (501402, '1981-05-04 21:55:33', '32687.99', 'Impedit et iure itaque.', 'Provident eligendi dicta rerum eum sunt. Maiores fugit possimus autem vel qui et.', 4432435, 69455541);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (577832, '2004-09-17 09:57:51', '11888.91', 'Nostrum consequatur autem minus facilis.', 'Voluptas aut et quibusdam aut soluta voluptatem unde sed. Est ducimus aut veritatis illum.', 1387836, 19915689);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (580307, '1973-10-13 21:13:30', '19563.35', 'Ex dolorem qui minus optio.', 'Aliquam repudiandae sed sed molestias. Rerum odit eaque dignissimos cumque rerum ut pariatur esse. Ex eius quasi et nam ut velit aut ea. Laboriosam quis officiis delectus sunt fugiat ipsam.', 9969419, 98640156);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (605952, '1983-01-06 11:15:16', '8387.45', 'Ipsa error maiores aut voluptas.', 'Ducimus labore ad quia qui. Perspiciatis ut necessitatibus aspernatur blanditiis quam explicabo tenetur. Odit in perspiciatis minus vel tempora qui est. Odio atque nihil dolore incidunt quia eum doloribus odio.', 5911056, 77505062);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (616210, '2021-05-28 19:38:01', '20501.74', 'Fugiat ea eveniet ut.', 'Quam optio quas nulla. Aperiam facere magnam quis voluptas inventore odit.', 4327444, 65980927);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (678869, '1978-03-26 17:11:08', '34659.61', 'Qui qui ex non sit animi.', 'Delectus mollitia excepturi ea blanditiis dolor veritatis dolorem aspernatur. Nulla minus ut nostrum sequi molestiae error est cupiditate.', 6524232, 82787955);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (779853, '2010-02-16 23:13:59', '16303.74', 'Nam esse commodi ullam sed qui est omnis.', 'Ipsum dolorem est et debitis sequi temporibus. Tempore rerum alias harum animi dolorem rerum ut. Labore voluptatem et ut ex error. Sed voluptatem quod harum aperiam sint quaerat eius.', 5960523, 81646647);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (788936, '1979-04-16 07:58:01', '2170.78', 'Ullam facere quod ea itaque provident.', 'Consequatur ipsum nobis modi. Ut quam voluptatem modi maxime. Ad rerum aperiam explicabo consequuntur est nobis eos. Modi nihil facere et minus ut velit quia.', 1757608, 20350543);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (956592, '1991-09-25 17:57:54', '13534.03', 'Asperiores suscipit qui rerum.', 'Numquam fuga harum nulla voluptates quod explicabo quia. Tempora sed et et aut et voluptatem.', 1262631, 19289979);
INSERT INTO `bill` (`bill_id`, `date`, `amount`, `description`, `notes`, `patient_id`, `staff_id`) VALUES (957682, '1994-11-01 01:41:43', '369.14', 'Consequatur dolores assumenda nam iusto.', 'Fuga repudiandae odit sed delectus ut minima alias eaque. Quae aut qui consequuntur quisquam et et sit. Ut rerum occaecati quod. Laborum exercitationem voluptas commodi ipsum quia consequatur.', 981859, 17352871);


--
-- TABLE STRUCTURE FOR: lab_order
-- 

DROP TABLE IF EXISTS `lab_order`;

CREATE TABLE `lab_order` (
  `order_id` int(11) NOT NULL,
  `location` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `estimated_cost` double DEFAULT NULL,
  `notes` tinytext DEFAULT NULL,
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_lab_order_appointment1_idx` (`appointment_id`,`patient_id`),
  KEY `fk_lab_order_staff1_idx` (`staff_id`),
  CONSTRAINT `fk_lab_order_appointment1` FOREIGN KEY (`appointment_id`, `patient_id`) REFERENCES `appointment` (`appointment_id`, `patient_id`),
  CONSTRAINT `fk_lab_order_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- TABLE STRUCTURE FOR: lab_result
--

DROP TABLE IF EXISTS `lab_result`;

CREATE TABLE `lab_result` (
  `result_id` int(11) NOT NULL,
  `tests` mediumtext DEFAULT NULL,
  `results` mediumtext DEFAULT NULL,
  `notes` tinytext DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`result_id`,`order_id`),
  KEY `fk_lab_result_lab_order1_idx` (`order_id`),
  CONSTRAINT `fk_lab_result_lab_order1` FOREIGN KEY (`order_id`) REFERENCES `lab_order` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- 
-- TABLE STRUCTURE FOR: patient
-- 

DROP TABLE IF EXISTS `patient`;

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `address` tinytext NOT NULL,
  `emergency_contact` varchar(45) DEFAULT NULL,
  `medical_data` varchar(45) DEFAULT NULL,
  `billing_info` varchar(45) DEFAULT NULL,
  `insurance_info` varchar(45) DEFAULT NULL,
  `ssn` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`patient_id`,`user_id`),
  KEY `fk_patient_user_idx` (`user_id`),
  CONSTRAINT `fk_patient_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (571192, '1998-12-07', '1', '65926 Schultz Springs\nKatrineborough, FL 96778-4252', '299.248.4450x2185', 'Aut nobis quia voluptatem quidem.', 'Minus eos itaque ipsum aut ipsum.', 'Asperiores aut expedita ipsum minima.', 0, '686999404');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (981859, '2025-03-14', '2', '47142 Lenny Ways Suite 213\nTreton, MD 33574-6063', '1-116-444-6994', 'Amet porro est iure nisi.', 'Laboriosam eos possimus magni est non.', 'Est aut suscipit aut odio ea.', 53, '103661916');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (1262631, '2021-12-14', '3', '658 Block Station\nReichertshire, CO 64032-7689', '08769339970', 'Iusto magni sint nostrum ut minima.', 'Quasi eos repellendus occaecati.', 'Velit assumenda accusamus rerum at dolor.', 50, '10964366');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (1387836, '2002-11-27', '2', '042 Kali Parkway Suite 129\nWilkinsonton, VA 38707', '(010)216-0605x845', 'Id officia modi quas.', 'Voluptas sit sequi quas et nisi.', 'Distinctio corporis eum ut delectus.', 1, '573224732');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (1757608, '2021-04-11', '2', '682 King Garden\nGusikowskifort, WI 45387', '(710)723-6471', 'Ut distinctio et vel delectus animi et.', 'Consequatur nesciunt eos beatae numquam.', 'Rem quisquam dolor sequi est.', 1, '488645518');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (2057126, '2003-02-06', '1', '2468 Marvin Extensions\nLake Neldaport, KS 44129-9722', '06945856554', 'Cupiditate sunt aspernatur quod quasi.', 'Voluptates veniam a ex ab ipsam molestiae.', 'Odio omnis excepturi et voluptatem.', 0, '533754909');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (3368421, '1979-07-04', '1', '0749 Jerde Divide\nNorth Brenna, MD 17009', '+14(0)6573122383', 'Totam pariatur non dolorem.', 'Ipsum quia ullam et natus est.', 'Doloribus temporibus quis a.', 2147483647, '961372299');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (4064521, '2020-11-10', '1', '018 Makenzie Manor\nNew Carey, KY 83043-5857', '1-429-559-1625', 'Vel voluptatibus vero quam autem.', 'Natus delectus quam et.', 'Non natus delectus ea dolores unde eveniet.', 449, '572406080');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (4254633, '2000-10-18', '3', '95345 Josiah Harbor Suite 384\nNorth Buddymouth, DE 84355', '346-141-0285x12710', 'Dignissimos doloremque maiores ut qui.', 'Placeat vitae doloremque facere non.', 'Dolores omnis nobis sit reiciendis.', 705, '948334224');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (4327444, '2018-11-21', '1', '267 Kirlin Springs Suite 387\nNorth Missourifort, HI 73759', '+48(2)0670163862', 'Dolor voluptatem odit velit beatae amet.', 'Quia quae aut nam fugit necessitatibus.', 'Et ipsam voluptatem nihil sint dolorum.', 1, '521101714');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (4432435, '1991-06-11', '1', '9161 Emmet River Suite 496\nMadelynfort, VT 42348-7054', '699.612.3451x0076', 'Dolor voluptatum est blanditiis inventore.', 'Ut aut eum mollitia.', 'Aliquam sed expedita eligendi et.', 0, '401777386');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (4475621, '1980-01-20', '3', '012 Sawayn Tunnel\nNoemiside, OH 11468', '+56(3)7212172360', 'Dignissimos a modi expedita ea at.', 'Ut voluptates ratione eligendi sed sit.', 'Et vel sunt ipsa sunt nam unde aut.', 15, '60650996');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (5412155, '1978-09-28', '2', '5402 Wilderman Spring\nNorth Ubaldoburgh, NH 03670-6935', '780.399.4701x488', 'Sunt rerum sed cum.', 'Rerum rerum consequuntur id.', 'Animi autem minus ut et iure atque.', 743236, '704096819');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (5911056, '2002-07-05', '2', '716 Hilll Forks\nJuliabury, VT 74810', '956.945.9538x7850', 'Hic et alias deserunt est harum dolorum.', 'Quod quaerat harum perspiciatis dolores.', 'Nisi eligendi corrupti libero illo.', 0, '429582243');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (5960523, '2019-04-01', '3', '74941 Judah Ferry\nWest Robbtown, VA 45895-4931', '858-764-6601x101', 'Illum a unde ducimus sed aut sequi qui.', 'Corrupti dignissimos totam qui.', 'Qui quo dolores earum sint modi odit.', 505350, '72204256');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (6524232, '1993-11-29', '1', '194 Velda Junctions\nEast Rebeka, CA 54551-4168', '840-970-8612x195', 'Et et dolorum dolor sed aut in.', 'Consequatur doloremque eius id dolorum.', 'Et voluptas dicta ullam perferendis labore.', 771, '98643458');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (6858589, '2015-11-21', '3', '05596 Corwin Curve Suite 754\nBergstromville, DC 37226', '(948)797-6087', 'Corporis nulla adipisci et illo corporis.', 'Doloremque repellendus cupiditate quae.', 'Autem qui impedit impedit quae.', 2147483647, '655529640');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (8410501, '2023-04-04', '3', '4804 Shania View\nPort Deonshire, LA 37301', '+02(0)4107033123', 'Id et dolor numquam id ut quo dolorum rem.', 'Libero quia quidem aut illo illo est.', 'Perferendis ducimus minima qui et.', 53, '416422253');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (9590994, '1982-05-24', '1', '05848 Rau Shoal\nNew Florian, NE 80390-7258', '08991801269', 'Voluptas debitis ipsam quo consectetur ut.', 'Libero sit corrupti ut quaerat illo neque.', 'Vel qui tempore autem aliquam quasi.', 520, '385931281');
INSERT INTO `patient` (`patient_id`, `date_of_birth`, `sex`, `address`, `emergency_contact`, `medical_data`, `billing_info`, `insurance_info`, `ssn`, `user_id`) VALUES (9969419, '2004-07-31', '1', '31490 Conn Tunnel Apt. 536\nAurelioshire, UT 66524-7681', '825-063-1165x56606', 'Dolorum delectus quo placeat est et.', 'Quis nemo velit repudiandae ipsa.', 'Ut sunt et minima iure quas ex.', 1, '918438895');


--
-- TABLE STRUCTURE FOR: prescription
--

DROP TABLE IF EXISTS `prescription`;

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date_prescribed` date DEFAULT NULL,
  `dose` varchar(45) DEFAULT NULL,
  `dosage` varchar(45) DEFAULT NULL,
  `refill_time` varchar(45) DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  PRIMARY KEY (`prescription_id`),
  KEY `fk_prescription_patient1_idx` (`patient_id`),
  KEY `fk_prescription_staff1_idx` (`staff_id`),
  KEY `fk_prescription_bill1_idx` (`bill_id`),
  CONSTRAINT `fk_prescription_bill1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`),
  CONSTRAINT `fk_prescription_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  CONSTRAINT `fk_prescription_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (1084395, 'ex', '2022-10-16', '2414', 'Quae provident quas sequi dolore est.', '2004-01-08', 1757608, 20350543, 155514);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (1919311, 'alias', '2005-10-02', '381', 'Odit quis cumque dolor accusamus.', '1981-08-13', 6858589, 83875809, 779853);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (2422398, 'at', '1994-01-03', '967', 'Aut est aut veritatis placeat.', '2008-09-15', 5412155, 73673923, 580307);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (2434815, 'aliquam', '2015-08-10', '1548', 'Deleniti dolores accusantium dicta itaque sit', '2015-03-04', 5911056, 77505062, 605952);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (2704489, 'et', '1984-04-18', '1414', 'Expedita voluptas qui voluptas nobis.', '2014-04-08', 8410501, 91241058, 788936);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (3205417, 'enim', '2020-04-08', '2484', 'Sed omnis aut aliquid eos.', '1978-08-27', 6524232, 82787955, 678869);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (4026756, 'voluptate', '1999-12-04', '2340', 'Odit animi quidem placeat quia dignissimos nu', '2024-10-30', 9590994, 92472169, 956592);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (6354630, 'est', '1977-10-25', '1061', 'Neque est necessitatibus porro a dolores.', '1996-09-13', 4475621, 73579264, 577832);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (6617073, 'illo', '2015-04-02', '1683', 'Dignissimos adipisci natus culpa odio qui ass', '2017-11-30', 3368421, 36076157, 270449);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (6675052, 'esse', '2003-10-27', '2141', 'Voluptas dolor unde et incidunt impedit.', '1970-07-08', 4432435, 69455541, 501402);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (6886751, 'at', '1996-10-11', '3463', 'Eos cupiditate molestiae est odio et ipsam.', '2006-06-29', 1262631, 19289979, 123138);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (7004325, 'possimus', '2019-05-08', '3455', 'Soluta enim mollitia ea sint.', '2017-09-16', 5960523, 81646647, 616210);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (7033739, 'dolor', '1986-08-03', '3751', 'Error et voluptas est quo ut beatae.', '1973-09-28', 4327444, 65980927, 412926);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (7097942, 'accusamus', '1970-05-23', '2947', 'Cum soluta cum pariatur.', '2016-07-22', 981859, 17352871, 89581);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (7142249, 'voluptates', '1995-09-08', '2339', 'Error qui perferendis perspiciatis consequatu', '2022-01-28', 2057126, 31126862, 216797);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (7821881, 'nisi', '1973-01-17', '1633', 'Eum sequi delectus quidem voluptas.', '1989-07-12', 4254633, 45580181, 392927);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (8246222, 'expedita', '1999-10-23', '2449', 'Rem praesentium enim nesciunt modi amet.', '1972-12-24', 1387836, 19915689, 145397);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (8305021, 'corrupti', '1996-01-24', '2801', 'Et debitis esse recusandae.', '2010-03-20', 9969419, 98640156, 957682);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (8651519, 'sunt', '2015-04-30', '2439', 'Maiores est voluptatem similique quis alias n', '1997-04-27', 571192, 4867287, 23580);
INSERT INTO `prescription` (`prescription_id`, `name`, `date_prescribed`, `dose`, `dosage`, `refill_time`, `patient_id`, `staff_id`, `bill_id`) VALUES (9508923, 'accusamus', '1973-02-01', '836', 'Ut voluptate sint non velit ea.', '2015-09-21', 4064521, 41715661, 375968);


--
-- TABLE STRUCTURE FOR: reminder
--

DROP TABLE IF EXISTS `reminder`;

CREATE TABLE `reminder` (
  `reminder_id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  PRIMARY KEY (`reminder_id`,`appointment_id`,`patient_id`),
  KEY `fk_reminder_appointment1_idx` (`appointment_id`,`patient_id`),
  CONSTRAINT `fk_reminder_appointment1` FOREIGN KEY (`appointment_id`, `patient_id`) REFERENCES `appointment` (`appointment_id`, `patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- TABLE STRUCTURE FOR: shift
--

DROP TABLE IF EXISTS `shift`;

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `working` binary(1) DEFAULT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`shift_id`,`staff_id`),
  KEY `fk_shift_staff1_idx` (`staff_id`),
  CONSTRAINT `fk_shift_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (898566, '1985-06-24 04:42:31', '1989-02-28 03:55:30', '1', 91241058);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (1384517, '1997-04-02 16:39:22', '1991-07-27 02:32:12', '1', 17352871);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (1512117, '1990-03-15 14:57:17', '1987-02-18 15:27:08', '\0', 77505062);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (2168412, '2019-05-26 05:21:17', '2010-08-27 03:42:03', '1', 19289979);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (2887666, '1988-05-19 00:31:44', '1998-08-11 04:02:55', '1', 31126862);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (3077455, '2002-06-21 23:04:32', '2004-07-13 00:39:13', '\0', 45580181);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (3169035, '1978-11-25 05:25:34', '2001-07-22 09:56:09', '1', 20350543);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (3221305, '1985-07-06 10:42:06', '1990-01-27 04:01:28', '1', 98640156);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (5965817, '1999-10-10 20:06:09', '2010-01-22 03:28:31', '1', 82787955);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (7149448, '1984-01-11 23:45:27', '1989-05-28 12:56:04', '\0', 4867287);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (7512931, '1994-08-21 04:44:07', '1980-12-27 00:49:03', '1', 41715661);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (7732943, '1997-09-22 20:49:07', '1977-04-01 04:40:28', '\0', 69455541);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (7969747, '2001-10-14 12:18:07', '1981-12-20 09:19:07', '\0', 65980927);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (8035591, '1987-03-02 13:10:43', '1984-03-13 20:30:29', '1', 81646647);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (8746282, '1983-01-13 15:06:29', '2022-06-23 01:33:29', '\0', 83875809);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (8861596, '2020-09-22 19:29:55', '1996-04-13 21:30:58', '\0', 36076157);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (9356655, '1979-03-22 00:12:13', '1973-03-30 21:36:06', '\0', 73673923);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (9413884, '1992-09-14 21:11:55', '2015-01-23 03:22:43', '1', 19915689);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (9461830, '1992-02-14 14:59:31', '1995-02-12 12:13:59', '\0', 73579264);
INSERT INTO `shift` (`shift_id`, `start_time`, `end_time`, `working`, `staff_id`) VALUES (9781521, '2008-09-28 06:07:29', '2018-03-15 14:37:57', '\0', 92472169);


--
-- TABLE STRUCTURE FOR: staff
--

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `employee_type` varchar(45) DEFAULT NULL,
  `date_employed` date DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`staff_id`,`user_id`),
  KEY `fk_staff_user1_idx` (`user_id`),
  CONSTRAINT `fk_staff_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (4867287, 'c', '1994-10-22', '103661916');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (17352871, 'c', '2016-08-28', '918438895');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (19289979, 'c', '2003-08-12', '655529640');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (19915689, 'c', '1996-03-19', '429582243');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (20350543, 'a', '1997-05-25', '72204256');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (31126862, 'c', '1995-12-24', '385931281');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (36076157, 'c', '2009-10-05', '573224732');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (41715661, 'a', '2009-02-20', '572406080');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (45580181, 'a', '1989-03-21', '98643458');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (65980927, 'a', '1990-11-22', '416422253');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (69455541, 'b', '2019-03-19', '533754909');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (73579264, 'c', '1979-10-21', '686999404');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (73673923, 'a', '2007-02-13', '521101714');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (77505062, 'b', '2003-10-21', '488645518');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (81646647, 'c', '2010-07-21', '961372299');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (82787955, 'c', '1989-02-25', '60650996');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (83875809, 'a', '2017-12-22', '401777386');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (91241058, 'b', '2017-03-23', '704096819');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (92472169, 'c', '2005-02-02', '948334224');
INSERT INTO `staff` (`staff_id`, `employee_type`, `date_employed`, `user_id`) VALUES (98640156, 'c', '2011-09-09', '10964366');


--
-- TABLE STRUCTURE FOR: user
--

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
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

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('10964366', 'Precious', 'Moen', '0', 'powlowski.frederik@example.com', 'weldon.thompson', '200eea0ff1ccbacfa5dd6a65ff3c5b812290dd6977fac89aebbf33e02329', 'Atque suscipit voluptatem harum ipsum sit quam temporibus. Aut voluptas occaecati et.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('60650996', 'Telly', 'Rowe', '36', 'keenan.kuphal@example.net', 'seamus.gaylord', '93e9e4e39288d7a947df87845f3ad7fbeb5e9f217a72458df63bf7670503', 'Nisi voluptas quisquam ut non omnis mollitia cum pariatur. Voluptatem ipsa nulla illum placeat. Enim non omnis possimus voluptatem sunt est ut. In molestiae nihil delectus temporibus necessitatibus.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('72204256', 'Danny', 'Gislason', '1', 'kolby01@example.com', 'bframi', '1aa1c93426aad63b89546dc9780ce6b0b667f1eb8d4a2d20c6e508cd4f15', 'Delectus ut animi quia cupiditate qui. Sunt voluptatibus sit non assumenda modi veniam atque nesciunt. Labore et quis sed.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('98643458', 'Pinkie', 'Christiansen', '169745', 'roob.laurine@example.net', 'josefa.sauer', 'a3f34b13aa091bb56d37f55a44d3a6febb4a66f3f6d965aed36d13a2afb8', 'Similique cupiditate sint eos provident laboriosam et. Quae minus tempora saepe dolores incidunt sit blanditiis. Nobis et et sunt qui laboriosam. Ducimus vel beatae eum repudiandae.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('103661916', 'Bobby', 'Volkman', '11', 'stone.kuhlman@example.com', 'larson.lilyan', '274391fd7b94e4f268deecfcff2f2ca08fa4feec86bc984abfaa00d793b9', 'Sequi corporis sed sit nesciunt corporis deleniti. Quam soluta consequatur nesciunt quos. Accusantium quae asperiores ex nostrum ab. Eum facere eveniet ut cum.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('385931281', 'Gerhard', 'Schroeder', '64', 'ismael.okuneva@example.com', 'corwin.keon', 'f3a59d98d6551a8361f318713c9b82e1d5c706b4f2f70d2262808b9a2384', 'Libero culpa aliquam illum earum inventore. Saepe consequatur earum nostrum porro qui et. Maxime nemo autem quia laborum rerum aperiam placeat.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('401777386', 'Horacio', 'Wintheiser', '1', 'jessyca.schmitt@example.com', 'thelma63', 'd455ae3ee25e7c7d41da3bb5651d9bb91b1ed55eefe2951d77792a07a9d4', 'Nulla quasi ipsum nostrum atque pariatur. Voluptates est minima voluptatum et sequi. Sint rerum ab voluptatem assumenda ad laudantium mollitia.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('416422253', 'Jamar', 'Feest', '112848', 'destini.paucek@example.com', 'raynor.keagan', 'e43a81feb7589e65c65a9bae2b661256199937b603f7467db7d52b64634c', 'Eos dolores ex voluptas ut iusto. Autem velit facilis aut. Quod tempora cupiditate quis ut dolorem recusandae.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('429582243', 'Otho', 'Feest', '983690', 'waelchi.lupe@example.net', 'murphy.augustine', '56f6ce93c4dd4ad02217fb25e308eb665a31d33120bab1832a3ed7ede68f', 'Corporis vero tenetur occaecati repudiandae enim eius sit. Fugiat velit beatae nihil culpa autem non aut. Omnis et voluptas odio id. Est minus ut consequatur est.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('488645518', 'Felicity', 'Douglas', '1', 'tmcdermott@example.org', 'rebecca.altenwerth', '84ed3d935626210c26103ade6d6295c4a5f1e3450a62c94df73da5359f05', 'Aut non harum in recusandae dignissimos quod rerum. Non qui vel dolorem qui. Atque eos nihil temporibus molestiae fugit voluptatum.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('521101714', 'Sammy', 'Hickle', '864656', 'rebeca17@example.org', 'luz37', 'e3481765b1cdc542819ec68e40870873ce05d879d2d096b7a2e307b7ed8f', 'Odit odit nihil qui. Culpa iste maxime nobis delectus dolorem placeat. Est suscipit aut inventore corporis dolorem est quo.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('533754909', 'Javier', 'Pfannerstill', '1', 'jovan38@example.org', 'gerry.raynor', '7b2a1c37c8a94a037c03b1ade7375ac5283487e68c21d068ca99824b730d', 'Et ut nobis temporibus. Optio alias atque est ea consequatur mollitia occaecati. Qui odit beatae in molestiae. Consequatur dolor fugiat animi expedita quod.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('572406080', 'Lucie', 'Beer', '478', 'davion.wuckert@example.net', 'marion17', 'f1c5a491870169d3b12f07b972ea42dba8cccce0ebe1d479654d1721e95f', 'Explicabo itaque cupiditate rem similique. Accusantium quia minima et sit qui molestiae. Delectus vero facere ea cum odio error esse. Voluptatem nisi officia est est rem exercitationem maiores.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('573224732', 'Green', 'Jacobi', '480', 'simone41@example.com', 'vrempel', 'e0e08d2691dfddc2f5791728a88c952aa7a6c40d57284decbef2274510e7', 'Reprehenderit voluptates odio recusandae laudantium laboriosam. Est assumenda sunt in iusto doloremque consequuntur omnis.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('655529640', 'Breana', 'D`Amore', '513', 'mabel55@example.net', 'mattie.bergstrom', '34f351bb41cac0e1e134973eef879d2e1ee99e94a975ddf9f43c8f0527fe', 'Eaque fuga inventore et non. Repudiandae quisquam ab illo vitae quas qui. Quis molestiae eos repudiandae aut magnam. Voluptatem consequatur hic labore molestiae dolore.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('686999404', 'Raymond', 'Ziemann', '4096517326', 'abe01@example.com', 'freda70', '5513cf44185c626fbbb27a2791177ca3c0e695b7f872ab5bf8df16b468f1', 'Rerum incidunt ratione veritatis voluptatem qui libero corrupti. Nisi dolores error commodi est. Quasi qui est quo accusamus sit. Sunt sunt totam et aut reprehenderit fuga est.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('704096819', 'Cecelia', 'Prohaska', '1', 'verla.sawayn@example.net', 'declan78', 'cd2c5a763c9ff29bfad5b297db97d8e24aeca942394bb270176bb488be10', 'Tempore ut autem sit eum velit non. Repellendus et dicta velit aut excepturi blanditiis. Rerum commodi quia asperiores eveniet. Laborum aut repellat sunt perspiciatis.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('918438895', 'Amelia', 'Wisozk', '548071', 'xwisoky@example.org', 'maya94', 'ba6cc67f11caef96e63f4e49794047991494671c36e63e58f58bea6851f8', 'Facere ea alias exercitationem quisquam qui est aspernatur. Autem natus eveniet nihil nam rerum qui debitis.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('948334224', 'Loma', 'Mann', '470', 'lfeest@example.org', 'lehner.charlotte', '3c551b33681efa14d769bc419dfeb5d7d38ae9fe9b94757e49741adec46a', 'Illo hic officia libero iure tenetur. Quis pariatur voluptates et dolorem officia dignissimos ea.', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`, `username`, `password_hash`, `bio`, `profile_pic`) VALUES ('961372299', 'Clinton', 'Schuster', '99375', 'rubie37@example.com', 'cale.strosin', '6a50b2a64104880c5951a7ba2e0d54caedc137b1b48c56cb66debb630914', 'Nihil quia cupiditate tenetur numquam. Earum vero et rerum autem. Voluptates fugiat magnam est perferendis libero id voluptas. Corporis dolores non dolorem voluptas.', NULL);


--
-- TABLE STRUCTURE FOR: user_token
--

DROP TABLE IF EXISTS `user_token`;

CREATE TABLE `user_token` (
  `token_id` int(11) NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashed_validator` varchar(255) NOT NULL,
  `expiry` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`token_id`),
  KEY `fk_user_token_user1_idx` (`user_id`),
  CONSTRAINT `fk_user_token_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (227982, 'e4cb4a6fc17f5e3e28f6d685409c6e28945b89b728f65bc79e926694a6100428', 'a8437116cc019bc0b4b2dcca0cc585efb7bd226a96e6d4eaf3e7a99bdb5a7a63', '1975-09-04 22:48:19', '521101714');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (932765, '848ca273df3a414efbb11b9b4e3b49a678722d652fae763a14d794c21c137d4a', '8a17ee6c3a739f8300c442fd10a6876c427a67464cf20c1554c6db85ad30ff2d', '1997-05-16 11:08:38', '918438895');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (1752110, 'fb79de7034f3e45381b9438250cc990c38ecd3508ebd14265732bcb4489b945a', 'e9afa1095d33e7d2d2f7a5ab7570be0d550e8f1ecadb1d63cfe1da0984ff9fa4', '1995-04-18 05:25:24', '385931281');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (1782463, '2eb0fc26e40a7a24d59d1ef9b04809e9679da74fcea1bea17810ba342d848f58', '4541bfad97c01619c94adae72248e8ebd873122084d3631e6acdfda2fddc2f78', '2006-03-14 13:16:12', '655529640');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (1789065, 'ec4cf225278a71d7dc5d33646a66197df120516ac1ea842b86ab81963edf25c8', '87f701f17ca2e4dd385087856634263d34bbdb70594cae4730c02198c3dc6f61', '1973-03-15 14:19:30', '961372299');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (2279373, '2e58847f7a711f40197590c64896bc31d9c3c34d1c29d38e24f85a560157f3ec', 'a983c40e679e07c232908863be6a50a87a1d135fa318a962f5c95c4bca0351cf', '1999-08-10 00:08:13', '572406080');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (4203605, '5a3b4f7775f793840cb4e50412e1f382c71d512452095f0c25101dabb8d9671f', 'c1df7840c5d0b5026ef879a6041f46d6292a08a19dbc4ac4b2dc75a031ea64f2', '1978-08-26 19:22:59', '98643458');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (4568958, '87709a283ee36e326c4a941d8c149aa6fc40829d50a9986d3efbef65a3be2840', '38ebcac13791eb9a881132e2048ea84549018dd772f9a701a4cf0e482e665e04', '1972-07-04 23:37:50', '533754909');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (4795474, '9f7368d085515f0afec958fa9bbf2e9724a4e4069e4a38dc78244e3b53bab014', 'd0a0187397089fa36cb3cd7942523d868e93a5483a2739e50e4e564122636be1', '2011-10-14 11:42:25', '416422253');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (5272395, '273700da2d4485d82003f89e5c0b3ab7107801efdcce67c9797135c33756bdf0', '2b2fe77138706f1d2099c24a6211f0b6bae66be62f45d3cdcbb506a12cc90f49', '1975-11-27 15:58:43', '573224732');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (6340729, 'c8f9bb6d7aaf1f8829e3423b49b11ee69a075f24f8eb73d33fa55cb7084429d1', '0f69441190c78a3f3aca1ab60f2963375a6d4a7fa75cec76f7f96d52a5c002d3', '2009-07-31 21:14:37', '686999404');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (6601198, '36b8f820e78af122bba7c07b121f80cd50072f10d1fce19dc8e2c1a0175cf67f', '909bf05b0fa4f89c7960efffaa650e6b63466c53d81ce5a82de0459aea8c57b5', '2012-09-13 12:12:53', '103661916');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (6682389, '2ebb418a8bac6d12042d3b2bcc9ec2fb9758bdc460ea11f5f6fceb598b28a8a2', '3c00ab197fbdac80ca88d20bda2971a3ba2638dae9e391bda1206c40b6dea9a2', '1975-08-30 11:14:38', '10964366');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (7091356, 'c0f36c1dd8e15bd1e471f0c985332359cafb50be89f18ebe6d48002f2bfae328', '2425f2daedc5e888d62e2dc7224fd2a90b420f289cf328d212c702dd7038817a', '2012-10-08 17:46:54', '72204256');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (8458953, 'f43e706471d8818f90167ff7a8544278f8218f38ddc56b508f22873cc576e592', '9e7cc480ab500c0951226b737d7bf6c7e82ee3892c88fe2421656748b049495a', '1985-03-29 22:52:10', '60650996');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (8807251, '470ddedacbdd4995f52dd238bd8a23d347964f29351146b2ab853b888182adf6', 'cee473368ab5f9615d2d7a9b6b05f8dadf1b8178b9dce61d96066dd00b75c8f4', '2024-05-31 17:39:35', '401777386');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (8860208, 'e8447772f7d1c489b6827902e6b23645c3645a3220020f61d2a262ea418376f6', '5bd7695add9c31592ad4ed999b1152c185199b44fe94bf160dda8fde8c7f6c15', '2020-02-27 15:16:14', '429582243');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (9556057, 'eceb02177b6cf34fdba550f8fca1c3c77d931cafad106691af76578e317483d2', 'fef798b4e338670e5c427907f6ab037ec25a71fec41f3ae0f316149ba552cc97', '1977-01-10 02:20:43', '948334224');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (9698152, 'e70275d14b377ae6dc7f67a7ef40cbd2babcafd9f9f4a97be7e5442b044aa477', 'c7acae22b6672ad0b9c0c973d734cb029aa59bda7dc06e0cfdc6bd15cd0aa7cf', '2008-12-06 02:31:51', '488645518');
INSERT INTO `user_token` (`token_id`, `selector`, `hashed_validator`, `expiry`, `user_id`) VALUES (9832882, '42c8fce4baa118cc03aa3be974ddb82825465df0ca06c23a99bd74d68a61127a', 'a0d2f1db37b67995be1f9258911157dd9a0423cfd16517608a189fc311d2ec6c', '1974-04-29 02:15:25', '704096819');


--
-- TABLE STRUCTURE FOR: visitor
--

DROP TABLE IF EXISTS `visitor`;

CREATE TABLE `visitor` (
  `visitor_id` int(11) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`visitor_id`,`user_id`),
  KEY `fk_visitor_user1_idx` (`user_id`),
  CONSTRAINT `fk_visitor_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
