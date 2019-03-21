<?php

namespace App\Manager;

use Helper\Sql\SqlFeature;

/**
 * Class AirplaneManager
 * @package App\Manager
 */
class AirplaneManager extends SqlFeature
{
    /**
     * @param $name
     * @param $capacityEconomic
     * @param $capacityBusiness
     * @param $capacityFirst
     * @param $capacity
     * @param $type_id
     * @return bool
     */
    public function insert($name, $capacityEconomic, $capacityBusiness, $capacityFirst, $capacity, $type_id)
    {
        return $this
            ->prepareSql('INSERT INTO air_base_airplane(name, capacity_economic, capacity_business, capacity_first, capacity, type_id, date, enabled) VALUES(?, ?, ?, ?, ?, ?, ?, ?)')
            ->execute([$name, $capacityEconomic, $capacityBusiness, $capacityFirst, $capacity, $type_id, $this->dateFormat, $this->enabled]);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $sql = $this->prepareSql('SELECT * FROM air_base_airplane');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function getNames()
    {
        $sql = $this->prepareSql('SELECT id, name FROM air_base_airplane');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $start
     * @param $limit
     * @return array
     */
    public function getAllWithRelationship()
    {
        $sql = $this->prepareSql('SELECT air_base_airplane.id, air_base_airplane.name, air_base_airplane.capacity_economic, air_base_airplane.capacity_business, air_base_airplane.capacity_first, air_base_airplane.capacity, air_base_type.name as type_name, air_base_airplane.date, air_base_airplane.enabled FROM air_base_airplane, air_base_type WHERE air_base_airplane.type_id = air_base_type.id');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function getAllWithRelationshipById()
    {
        $sql = $this->prepareSql('SELECT air_base_airplane.id  FROM air_base_airplane, type WHERE air_base_airplane.type_id = air_base_type.id');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
