<?php

namespace App\Provider;


abstract class BaseProvider
{
    protected static $controller = 'IndexController';

    protected function getPathController()
    {
        return "App\\Controller\\".static::$controller."::";
    }
}
