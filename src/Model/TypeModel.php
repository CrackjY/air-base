<?php

namespace App\Model;

use Helper\Core\Model;

class TypeModel extends Model
{
    public function newType($name)
    {
        return $this->getTypeManager()->insert($name);
    }

    public function findAll()
    {
        return $this->getTypeManager()->getAll();
    }
}
