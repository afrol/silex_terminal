<?php

namespace App\Models;

interface InterfaceModel
{
    public function getAll();
    public static function getAttributes(): array;
}
