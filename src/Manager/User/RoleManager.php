<?php

namespace App\Manager\User;

use Helper\Sql\SqlFeature;

class RoleManager extends SqlFeature
{
    public function getAll()
    {
        $query = $this->prepareSql('SELECT id, name, date, enabled FROM air_base_role');
        $query->execute(array());

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $name
     * @return bool
     */
    public function insert($name)
    {
        return $this
            ->prepareSql('INSERT INTO air_base_role(name, date, enabled) VALUES(?, ?, ?)')
            ->execute([$name, $this->dateFormat, $this->enabled]);
    }

    public function edit($name)
    {

    }
}