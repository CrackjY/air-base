<?php

namespace App\Manager;

use Helper\Sql\SqlFeature;

/**
 * Class FlightManager
 * @package App\Manager
 */
class FlightManager extends SqlFeature
{
    /**
     * @param $name
     * @param $dateOfDeparture
     * @param $dateOfArrival
     * @param $departureCity
     * @param $arrivalCity
     * @param $pilot
     * @param $price
     * @param $airplane
     * @return bool
     */
    public function insert($name, $dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity, $pilot, $price, $airplane)
    {
        return $this
            ->prepareSql('
                INSERT INTO flight(name, date_of_departure, date_of_arrival, departure_city_id, arrival_city_id, pilot_id, price, airplane_id, date, enabled) 
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')
            ->execute([$name, $dateOfDeparture, $dateOfArrival,  $departureCity, $arrivalCity, $pilot,  $price, $airplane,  $this->dateFormat, $this->enabled]);
    }

    /**
     * @param $name
     * @param $departureCity
     * @param $arrivalCity
     * @param $pilot
     * @param $airplane
     * @param $id
     * @return bool
     */
    public function edit($name, $departureCity, $arrivalCity, $pilot, $airplane, $id)
    {
        return $this
            ->prepareSql('UPDATE flight SET name = ?, departure_city_id = ?, arrival_city_id = ?, pilot_id = ?, airplane_id = ?, date = ?, enabled = ? where id = ?')
            ->execute([$name, $departureCity, $arrivalCity, $pilot, $airplane,  $this->dateFormat, $this->enabled, $id]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $sql = $this->prepareSql('
            SELECT
            flight.id,
            flight.name,
            flight.date_of_departure,
            flight.date_of_arrival,
            flight.departure_city_id,
            flight.arrival_city_id,
            flight.pilot_id,
            flight.price,
            flight.airplane_id,
            city1.name as departure_city,
            city2.name as arrival_city,
            p.name as pilot_name,
            a.name as airplane_name,
            a.capacity_economic as capacity_economic,
            a.capacity_business as capacity_business,
            a.capacity_first as capacity_first,
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

    /**
     * @return array
     */
    public function getAllWithRelationship()
    {
        $sql = $this->prepareSql('
            SELECT 
            flight.id, 
            flight.name,
            flight.date_of_departure,
            flight.date_of_arrival,
            city1.name as departure_city,
            city2.name as arrival_city,
            p.name as pilot_name,
            flight.price,
            a.name as airplane_name,
            a.capacity,
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

    /**
     * @return array
     */
    public function getAllWithRelationshipFront()
    {
        $sql = $this->prepareSql('
            SELECT 
            flight.id, 
            flight.name,
            flight.date_of_departure,
            flight.date_of_arrival,
            flight.price,
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

    /**
     * @param $ids
     * @return bool
     */
    public function delete($ids) {
        return $this
            ->prepareSql("DELETE FROM flight WHERE id IN ($ids)")
            ->execute([$ids]);
    }

    public function searchByTerm($term)
    {
        if (!empty($term)) {
            $sql = $this->prepareSql('
                SELECT 
                flight.id,
                flight.name,
                flight.date_of_departure,
                flight.date_of_arrival,
                flight.price,
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
                WHERE flight.name
                LIKE ?
            ');
            $sql->execute(array('%'.$term.'%'));

            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    /**
     * @param $dateOfDeparture
     * @param $dateOfArrival
     * @param $departureCity
     * @param $arrivalCity
     * @return array
     */
    public function advancedSearch($dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity)
    {
        $sql = $this->prepareSql('
            SELECT 
            flight.id, 
            flight.name,
            flight.date_of_departure,
            flight.date_of_arrival,
            flight.price,
            city1.name as departure_city,
            city2.name as arrival_city,
            p.name as pilot_name,
            flight.price,
            a.name as airplane_name,
            a.capacity,
            flight.date,
            flight.enabled
            FROM flight
            INNER JOIN city AS city1 ON city1.id = flight.departure_city_id 
            INNER JOIN city AS city2 ON city2.id = flight.arrival_city_id 
            INNER JOIN pilot AS p ON p.id = flight.pilot_id 
            INNER JOIN airplane AS a ON a.id = flight.airplane_id
            WHERE flight.date_of_departure >= ?
            AND flight.date_of_arrival <= ?
            OR city1.name
            LIKE ?
            AND city2.name
            LIKE ?
        ');

        $sql->execute(array(
            $dateOfDeparture,
            $dateOfArrival,
            '%'.$departureCity.'%',
            '%'.$arrivalCity.'%'
        ));

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}