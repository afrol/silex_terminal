<?php

namespace App\Provider;

use Silex\Api\ControllerProviderInterface;
use Silex\Application;

class Index implements ControllerProviderInterface
{
    const PATH_CONTROLLER = 'App\\Controller\\IndexController::';

    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];
        $controllers->get('/', self::PATH_CONTROLLER. 'index');
        $controllers->post('/', self::PATH_CONTROLLER. 'store');
        $controllers->get('/id', self::PATH_CONTROLLER. 'show');
        $controllers->get('/{id}', self::PATH_CONTROLLER, 'show');
        $controllers->get('/edit/{id}', self::PATH_CONTROLLER, 'edit');
        $controllers->put('/{id}', self::PATH_CONTROLLER, 'update');
        $controllers->delete('/{id}', self::PATH_CONTROLLER, 'destroy');

        return $controllers;
    }
}
