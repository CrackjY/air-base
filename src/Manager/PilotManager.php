<?php

namespace App\Manager;

use Helper\Sql\SqlFeature;

/**
 * Class PilotManager
 * @package App\Manager
 */
class PilotManager extends SqlFeature
{
    /**
     * @param $name
     * @param $address
     * @param $salary
     * @return bool
     */
    public function insert($name, $address, $salary)
    {
        return $this
            ->prepareSql('INSERT INTO air_base_pilot(name, address, salary, date, enabled) VALUES(?, ?, ?, ?, ?)')
            ->execute([$name, $address, $salary, $this->dateFormat, $this->enabled]);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $sql = $this->prepareSql('SELECT * FROM air_base_pilot');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function getNames()
    {
        $sql = $this->prepareSql('SELECT id, name FROM air_base_pilot');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}