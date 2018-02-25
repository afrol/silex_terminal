<?php

namespace App\Models;


class StaffTerminal extends BaseModel implements InterfaceModel
{
    protected $table = 'StaffTerminal';

    public static $attributes = [
        'staffId',
        'terminalId',
        'create_at',
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

    public function getStaffById($id)
    {
        return $this->db->createQueryBuilder()
            ->select('*')
            ->from($this->table)
            ->where('staffId = ?')
            ->setParameter(0, $id)
            ->setMaxResults(20)
            ->execute()
            ->fetchAll();
    }

    public function getTerminalById($id)
    {
        return $this->db->createQueryBuilder()
            ->select('*')
            ->from($this->table)
            ->where('terminalId = ?')
            ->setParameter(0, $id)
            ->setMaxResults(20)
            ->execute()
            ->fetchAll();
    }

    public function save(array $request)
    {
        return $this->db->insert($this->table, $request);
    }

}
