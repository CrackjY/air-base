<?php

namespace Helper\Sql;

use Config\Database;

/**
 * Class SqlFeature
 * @package Helper\Sql
 */
class SqlFeature extends Database
{
    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var string
     */
    protected $dateFormat;

    /**
     * @var bool
     */
    protected $enabled;

    /**
     * SqlFeature constructor.
     */
    public function __construct()
    {
        $this->date = new \DateTime();
        $this->dateFormat = $this->date->format('Y-m-d H:m:s');
        $this->enabled = true;
    }

    /**
     * @param $string
     * @param array $array
     * @return bool|\PDOStatement
     */
    public function prepareSql($string, $array = [])
    {
        $this->db = new Database();

        return $this->db->dbConnect()->prepare($string, $array);
    }
}
