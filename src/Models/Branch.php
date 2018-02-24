<?php

namespace App\Models;


class Branch extends BaseModel implements InterfaceModel
{
    protected $table = 'Branch';

    public static $attributes = [
        'branchId',
        'name',
        'description'
    ];

    /**
     * @return array
     */
    public function getAll()
    {
        $query = 'SELECT * FROM '.$this->table;
        return $this->db->fetchAll($query, []);
    }

    /**
     * @param array $request
     * @return int
     */
    public function save(array $request)
    {
        return $this->db->insert($this->table, $request);
    }

    /**
     * @return array
     */
    public function getBranchList()
    {
        $result = $this->getAll();
        return $result
            ? array_combine(
                array_column($result, 'name'), array_column($result, 'branchId')
            ) : [];
    }
}
