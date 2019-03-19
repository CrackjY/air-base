<?php

namespace App\Manager\User;

use Helper\Sql\SqlFeature;

/**
 * Class UserManager
 * @package App\Manager\User
 */
class UserManager extends SqlFeature
{
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
     * @param $encryptPassword
     * @return bool
     */
    public function register($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email, $encryptPassword)
    {

        $query = $this->prepareSql('INSERT INTO air_base_user(firstname, lastname, pseudo, birth_date, address, zip_code, city, phone_number, email, encrypt_password, date, enabled) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

        return $query->execute(array($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email, $encryptPassword, $this->dateFormat, $this->enabled));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $query = $this->prepareSql('SELECT * FROM air_base_user WHERE id = ?');

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
    public function edit($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email, $encryptPassword, $id) {
        $query = $this->prepareSql('UPDATE air_base_user SET firstname = ?, lastname = ?, pseudo = ?, birth_date = ?, address = ?, zip_code = ?, city = ?, phone_number = ?, email = ?, encrypt_password = ?, date = ?, enabled = ? WHERE id = ?');

        return $query->execute(array($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email, $encryptPassword, $this->dateFormat, $this->enabled, $id));
    }

    //I will optimise

    /**
     * @param $email
     * @return mixed
     */
    public function getCredentials($email)
    {
        $query = $this->prepareSql('SELECT id, firstname, lastname, pseudo, email, encrypt_password FROM air_base_user WHERE email = ?');
        $query->execute(array($email));

        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $query = $this->prepareSql('SELECT id, firstname, lastname, pseudo, address, zip_code, city, phone_number, email, enabled FROM air_base_user');
        $query->execute(array());

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}