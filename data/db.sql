DROP DATABASE IF EXISTS air_base;

CREATE DATABASE air_base CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP TABLE IF EXISTS `airplane`;
CREATE TABLE IF NOT EXISTS `airplane` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `capacity_economic` int(11) DEFAULT NULL,
  `capacity_business` int(11) DEFAULT NULL,
  `capacity_first` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_type_id` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `flight`;
CREATE TABLE IF NOT EXISTS `flight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `departure_city_id` int(11) DEFAULT NULL,
  `arrival_city_id` int(11) DEFAULT NULL,
  `date_of_departure` date DEFAULT NULL,
  `date_of_arrival` date DEFAULT NULL,
  `pilot_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `airplane_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_departure_city_id` (`departure_city_id`),
  KEY `fk_arrival_city_id` (`arrival_city_id`),
  KEY `fk_pilot_id` (`pilot_id`),
  KEY `fk_airplane_id` (`airplane_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

CREATE TABLE city (
	id int auto_increment primary key,
	name varchar(255),
	date datetime,
	enabled boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE pilot (
	id int auto_increment primary key,
	name varchar(255),
	address varchar(255),
	salary decimal(10, 2),
	date datetime,
	enabled boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE type (
	id int auto_increment primary key,
	name varchar(255),
	date datetime,
	enabled boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE class (
	id int auto_increment primary key,
	name varchar(255),
	date datetime,
	enabled boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE traveler (
	id int auto_increment primary key,
	name varchar(255),
	date datetime,
	enabled boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` int(20) DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` int(20) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `encrypt_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `firstname`, `lastname`, `pseudo`, `birth_date`, `adress`, `zip_code`, `city`, `phone_number`, `email`, `encrypt_password`, `date`, `enabled`) VALUES
(1, 'yassine', 'latti', 'crack', '03/08/1993', '3 boulevard', 71000, 'Macon', 768887944, 'yassine.latti@gmail.com', '$2y$10$ePDhdDkq8VMOy4S67KqWF.poT2XtWg3Wx3zjJGGMusOYHaAmMtuAy', '2019-01-28 10:01:03', 1);

INSERT INTO `flight` (`id`, `name`, `departure_city_id`, `arrival_city_id`, `date_of_departure`, `date_of_arrival`, `pilot_id`, `price`, `airplane_id`, `date`, `enabled`) VALUES
(23, 'doubai', 1, 2, '2019-01-01', '2019-01-03', 1, '300.00', 2, '2018-11-05 17:11:31', 1),
(24, 'constantine', 2, 3, '2019-01-04', '2019-01-05', 2, '412.00', 1, '2018-11-06 17:11:31', 1),
(25, 'alger', 3, 1, '2019-01-12', '2019-01-25', 1, '140.00', 2, '2018-11-07 17:11:31', 1);

INSERT INTO `airplane` (`id`, `name`, `capacity_economic`, `capacity_business`, `capacity_first`, `capacity`, `type_id`, `date`, `enabled`) VALUES
(1, 'a541', 70, 15, 15, 100, 2, '2019-01-28 08:01:08', 1),
(2, 'b572', 50, 30, 10, 90, 1, '2019-01-28 08:01:20', 1),
(3, 'a689', 25, 5, 15, 45, 2, '2019-01-28 08:01:35', 1),
(4, 'b427', 40, 10, 10, 60, 1, '2019-01-28 08:01:47', 1);

INSERT INTO `pilot` (`id`, `name`, `address`, `salary`, `date`, `enabled`) VALUES
(1, 'yassine', '3 rue de paris 71 000 mÃ¢con', '5000.00', '2019-01-28 08:01:23', 1),
(2, 'myriam', '10 rue de londre 40 001', '43.00', '2019-01-28 08:01:51', 1),
(3, 'max', '1 rue prÃ©sident kenedy', '6000.00', '2019-01-28 08:01:18', 1);
COMMIT;

INSERT INTO `class` (`id`, `name`, `date`, `enabled`) VALUES
(1, 'economic', '2019-01-02 00:00:00', 1),
(2, 'business', '2019-01-02 00:00:00', 1),
(3, 'first', '2019-01-02 00:00:00', 1);
COMMIT;

INSERT INTO `type` (`id`, `name`, `date`, `enabled`) VALUES
(1, 'boeing', '2019-01-28 08:01:43', 1),
(2, 'airbus', '2019-01-28 08:01:50', 1);
COMMIT;

INSERT INTO `city` (`id`, `name`, `date`, `enabled`) VALUES
(1, 'london', '2019-01-28 08:01:15', 1),
(2, 'paris', '2019-01-28 08:01:21', 1),
(3, 'lyon', '2019-01-28 08:01:27', 1);
COMMIT;

INSERT INTO `traveler` (`id`, `name`, `date`, `enabled`) VALUES
(1, 'adult', '2019-01-04 00:00:00', 1),
(2, 'children', '2019-01-04 00:00:00', 1),
(3, 'baby', '2019-01-04 00:00:00', 1);
COMMIT;

ALTER TABLE `airplane`
  ADD CONSTRAINT `fk_type_id` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE;
COMMIT;

ALTER TABLE `flight`
  ADD CONSTRAINT `fk_airplane_id` FOREIGN KEY (`airplane_id`) REFERENCES `airplane` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_arrival_city_id` FOREIGN KEY (`arrival_city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_departure_city_id` FOREIGN KEY (`departure_city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pilot_id` FOREIGN KEY (`pilot_id`) REFERENCES `pilot` (`id`) ON DELETE CASCADE;
COMMIT;

