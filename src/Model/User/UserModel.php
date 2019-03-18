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
     * @param $birth_date
     * @param $address
     * @param $zipCode
     * @param $city
     * @param $phoneNumber
     * @param $email
     * @return bool
     */
    public function register($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email)
    {

        $query = $this->prepareSql('INSERT INTO user(firstname, lastname, pseudo, birth_date, address, zip_code, city, phone_number, email, encrypt_password, date, enabled) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

        return $query->execute(array($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email, $this->getEncryptPassword(), $this->dateFormat, $this->enabled));
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
     * @param $address
     * @param $zipCode
     * @param $city
     * @param $phoneNumber
     * @param $email
     * @param $id
     * @return bool
     */
    public function editUser($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email, $id) {
        $query = $this->prepareSql('UPDATE user SET firstname = ?, lastname = ?, pseudo = ?, birth_date = ?, address = ?, zip_code = ?, city = ?, phone_number = ?, email = ?, encrypt_password = ?, date = ?, enabled = ? WHERE id = ?');

        return $query->execute(array($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email, $this->getEncryptPassword(), $this->dateFormat, $this->enabled, $id));
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
        $query = $this->prepareSql('SELECT id, firstname, lastname, pseudo, address, zip_code, city, phone_number, email, enabled FROM user');
        $query->execute(array());

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}