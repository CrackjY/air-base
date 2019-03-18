<?php

namespace App\Manager;

use Helper\Sql\SqlFeature;

/**
 * Class Type
 * @package App\Object
 */
class TypeManager extends SqlFeature
{
    public function insert($name)
    {
        return $this
            ->prepareSql('INSERT INTO type(name, date, enabled) VALUES(?, ?, ?)')
            ->execute([$name, $this->dateFormat, $this->enabled]);
    }

    public function getAll()
    {
        $sql = $this->prepareSql('SELECT id, name, date, enabled FROM type');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}