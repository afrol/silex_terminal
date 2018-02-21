<?php

namespace DB;

class DBRepository extends PDORepository
{
    public function getAll()
    {
        $query = 'SELECT * FROM oc_user';
        return $this->queryList($query, []);
    }
}
