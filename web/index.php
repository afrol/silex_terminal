<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Autoloader
require __DIR__ . '/../vendor/autoload.php';

$db = new \DB\DBRepository();

$result = $db->getAll();

var_dump($result);