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
        $query = $this->prepareSql('SELECT id, firstname, lastname, pseudo, address, zip_code, city, phone_number, email, enabled FROM air_base_user ORDER BY id ASC');
        $query->execute(array());

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertUserIdAndRoleId($userId, $roleId)
    {
        $query = $this->prepareSql('INSERT INTO air_base_user_role(user_id, role_id) VALUES(?, ?)');

        return $query->execute(array($userId, $roleId));
    }

    public function getAllWithRelationship()
    {
        $query = $this->prepareSql('
            SELECT 
            air_base_user.id as id,
            air_base_user.firstname,
            air_base_user.lastname,
            air_base_user.pseudo,
            air_base_user.address,
            air_base_user.zip_code,
            air_base_user.city,
            air_base_user.phone_number,
            air_base_user.email,
            air_base_user.date,
            air_base_user.enabled,
            air_base_user_role.user_id as user_id_from_user_role,
            air_base_user_role.role_id as role_id_from_user_role,
            air_base_role.id as role_id_from_role,
            air_base_role.name as role_name
            FROM air_base_user
            INNER JOIN air_base_user_role on air_base_user_role.user_id = air_base_user.id
            INNER JOIN air_base_role on air_base_user_role.role_id = air_base_role.id
            ORDER BY user_id ASC
        ');
        $query->execute(array());

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getByIdWithRelationship($id) {
        $query = $this->prepareSql('
            SELECT 
            air_base_user.id as id,
            air_base_user.firstname,
            air_base_user.lastname,
            air_base_user.pseudo,
            air_base_user.birth_date,
            air_base_user.address,
            air_base_user.zip_code,
            air_base_user.city,
            air_base_user.phone_number,
            air_base_user.email,
            air_base_user.date,
            air_base_user.enabled,
            air_base_role.id as role_id,
            air_base_role.name as role_name
            FROM air_base_user
            INNER JOIN air_base_user_role on air_base_user_role.user_id = air_base_user.id
            INNER JOIN air_base_role on air_base_user_role.role_id = air_base_role.id
            WHERE id = ?
        ');
        $query->execute(array($id));

        return $query->fetch(\PDO::FETCH_ASSOC);
    }
}
