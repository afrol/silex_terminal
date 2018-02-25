<?php

namespace App\Provider;

use App\Controller\BaseController;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class BranchControllerProvider extends BaseProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];
        $controllers->get('/', BaseController::class. '::index');
        $controllers->get('/form', BaseController::class. '::form');
        $controllers->post('/', BaseController::class. '::store');
        $controllers->get('/id', BaseController::class. '::show');

        return $controllers;
    }
}
