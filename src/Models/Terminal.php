<?php

namespace App\Models;

use DateTime;

class Terminal extends BaseModel implements InterfaceModel
{
    protected $table = 'Terminal';

    public static $attributes = [
        'terminalId',
        'code',
        'manufacturerId',
        'branchId',
        'imgUrl',
        'status',
        'createAt',
        'updateAt',
    ];

    public static $status = [
        'stock', 'transport', 'installed', 'active', 'deactivated'
    ];

    /**
     * @return array
     */
    public static function getStatus(): array
    {
        return self::$status;
    }

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
        return $this->db->insert(
            $this->table,
            $request
            + ['createAt' => (new DateTime())->format('Y-m-d H:i:s')]
        );
    }

    /**
     * @return array
     */
    public function getTerminalList()
    {
        $result = $this->getAll();
        return $result
            ? array_combine(
                array_column($result, 'code'), array_column($result, 'terminalId')
            ) : [];
    }
}
