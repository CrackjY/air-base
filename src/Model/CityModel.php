<?php

namespace App\Model;

use Helper\Core\Model;

class CityModel extends Model
{
    public function newCity($name)
    {
        return $this->getCityManager()->insert($name);
    }

    public function findAll()
    {
        return $this->getCityManager()->getAll();
    }

    public function findNames()
    {
        return $this->getCityManager()->getNames();
    }
}
