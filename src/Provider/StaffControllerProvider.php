<?php

namespace App\Provider;

use App\Controller\StaffController;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class StaffControllerProvider extends BaseProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];
        $controllers->get('/', StaffController::class. '::index');
        $controllers->get('/form', StaffController::class. '::form');
        $controllers->post('/', StaffController::class. '::store');
        $controllers->get('/{id}', StaffController::class. '::show');

        return $controllers;
    }
}
