<?php

namespace App\Manager;

use Helper\Sql\SqlFeature;

/**
 * Class CityManager
 * @package App\Manager
 */
class CityManager extends SqlFeature
{
    /**
     * @param $name
     * @return bool
     */
    public function insert($name)
    {
        return $this
            ->prepareSql('INSERT INTO city(name, date, enabled) VALUES(?, ?, ?)')
            ->execute([$name, $this->dateFormat, $this->enabled]);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $sql = $this->prepareSql('SELECT * FROM city');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function getNames()
    {
        $sql = $this->prepareSql('SELECT id, name FROM city');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}