<?php

namespace App\Model;

use Helper\Core\Model;

class PilotModel extends Model
{
    public function newPilot($name, $address, $salary)
    {
        return $this->getPilotManager()->insert($name, $address, $salary);
    }

    public function findAll()
    {
        return $this->getPilotManager()->getAll();
    }

    public function findNames()
    {
        return $this->getPilotManager()->getNames();
    }
}
