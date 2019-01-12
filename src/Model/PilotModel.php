<?php

namespace App\Model;

use Helper\Core\Model;

class PilotModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($name, $address, $salary)
    {
        return $this
            ->prepareSql('INSERT INTO pilot(name, address, salary, date, enabled) VALUES(?, ?, ?, ?, ?)')
            ->execute([$name, $address, $salary, $this->dateFormat, $this->enabled]);
    }

    public function listing()
    {
        $sql = $this->prepareSql('SELECT * FROM pilot');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function listNames()
    {
        $sql = $this->prepareSql('SELECT id, name FROM pilot');
        $sql->execute([]);

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
