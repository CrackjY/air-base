CREATE TABLE air_base_city (
	id serial primary key,
	name varchar(255),
	date timestamp without time zone,
	enabled boolean
);

CREATE TABLE air_base_type (
	id serial primary key,
	name varchar(255),
	date timestamp without time zone,
	enabled boolean
);

CREATE TABLE air_base_traveler (
	id serial primary key,
	name varchar(255),
	date timestamp without time zone,
	enabled boolean
);

CREATE TABLE air_base_class (
	id serial primary key,
	name varchar(255),
	date timestamp without time zone,
	enabled boolean
);

CREATE TABLE air_base_pilot (
	id serial primary key,
	name varchar(255),
	address varchar(255),
	salary decimal(10, 2),
	date timestamp without time zone,
	enabled boolean
);

CREATE TABLE air_base_airplane (
  id serial primary key,
  name varchar(255),
  capacity_economic int,
  capacity_business int,
  capacity_first int,
  capacity int,
  type_id int,
  date timestamp without time zone,
  enabled boolean,
  foreign key (type_id) REFERENCES air_base_type (id)
);

CREATE TABLE air_base_flight (
  id serial primary key,
  name varchar(255),
  departure_city_id int,
  arrival_city_id int,
  date_of_departure timestamp without time zone,
  date_of_arrival timestamp without time zone,
  pilot_id int,
  price decimal(10,2),
  airplane_id int,
  date timestamp without time zone,
  enabled boolean,
  foreign key (departure_city_id) REFERENCES air_base_city (id),
  foreign key (arrival_city_id) REFERENCES air_base_city (id),
  foreign key (pilot_id) REFERENCES air_base_pilot (id),
  foreign key (airplane_id) REFERENCES air_base_airplane (id)
);

CREATE TABLE air_base_user (
  id serial primary key,
  firstname varchar(255),
  lastname varchar(255),
  pseudo varchar(255) unique,
  birth_date varchar(255),
  address varchar(255),
  zip_code varchar(255),
  city varchar(255),
  phone_number varchar(255),
  email varchar(255) unique,
  encrypt_password varchar(255),
  date timestamp without time zone,
  enabled boolean
);

INSERT INTO air_base_city (name, date, enabled) VALUES
('london', '2019-01-31 15:01:15', true),
('miami', '2019-01-31 15:01:31', true),
('los angeles', '2019-01-31 15:01:47', true),
('paris', '2019-01-31 15:01:01', true),
('milan', '2019-05-31 17:01:09', true),
('mâcon', '2019-01-31 15:01:09', true);
COMMIT;

INSERT INTO air_base_type (name, date, enabled) VALUES
('airbus', '2019-01-31 15:01:18', true),
('boeing', '2019-01-31 15:01:28', true);
COMMIT;

INSERT INTO air_base_traveler (name, date, enabled) VALUES
('adult', '2019-01-04 00:00:00', true),
('children', '2019-01-04 00:00:00', true),
('baby', '2019-01-04 00:00:00', true);
COMMIT;

INSERT INTO air_base_class (name, date, enabled) VALUES
('economic', '2019-01-02 00:00:00', true),
('business', '2019-01-02 00:00:00', true),
('first', '2019-01-02 00:00:00', true);
COMMIT;

INSERT INTO air_base_pilot (name, address, salary, date, enabled) VALUES
('yassine', '3 rue de paris 71 000 mâcon', '5000.00', '2019-01-28 08:01:23', true),
('myriam', '10 rue de londre 40 001', '43.00', '2019-01-28 08:01:51', true),
('max', '1 rue président kenedy', '6000.00', '2019-01-28 08:01:18', true);
COMMIT;

INSERT INTO air_base_airplane (name, capacity_economic, capacity_business, capacity_first, capacity, type_id, date, enabled) VALUES
('a245', 150, 100, 100, 450, 1, '2019-01-31 15:01:56', true),
('a625', 200, 150, 50, 400, 1, '2019-01-31 15:01:28', true),
('b285', 203, 105, 40, 348, 2, '2019-01-31 15:01:53', true),
('b625', 71, 69, 154, 294, 2, '2019-01-31 15:01:19', true),
('a412', 366, 100, 50, 516, 1, '2019-01-31 15:01:55', true);
COMMIT;

INSERT INTO air_base_flight (name, departure_city_id, arrival_city_id, date_of_departure, date_of_arrival, pilot_id, price, airplane_id, date, enabled) VALUES
('etats unis', 3, 2, '2019-02-02', '2019-02-09', 1, '150.00', 1, '2019-01-31 15:01:58', true),
('angleterre', 4, 1, '2019-02-16', '2019-02-26', 2, '410.00', 3, '2019-01-31 15:01:13', true),
('france', 4, 5, '2019-03-01', '2019-03-06', 2, '90.00', 3, '2019-01-31 15:01:18', true);
COMMIT;

INSERT INTO air_base_user (firstname, lastname, pseudo, birth_date, address, zip_code, city, phone_number, email, encrypt_password, date, enabled) VALUES
('yassine', 'latti', 'crack', '03/08/1993', '3 boulevard', 71000, 'Macon', 768887944, 'yassine.latti@gmail.com', '$2y$10$ePDhdDkq8VMOy4S67KqWF.poT2XtWg3Wx3zjJGGMusOYHaAmMtuAy', '2019-01-28 10:01:03', true);
COMMIT;
