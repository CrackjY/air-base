DROP DATABASE IF EXISTS air_base;

CREATE DATABASE air_base CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE airplane (
	id int auto_increment primary key,
	name varchar(255),
	capacity int,
	type_id int,
	date datetime,
	enabled boolean,
	constraint fk_type_id foreign key (type_id) references type(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE flight (
	id int auto_increment primary key,
	name varchar(255),
	departure_city_id int,
	arrival_city_id int,
	pilot_id int,
	airplane_id int,
	date datetime,
	enabled boolean,
	constraint fk_departure_city_id foreign key (departure_city_id) references city(id) ON DELETE CASCADE,
	constraint fk_arrival_city_id foreign key (arrival_city_id) references city(id) ON DELETE CASCADE,
	constraint fk_pilot_id foreign key (pilot_id) references pilot(id) ON DELETE CASCADE,
	constraint fk_airplane_id foreign key (airplane_id) references airplane(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

INSERT INTO flight(name, departure_city_id, arrival_city_id, pilot_id, airplane_id, date, enabled) VALUES
('test1', '1', '2', '1', '2', '2018-11-05 17:11:31', '1'),
('test2', '2', '3', '2', '1', '2018-11-05 17:11:31', '1'),
('test3', '3', '1', '1', '2', '2018-11-05 17:11:31', '1'),
('test4', '1', '3', '2', '3', '2018-11-05 17:11:31', '1'),
('test5', '2', '1', '1', '1', '2018-11-05 17:11:31', '1'),
('test6', '1', '3', '2', '2', '2018-11-05 17:11:31', '1'),
('test7', '2', '1', '1', '1', '2018-11-05 17:11:31', '1');
