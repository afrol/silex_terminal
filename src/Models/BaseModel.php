<?php

namespace App\Models;

use Doctrine\DBAL\Connection;

abstract class BaseModel
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var array
     */
    public static $attributes = [];

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    /**
     * @return array
     */
    public static function getAttributes(): array
    {
        return static::$attributes;
    }
}
