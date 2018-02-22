<?php

namespace App\Db;

use PDO;
use App\Config\Config;

class Repository extends PDO
{
    public function __construct()
    {
        self::getInstance($this->getDbConfig());
    }

    public function getAll()
    {
        $query = 'SELECT * FROM oc_product';
        return $this->queryList($query, []);
    }

    public function query($query)
    {
        return $this->query($query)->fetchAll(PDO::FETCH_CLASS, $this->getClassModel());
    }

    protected function getClassModel()
    {
        return static::class;
    }

    protected function getDbConfig()
    {
        $config = Config::getInstance()->getConfig('db');
    }

}
