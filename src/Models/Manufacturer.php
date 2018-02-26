<?php

namespace App\Models;


class Manufacturer extends BaseModel implements InterfaceModel
{
    protected $table = 'Manufacturer';

    public static $attributes = [
        'manufacturerId',
        'name',
        'description',
        'create_at'
    ];

    public function getAll()
    {
        return $this->db->createQueryBuilder()
            ->select('*')
            ->from($this->table)
            ->setMaxResults(20)
            ->execute()
            ->fetchAll();
    }

    public function save(array $request)
    {
        return $this->db->insert($this->table, $request);
    }

    /**
     * @return array
     */
    public function getManufacturerList()
    {
        $result = $this->getAll();
        return $result
            ? array_combine(
                array_column($result, 'name'), array_column($result, 'manufacturerId')
            ) : [];
    }
}
