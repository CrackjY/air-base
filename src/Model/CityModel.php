<?php

namespace App\Model;

use Helper\Core\Model;

class CityModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($name)
    {
        return $this
            ->prepareSql('INSERT INTO city(name, date, enabled) VALUES(?, ?, ?)')
            ->execute([$name, $this->dateFormat, $this->enabled]);
    }

    public function listing()
    {
        $sql = $this->prepareSql('SELECT * FROM city');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function listNames()
    {
        $sql = $this->prepareSql('SELECT id, name FROM city');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
