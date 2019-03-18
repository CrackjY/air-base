<?php

namespace App\Model;

use App\Manager\TypeManager;

class TypeModel
{
    private $typeManager;

    public function __construct()
    {
        $this->typeManager = new TypeManager();
    }

    public function newType($name)
    {
        return $this->typeManager->insert($name);
    }

    public function findAll()
    {
        return $this->typeManager->getAll();
    }


}
