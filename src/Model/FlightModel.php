<?php

namespace App\Model;

use Helper\Core\Model;

/**
 * Class FlightModel
 * @package App\Model
 */
class FlightModel extends Model
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
    public function newFlight($name, $dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity, $pilot, $price, $airplane)
    {
        return $this->getFlightManager()->insert($name, $dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity, $pilot, $price, $airplane);
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
    public function editFlight($name, $departureCity, $arrivalCity, $pilot, $airplane, $id)
    {
        return $this->getFlightManager()->edit($name, $departureCity, $arrivalCity, $pilot, $airplane, $id);
    }

    /**
     * @return array
     */
    public function findAllWithRelationship()
    {
        return $this->getFlightManager()->getAllWithRelationship();
    }

    /**
     * @param $term
     * @return array
     */
    public function searchByTerm($term)
    {
        return $this->getFlightManager()->searchByTerm($term);
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
        return $this->getFlightManager()->advancedSearch($dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->getFlightManager()->getById($id);
    }


    public function deleteFlight($ids)
    {
        return $this->getFlightManager()->delete($ids);
    }
}
