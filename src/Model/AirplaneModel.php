<?php

namespace App\Model;

use App\Manager\AirplaneManager;

class AirplaneModel
{
    private $airplaneManager;

    public function __construct()
    {
        $this->airplaneManager = new AirplaneManager();
    }

    public function newAirplane($name, $capacityEconomic, $capacityBusiness, $capacityFirst, $capacity, $type_id)
    {
        return $this->airplaneManager->insert($name, $capacityEconomic, $capacityBusiness, $capacityFirst, $capacity, $type_id);
    }

    public function findAll()
    {
        return $this->airplaneManager->getAll();
    }

    public function findNames()
    {
        return $this->airplaneManager->getNames();
    }

    public function findAllWithRelationship($start, $limit)
    {
        return $this->airplaneManager->getAllWithRelationship($start, $limit);
    }

    public function findAllWithRelationshipById()
    {
        return $this->airplaneManager->getAllWithRelationshipById();
    }
}
