<?php

namespace App\Model\User;

use Helper\Core\Model;

/**
 * Class UserModel
 * @package App\Model\User
 */
class UserModel extends Model
{
    /**
     * @var array
     */
    private $roleId;

    /**
     * UserModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $firstname
     * @param $lastname
     * @param $pseudo
     * @param $adress
     * @param $zipCode
     * @param $city
     * @param $phoneNumber
     * @param $email
     * @return bool
     */
    public function register($firstname, $lastname, $pseudo, $adress, $zipCode, $city, $phoneNumber, $email)
    {
        $query = $this->prepareSql('INSERT INTO user(firstname, lastname, pseudo, adress, zip_code, city, phone_number, email, encrypt_password, date, enabled) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

        return $query->execute(array($firstname, $lastname, $pseudo, $adress, $zipCode, $city, $phoneNumber, $email, $this->getEncryptPassword(), $this->dateFormat, $this->enabled));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        $query = $this->prepareSql('SELECT * FROM user WHERE id = ?');

        $query->execute(array($id));

        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $firstname
     * @param $lastname
     * @param $pseudo
     * @param $adress
     * @param $zipCode
     * @param $city
     * @param $phoneNumber
     * @param $email
     * @param $id
     * @return bool
     */
    public function editUser($firstname, $lastname, $pseudo, $adress, $zipCode, $city, $phoneNumber, $email, $id) {
        $query = $this->prepareSql('UPDATE user SET firstname = ?, lastname = ?, pseudo = ?, adress = ?, zip_code = ?, city = ?, phone_number = ?, email = ?, encrypt_password = ?, date = ?, enabled = ? WHERE id = ?');

        return $query->execute(array($firstname, $lastname, $pseudo, $adress, $zipCode, $city, $phoneNumber, $email, $this->getEncryptPassword(), $this->dateFormat, $this->enabled, $id));
    }

    //I will optimise

    /**
     * @param $email
     * @return mixed
     */
    public function getCredentials($email)
    {
        $query = $this->prepareSql('SELECT id, firstname, lastname, pseudo, email, encrypt_password FROM user WHERE email = ?');
        $query->execute(array($email));

        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        $query = $this->prepareSql('SELECT id, firstname, lastname, pseudo, adress, zip_code, city, phone_number, email, enabled FROM user');
        $query->execute(array());

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function findAllWithRole()
    {
        $query = $this->prepareSql('SELECT us.id, ro.name, us.pseudo, us.email, us.adress, us.city, us.phone_number FROM user_role as ur inner join user as us on us.id = ur.user_id inner join role as ro on ro.id = ur.role_id');
        $query->execute(array());

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function findByUserIdWithRole($userId)
    {
        $query = $this->prepareSql('SELECT ro.id, ro.name, us.firstname, us.lastname, us.pseudo, us.adress, us.zip_code, us.city, us.phone_number, us.email, us.enabled FROM user_role as ur inner join user as us on us.id = ur.user_id inner join role as ro on ro.id = ur.role_id WHERE us.id = ?');
        $query->execute(array($userId));

        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function findByUserId()
    {
        $query = $this->prepareSql('select user.id, user_role.role_id from user, user_role where user.id = user_role.user_id');
        $query->execute(array());

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    /*
    public function getUserId($pseudo)
    {
        return $this->getUserIdByPseudo($pseudo);
    }
    */
}