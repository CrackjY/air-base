<?php

namespace App\Model\User;

use Helper\Core\Model;

/**
 * Class RoleModel
 * @package App\Model\User
 */
class RoleModel extends Model
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param $name
     * @return bool
     */
    public function newRole($name)
    {
        $query = $this->prepareSql('INSERT INTO role(name) VALUES(?)');

        return $query->execute(array($name));
    }

    /**
     * @param $roleId
     * @param $userId
     * @return bool
     */
    public function newUserRole($roleId, $userId)
    {
        $query = $this->prepareSql('INSERT INTO user_role(role_id, user_id) VALUES(?, ?)');

        return $query->execute(array($roleId, $userId));
    }

    /**
     * @param $roleId
     * @param $userId
     * @return bool
     */
    public function editUserRole($roleId, $userId)
    {
        $query = $this->prepareSql('UPDATE user_role SET role_id = ? WHERE user_id = ?');

        return $query->execute(array($roleId, $userId));
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        $query = $this->prepareSql('SELECT id, name FROM role');
        $query->execute(array());

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}