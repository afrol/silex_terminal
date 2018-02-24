<?php

$config = require 'web.php';
return array_merge($config, [
        'debug' => true,

        'db.options' => [
            'driver'	=> 'pdo_mysql',
            'host'		=> 'localhost',
            'dbname'	=> 'testBank',
            'user'		=> 'root',
            'password'	=> 'toor',
        ],
    ]
);
