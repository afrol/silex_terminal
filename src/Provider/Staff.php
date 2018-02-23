<?php

namespace App\Provider;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class Staff implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $staff = $app['controllers_factory'];

        $staff->get('/', 'App\\Controller\\StaffController::index');

        return $staff;
    }
}