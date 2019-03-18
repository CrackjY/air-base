<?php

namespace App\Model;

use Helper\Core\Model;

class FlightModel extends Model
{
    public function newFlight($name, $dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity, $pilot, $price, $airplane)
    {
        return $this->getFlightManager()->insert($name, $dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity, $pilot, $price, $airplane);
    }

    public function editFlight($name, $departureCity, $arrivalCity, $pilot, $airplane, $id)
    {
        return $this->getFlightManager()->edit($name, $departureCity, $arrivalCity, $pilot, $airplane, $id);
    }

    public function findAllWithRelationship()
    {
        return $this->getFlightManager()->getAllWithRelationship();
    }

    public function findById($id)
    {
        return $this->getFlightManager()->getById($id);
    }

    public function deleteFlight($ids)
    {
        return $this->getFlightManager()->delete($ids);
    }

    public function searchByTerm($term)
    {
        return $this->getFlightManager()->searchByTerm($term);
    }

    public function advancedSearch($dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity)
    {
        return $this->getFlightManager()->advancedSearch($dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity);
    }
}
