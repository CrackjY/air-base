<?php

namespace App\Model;

use App\Manager\FlightManager;

class FlightModel
{
    private $flightManager;

    public function __construct()
    {
        $this->flightManager = new FlightManager();
    }

    public function newFlight($name, $dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity, $pilot, $price, $airplane)
    {
        return $this->flightManager->insert($name, $dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity, $pilot, $price, $airplane);
    }

    public function editFlight($name, $departureCity, $arrivalCity, $pilot, $airplane, $id)
    {
        return $this->flightManager->edit($name, $departureCity, $arrivalCity, $pilot, $airplane, $id);
    }

    public function findAllWithRelationship()
    {
        return $this->flightManager->getAllWithRelationship();
    }

    public function findById($id)
    {
        return $this->flightManager->getById($id);
    }

    public function deleteFlight($ids)
    {
        return $this->flightManager->delete($ids);
    }

    public function searchByTerm($term)
    {
        return $this->flightManager->searchByTerm($term);
    }

    public function advancedSearch($dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity)
    {
        return $this->flightManager->advancedSearch($dateOfDeparture, $dateOfArrival, $departureCity, $arrivalCity);
    }
}
