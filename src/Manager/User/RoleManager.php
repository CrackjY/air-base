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
    {}

    public function getById($id)
    {
        $query = $this->prepareSql('SELECT id, name FROM air_base_role WHERE id = ?');

        $query->execute(array($id));

        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    public function getByName($name)
    {
        $query = $this->prepareSql('SELECT id, name FROM air_base_role WHERE name = ?');

        $query->execute(array($name));

        return $query->fetch(\PDO::FETCH_ASSOC);
    }
}