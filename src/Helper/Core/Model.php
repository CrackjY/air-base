<?php

namespace Helper\Core;

use Config\Database;

abstract class Model
{
    private $db;

    private $date;

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

    protected function getEncryptPassword() {
        $sg = new SuperGlobal();
        $this->encryptPassword = $this->encryptPassword($sg->post('password'));

        return $this->encryptPassword;
    }
}
