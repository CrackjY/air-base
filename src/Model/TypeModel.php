<?php

namespace App\Model;

use Helper\Core\Model;

class TypeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($name)
    {
        return $this
            ->prepareSql('INSERT INTO type(name, date, enabled) VALUES(?, ?, ?)')
            ->execute([$name, $this->dateFormat, $this->enabled]);
    }

    public function listing()
    {
        $sql = $this->prepareSql('SELECT id, name, date, enabled FROM type');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
