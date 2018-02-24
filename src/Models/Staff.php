<?php

namespace App\Models;


class Staff extends BaseModel implements InterfaceModel
{
    protected $table = 'Staff';

    public static $attributes = [
        'staffId',
        'branchId',
        'firstName',
        'lastName'
    ];

    public function getAll()
    {
        $query = 'SELECT * FROM '.$this->table;
        return $this->db->fetchAll($query, []);
    }

    public function save(array $request)
    {
        return $this->db->insert($this->table, $request);
    }

}
