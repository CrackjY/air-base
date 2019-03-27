<?php

namespace App\Manager;

use Helper\Sql\SqlFeature;

/**
 * Class Type
 * @package App\Object
 */
class TypeManager extends SqlFeature
{
    /**
     * @param $name
     * @return bool
     */
    public function insert($name)
    {
        return $this
            ->prepareSql('INSERT INTO air_base_type(name, date, enabled) VALUES(?, ?, ?)')
            ->execute([$name, $this->dateFormat, $this->enabled]);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $sql = $this->prepareSql('SELECT id, name, date, enabled FROM air_base_type');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}