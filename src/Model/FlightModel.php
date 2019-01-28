<?php

namespace App\Model;

use Helper\Core\Model;

class FlightModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($name, $departureCity, $arrivalCity, $pilot, $airplane)
    {
        return $this
            ->prepareSql('INSERT INTO flight(name, departure_city_id, arrival_city_id, pilot_id, airplane_id, date, enabled) VALUES(?, ?, ?, ?, ?, ?, ?)')
            ->execute([$name, $departureCity, $arrivalCity, $pilot, $airplane,  $this->dateFormat, $this->enabled]);
    }

    public function edit($name, $departureCity, $arrivalCity, $pilot, $airplane, $id)
    {
        return $this
            ->prepareSql('UPDATE flight SET name = ?, departure_city_id = ?, arrival_city_id = ?, pilot_id = ?, airplane_id = ?, date = ?, enabled = ? where id = ?')
            ->execute([$name, $departureCity, $arrivalCity, $pilot, $airplane,  $this->dateFormat, $this->enabled, $id]);
    }

    public function findById($id)
    {
        $sql = $this->prepareSql('
            SELECT
            flight.id,
            flight.name,
            flight.departure_city_id,
            flight.arrival_city_id,
            flight.pilot_id,
            flight.airplane_id,
            city1.name as departure_city,
            city2.name as arrival_city,
            p.name as pilot_name,
            a.name as airplane_name,
            flight.date,
            flight.enabled
            FROM flight
            INNER JOIN city AS city1 ON city1.id = flight.departure_city_id
            INNER JOIN city AS city2 ON city2.id = flight.arrival_city_id
            INNER JOIN pilot AS p ON p.id = flight.pilot_id
            INNER JOIN airplane AS a ON a.id = flight.airplane_id
            WHERE flight.id = ?
        ');
        $sql->execute([$id]);

        return $sql->fetch(\PDO::FETCH_ASSOC);
    }


    public function listingWithPilotAndAirplane()
    {
        $sql = $this->prepareSql('
            SELECT 
            flight.id, 
            flight.name,
            city1.name as departure_city,
            city2.name as arrival_city,
            p.name as pilot_name,
            a.name as airplane_name,
            flight.date, 
            flight.enabled
            FROM flight 
            INNER JOIN city AS city1 ON city1.id = flight.departure_city_id 
            INNER JOIN city AS city2 ON city2.id = flight.arrival_city_id 
            INNER JOIN pilot AS p ON p.id = flight.pilot_id 
            INNER JOIN airplane AS a ON a.id = flight.airplane_id
        ');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function listingWithPilotAndAirplaneFront()
    {
        $sql = $this->prepareSql('
            SELECT 
            flight.id, 
            flight.name,
            city1.name as departure_city,
            city2.name as arrival_city,
            p.name as pilot_name,
            a.name as airplane_name,
            flight.date, 
            flight.enabled
            FROM flight 
            INNER JOIN city AS city1 ON city1.id = flight.departure_city_id 
            INNER JOIN city AS city2 ON city2.id = flight.arrival_city_id 
            INNER JOIN pilot AS p ON p.id = flight.pilot_id 
            INNER JOIN airplane AS a ON a.id = flight.airplane_id
        ');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($ids) {
        return $this
            ->prepareSql("DELETE FROM flight WHERE id IN ($ids)")
            ->execute([$ids]);
    }

    public function searchByTerm($term)
    {
        $sql = $this->prepareSql('
            SELECT 
            flight.id,
            flight.name,
            city1.name as departure_city,
            city2.name as arrival_city,
            p.name as pilot_name,
            a.name as airplane_name,
            flight.date, 
            flight.enabled
            FROM flight 
            INNER JOIN city AS city1 ON city1.id = flight.departure_city_id 
            INNER JOIN city AS city2 ON city2.id = flight.arrival_city_id 
            INNER JOIN pilot AS p ON p.id = flight.pilot_id 
            INNER JOIN airplane AS a ON a.id = flight.airplane_id
            LIKE %?%
        ');
        $sql->execute([$term]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
