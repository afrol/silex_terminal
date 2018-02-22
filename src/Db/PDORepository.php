<?php

namespace App\Db;

use PDO;
use App\Traits\Singleton;

abstract class PDORepository
{
    use Singleton;

    static private $connect = null;

    private $username;
    private $password;
    private $dsn;

    public function init($config)
    {
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->dsn = $config['dsn'];
        $this->username = $config['username'];

        return $this;
    }

    private function getConnection()
    {
        return self::$connect === null
            ? self::$connect = new PDO($this->dsn, $this->username, $this->password)
            : self::$connect;
    }

    protected function queryList($sql, $args)
    {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($args);

        var_dump(debug_backtrace());
        return $stmt;
    }

    protected function query($sql, $args = [])
    {
        return $this->getConnection()->query($sql);
    }
}
