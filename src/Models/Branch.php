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
        return $this->db->createQueryBuilder()
            ->select('*')
            ->from($this->table)
            ->setMaxResults(20)
            ->execute()
            ->fetchAll();
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
