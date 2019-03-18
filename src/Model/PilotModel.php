<?php

namespace App\Model;

use App\Manager\PilotManager;

class PilotModel
{
    private $pilotManager;

    public function __construct()
    {
        $this->pilotManager = new PilotManager();
    }

    public function newPilot($name, $address, $salary)
    {
        return $this->pilotManager->insert($name, $address, $salary);
    }

    public function findAll()
    {
        return $this->pilotManager->getAll();
    }

    public function findNames()
    {
        return $this->pilotManager->getNames();
    }
}
