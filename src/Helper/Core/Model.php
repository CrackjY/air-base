<?php

namespace Helper\Core;

use Config\Database;

abstract class Model
{
    private $db;

    protected $date;

    protected $dateFormat;

    protected $enabled;

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
}
