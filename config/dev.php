<?php

$config = require 'web.php';
return array_merge($config, [
        'basepath' => '/test2/web',
        'domain' => 'http://localhost/test2/web',

        'debug' => true,

        'db.options' => [
            'driver'    => 'pdo_mysql',
            'host'      => 'localhost',
            'dbname'    => 'testBank',
            'user'      => 'admin',
            'password'  => 'admin',
        ],
    ]
);
