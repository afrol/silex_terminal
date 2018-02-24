<?php
namespace App\Controller;

use App\Models\InterfaceModel;
use Doctrine\DBAL\Connection;

abstract class BaseController
{
    /**
     * @var string
     */
    public static $active = '';

    /**
     * @var string
     */
    public static $model = '';

    /**
     * @param Connection $db
     * @return InterfaceModel
     */
    protected static function getModel(Connection $db): InterfaceModel
    {
        return new static::$model($db);
    }

    /**
     * @param array $params
     * @return array
     */
    protected function getTwigParams(array $params = []): array
    {
        return array_merge([
            'active' => static::$active,
        ], $params);
    }
}
