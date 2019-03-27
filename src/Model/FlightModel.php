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
     * @param $dateOfDeparture
     * @param $dateOfArrival
     * @param $departureCity
     * @param $arrivalCity
     * @param $pilot
     * @param $price
     * @param $airplane
     * @param $id
     * @return bool
     */
    public function editFlight($name, $dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity, $pilot, $price, $airplane, $id)
    {
        return $this->getFlightManager()->edit($name, $dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity, $pilot, $price, $airplane, $id);
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
     * @param $departureCity
     * @param $arrivalCity
     * @param $dateOfDeparture
     * @param $dateOfArrival
     * @return array
     */
    public function advancedSearch($departureCity, $arrivalCity, $dateOfDeparture, $dateOfArrival)
    {
        return $this->getFlightManager()->advancedSearch($departureCity, $arrivalCity, $dateOfDeparture, $dateOfArrival);
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
