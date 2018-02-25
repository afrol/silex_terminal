<?php

namespace App\Provider;

use App\Controller\IndexController;
use Silex\Api\ControllerProviderInterface;
use Silex\Application;

class IndexControllerProvider extends BaseProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];
        $controllers->get('/', IndexController::class. '::index');
        $controllers->get('/form', IndexController::class. '::form');
        $controllers->post('/', IndexController::class. '::store');
        $controllers->get('/id', IndexController::class. '::show');
        $controllers->get('/{id}', IndexController::class. '::show');
        $controllers->get('/edit/{id}', IndexController::class. '::edit');
        $controllers->put('/{id}', IndexController::class. '::update');
        $controllers->delete('/{id}', IndexController::class. '::destroy');

        return $controllers;
    }
}
