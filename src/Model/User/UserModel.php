<?php

namespace App\Model\User;

use App\Security\Guard\Authenticator;
use Helper\Core\Model;

/**
 * Class UserModel
 * @package App\Model\User
 */
class UserModel extends Model
{
    public function newUser($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email)
    {
        $authenticator = new Authenticator();

        return $this->getUserManager()->register($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email, $authenticator->getEncryptPassword());
    }

    public function editUser($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email, $id)
    {
        $authenticator = new Authenticator();

        return $this->getUserManager()->edit($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email, $authenticator->getEncryptPassword(), $id);
    }

    public function findCredentials($email)
    {
        return $this->getUserManager()->getCredentials($email);
    }

    public function findAll()
    {
        return $this->getUserManager()->getAll();
    }

    public function findById($id)
    {
        return $this->getUserManager()->getById($id);
    }

    public function newRoleInUser($userId, $roleId)
    {
        return $this->getUserManager()->insertUserIdAndRoleId($userId, $roleId);
    }

    public function findAllWithRelationship()
    {
        return $this->getUserManager()->getAllWithRelationship();
    }

    public function findByIdWithRelationship($id)
    {
        return $this->getUserManager()->getByIdWithRelationship($id);
    }
}