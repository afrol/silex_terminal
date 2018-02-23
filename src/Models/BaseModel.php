<?php

namespace App\Models;

use Doctrine\DBAL\Connection;

abstract class BaseModel
{
    /**
     * @var Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }
}
