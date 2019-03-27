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
        return $this->db = new \PDO("pgsql:host=".$this->getHost().";port=".$this->getPort().";dbname=".$this->getName().";", $this->getUser(), $this->getPassword());
    }
}
