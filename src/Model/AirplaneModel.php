<?php

namespace App\Model;

use Helper\Core\Model;

class AirplaneModel extends Model
{
    public function newAirplane($name, $capacityEconomic, $capacityBusiness, $capacityFirst, $capacity, $type_id)
    {
        return $this->getAirplaneManager()->insert($name, $capacityEconomic, $capacityBusiness, $capacityFirst, $capacity, $type_id);
    }

    public function findAll()
    {
        return $this->getAirplaneManager()->getAll();
    }

    public function findNames()
    {
        return $this->getAirplaneManager()->getNames();
    }

    public function findAllWithRelationship($start, $limit)
    {
        return $this->getAirplaneManager()->getAllWithRelationship($start, $limit);
    }

    public function findAllWithRelationshipById()
    {
        return $this->getAirplaneManager()->getAllWithRelationshipById();
    }
}
