<?php

namespace App\Traits;

trait Singleton
{

    static private $instance = null;

    private function __construct()  {  }

    private function __clone()  {  }

    private function __wakeup() { }

    static public function getInstance()
    {
        return self::$instance === null ? self::$instance = new static() : self::$instance;
    }
}
