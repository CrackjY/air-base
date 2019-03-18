<?php

namespace App\Manager;

use Helper\Sql\SqlFeature;

class AirplaneManager extends SqlFeature
{
    public function insert($name, $capacityEconomic, $capacityBusiness, $capacityFirst, $capacity, $type_id)
    {
        return $this
            ->prepareSql('INSERT INTO airplane(name, capacity_economic, capacity_business, capacity_first, capacity, type_id, date, enabled) VALUES(?, ?, ?, ?, ?, ?, ?, ?)')
            ->execute([$name, $capacityEconomic, $capacityBusiness, $capacityFirst, $capacity, $type_id, $this->dateFormat, $this->enabled]);
    }

    public function getAll()
    {
        $sql = $this->prepareSql('SELECT * FROM airplane');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getNames()
    {
        $sql = $this->prepareSql('SELECT id, name FROM airplane');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllWithRelationship($start, $limit)
    {
        $sql = $this->prepareSql('SELECT airplane.id, airplane.name as airplane_name, airplane.capacity_economic, airplane.capacity_business, airplane.capacity_first, airplane.capacity, type.name as type_name, airplane.date, airplane.enabled FROM airplane, type WHERE airplane.type_id = type.id ORDER BY airplane.id DESC LIMIT '.$start.','.$limit);
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllWithRelationshipById()
    {
        $sql = $this->prepareSql('SELECT airplane.id  FROM airplane, type WHERE airplane.type_id = type.id');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
