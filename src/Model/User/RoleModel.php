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

    public function findById($id)
    {
        return $this->getRoleManager()->getById($id);
    }

    public function findByName($name)
    {
        return $this->getRoleManager()->getByName($name);
    }

    public function findByAllByUserId($userId)
    {
        return $this->getRoleManager()->getAllByUserId($userId);
    }
}
