<?php

namespace App\Model;

use Helper\Core\Model;

class AirplaneModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($name, $capacity, $type_id)
    {
        return $this
            ->prepareSql('INSERT INTO airplane(name, capacity, type_id, date, enabled) VALUES(?, ?, ?, ?, ?)')
            ->execute([$name, $capacity, $type_id, $this->dateFormat, $this->enabled]);
    }

    public function listing()
    {
        $sql = $this->prepareSql('SELECT * FROM airplane');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function listNames()
    {
        $sql = $this->prepareSql('SELECT id, name FROM airplane');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function listingWithType($start, $limit)
    {
        $sql = $this->prepareSql('SELECT airplane.id, airplane.name as airplane_name, airplane.capacity, type.name as type_name, airplane.date, airplane.enabled FROM airplane, type WHERE airplane.type_id = type.id ORDER BY airplane.id DESC LIMIT '.$start.','.$limit);
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

        public function findAllWithTypeById()
    {
        $sql = $this->prepareSql('SELECT airplane.id  FROM airplane, type WHERE airplane.type_id = type.id');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

}
