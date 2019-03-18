<?php

namespace Config;

/**
 * Class Database
 * @package Config
 */
class Database extends Parameter
{
    /**
     * @var $db
     */
    protected $db;

    public function dbConnect()
    {
        return $this->db = new \PDO("mysql:host=".$this->getHost().";dbname=".$this->getName().";", $this->getUser(), $this->getPassword());
    }
}
