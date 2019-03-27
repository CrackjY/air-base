<?php

namespace App\Model\User;

use Helper\Core\Model;

class RoleModel extends Model
{
    public function findAll()
    {
        return $this->getRoleManager()->getAll();
    }

    public function newRole($name)
    {
        return $this->getRoleManager()->insert($name);
    }
}