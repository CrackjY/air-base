<?php

namespace App\Model;

use App\Manager\CityManager;

class CityModel
{
    private $cityManager;

    public function __construct()
    {
        $this->cityManager = new CityManager();
    }

    public function newCity($name)
    {
        return $this->cityManager->insert($name);
    }

    public function findAll()
    {
        return $this->cityManager->getAll();
    }

    public function findNames()
    {
        return $this->cityManager->getNames();
    }
}
