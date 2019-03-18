<?php

namespace App\Manager;

use Helper\Sql\SqlFeature;

class PilotManager extends SqlFeature
{
    public function insert($name, $address, $salary)
    {
        return $this
            ->prepareSql('INSERT INTO pilot(name, address, salary, date, enabled) VALUES(?, ?, ?, ?, ?)')
            ->execute([$name, $address, $salary, $this->dateFormat, $this->enabled]);
    }

    public function getAll()
    {
        $sql = $this->prepareSql('SELECT * FROM pilot');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getNames()
    {
        $sql = $this->prepareSql('SELECT id, name FROM pilot');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}