DROP DATABASE IF EXISTS air_base;

CREATE DATABASE air_base CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS `air_base_airplane` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255),
  `capacity_economic` int(11),
  `capacity_business` int(11),
  `capacity_first` int(11),
  `capacity` int(11),
  `type_id` int(11),
  `date` datetime,
  `enabled` tinyint(1),
  PRIMARY KEY (`id`),
  KEY `fk_type_id` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `air_base_flight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255),
  `departure_city_id` int(11),
  `arrival_city_id` int(11),
  `date_of_departure` date,
  `date_of_arrival` date,
  `pilot_id` int(11),
  `price` decimal(10,2),
  `airplane_id` int(11),
  `date` datetime,
  `enabled` tinyint(1),
  PRIMARY KEY (`id`),
  KEY `fk_departure_city_id` (`departure_city_id`),
  KEY `fk_arrival_city_id` (`arrival_city_id`),
  KEY `fk_pilot_id` (`pilot_id`),
  KEY `fk_airplane_id` (`airplane_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

CREATE TABLE air_base_city (
	id int auto_increment primary key,
	name varchar(255),
	date datetime,
	enabled boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE air_base_pilot (
	id int auto_increment primary key,
	name varchar(255),
	address varchar(255),
	salary decimal(10, 2),
	date datetime,
	enabled boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE air_base_type (
	id int auto_increment primary key,
	name varchar(255),
	date datetime,
	enabled boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE air_base_class (
	id int auto_increment primary key,
	name varchar(255),
	date datetime,
	enabled boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE air_base_traveler (
	id int auto_increment primary key,
	name varchar(255),
	date datetime,
	enabled boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `air_base_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255),
  `lastname` varchar(255),
  `pseudo` varchar(255),
  `birth_date` varchar(255),
  `address` varchar(255),
  `zip_code` varchar(255),
  `city` varchar(255),
  `phone_number` varchar(255),
  `email` varchar(255),
  `encrypt_password` varchar(255),
  `date` datetime,
  `enabled` tinyint(1),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE air_base_role (
	id int auto_increment primary key,
	name varchar(255),
	date datetime,
	enabled boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `air_base_user` (`id`, `firstname`, `lastname`, `pseudo`, `birth_date`, `address`, `zip_code`, `city`, `phone_number`, `email`, `encrypt_password`, `date`, `enabled`) VALUES
(1, 'yassine', 'latti', 'crack', '03/08/1993', '3 boulevard', 71000, 'Macon', 768887944, 'yassine.latti@gmail.com', '$2y$10$ePDhdDkq8VMOy4S67KqWF.poT2XtWg3Wx3zjJGGMusOYHaAmMtuAy', '2019-01-28 10:01:03', 1);

INSERT INTO `air_base_role` (`id`, `name`, `date`, `enabled`) VALUES
(1, 'ROLE_SUPER_ADMIN', '2019-03-27 07:03:03', 1),
(2, 'ROLE_MODERATOR', '2019-03-27 07:03:10', 1),
(3, 'ROLE_ADMIN', '2019-03-27 07:03:15', 1),
(4, 'ROLE_USER', '2019-03-27 07:03:27', 1);
COMMIT;

INSERT INTO `air_base_class` (`id`, `name`, `date`, `enabled`) VALUES
(1, 'economic', '2019-01-02 00:00:00', 1),
(2, 'business', '2019-01-02 00:00:00', 1),
(3, 'first', '2019-01-02 00:00:00', 1);
COMMIT;

INSERT INTO `air_base_traveler` (`id`, `name`, `date`, `enabled`) VALUES
(1, 'adult', '2019-01-04 00:00:00', 1),
(2, 'children', '2019-01-04 00:00:00', 1),
(3, 'baby', '2019-01-04 00:00:00', 1);
COMMIT;


INSERT INTO `air_base_city` (`id`, `name`, `date`, `enabled`) VALUES
(1, 'london', '2019-01-31 15:01:15', 1),
(2, 'miami', '2019-01-31 15:01:31', 1),
(3, 'los angeles', '2019-01-31 15:01:47', 1),
(4, 'paris', '2019-01-31 15:01:01', 1),
(5, 'milan', '2019-05-31 17:01:09', 1),
(6, 'mâcon', '2019-01-31 15:01:09', 1);
COMMIT;

INSERT INTO `air_base_pilot` (`id`, `name`, `address`, `salary`, `date`, `enabled`) VALUES
(1, 'yassine', '3 rue de paris 71 000 mÃ¢con', '5000.00', '2019-01-28 08:01:23', 1),
(2, 'myriam', '10 rue de londre 40 001', '43.00', '2019-01-28 08:01:51', 1),
(3, 'max', '1 rue prÃ©sident kenedy', '6000.00', '2019-01-28 08:01:18', 1);
COMMIT;

INSERT INTO `air_base_type` (`id`, `name`, `date`, `enabled`) VALUES
(1, 'airbus', '2019-01-31 15:01:18', 1),
(2, 'boeing', '2019-01-31 15:01:28', 1);
COMMIT;

INSERT INTO `air_base_airplane` (`id`, `name`, `capacity_economic`, `capacity_business`, `capacity_first`, `capacity`, `type_id`, `date`, `enabled`) VALUES
(1, 'a245', 150, 100, 100, 450, 1, '2019-01-31 15:01:56', 1),
(2, 'a625', 200, 150, 50, 400, 1, '2019-01-31 15:01:28', 1),
(3, 'b285', 203, 105, 40, 348, 2, '2019-01-31 15:01:53', 1),
(4, 'b625', 71, 69, 154, 294, 2, '2019-01-31 15:01:19', 1),
(5, 'a412', 366, 100, 50, 516, 1, '2019-01-31 15:01:55', 1);

INSERT INTO `air_base_flight` (`id`, `name`, `departure_city_id`, `arrival_city_id`, `date_of_departure`, `date_of_arrival`, `pilot_id`, `price`, `airplane_id`, `date`, `enabled`) VALUES
(1, 'etats unis', 3, 2, '2019-02-02', '2019-02-09', 1, '150.00', 1, '2019-01-31 15:01:58', 1),
(2, 'angleterre', 4, 1, '2019-02-16', '2019-02-26', 2, '410.00', 3, '2019-01-31 15:01:13', 1),
(3, 'france', 4, 5, '2019-03-01', '2019-03-06', 2, '90.00', 3, '2019-01-31 15:01:18', 1);

ALTER TABLE `air_base_airplane`
  ADD CONSTRAINT `fk_type_id` FOREIGN KEY (`type_id`) REFERENCES `air_base_type` (`id`) ON DELETE CASCADE;
COMMIT;

ALTER TABLE `air_base_flight`
  ADD CONSTRAINT `fk_airplane_id` FOREIGN KEY (`airplane_id`) REFERENCES `air_base_airplane` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_arrival_city_id` FOREIGN KEY (`arrival_city_id`) REFERENCES `air_base_city` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_departure_city_id` FOREIGN KEY (`departure_city_id`) REFERENCES `air_base_city` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pilot_id` FOREIGN KEY (`pilot_id`) REFERENCES `air_base_pilot` (`id`) ON DELETE CASCADE;
COMMIT;

