<?php

namespace App\Models;

use App\Db\Repository;

class Terminal extends Repository
{
    protected $table = 'oc_product';

    public function getAll()
    {
        return $this->query('SELECT * FROM oc_product');
    }

}