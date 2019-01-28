<?php

namespace Helper\Core;

use Config\Database;
use App\Security\Guard\Authenticator;

abstract class Model
{
    private $db;

    protected $date;

    protected $dateFormat;

    protected $enabled;

    protected $sg;

    protected $encryptPassword;

    public function __construct()
    {
        $this->date = new \DateTime();
        $this->dateFormat = $this->date->format('Y-m-d H:m:s');
        $this->enabled = true;
    }

    public function prepareSql($string, $array = [])
    {
        $this->db = new Database();
        return $this->db->dbConnect()->prepare($string, $array);
    }

    private function encryptPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }

    protected function getUserIdByPseudo($pseudo)
    {
        $query = $this->prepareSql('SELECT id FROM user WHERE pseudo = ?');
        $query->execute(array($pseudo));
        $result = $query->fetch(\PDO::FETCH_OBJ);

        return $result->id;
    }

    protected function getRoleIdByName($name)
    {
        $query = $this->prepareSql('SELECT id FROM role WHERE name = ?');
        $query->execute(array($name));
        $result = $query->fetch(\PDO::FETCH_OBJ);

        return $result->id;
    }

    protected function getEncryptPassword() {
        $sg = new SuperGlobal();
        $this->encryptPassword = $this->encryptPassword($sg->post('password'));

        return $this->encryptPassword;
    }
}
