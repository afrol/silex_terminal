<?php

namespace App\Models;


class Terminal extends BaseModel implements InterfaceModel
{
    protected $table = 'oc_product';

    public function getAll()
    {
        $query = 'SELECT * FROM '.$this->table;
        return $this->db->fetchAssoc($query, []);
    }

    public function save(array $request)
    {
        return true;
    }
}
