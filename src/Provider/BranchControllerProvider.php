<?php

namespace App\Provider;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class BranchControllerProvider extends BaseProvider implements ControllerProviderInterface
{
    protected static $controller = 'BranchController';

    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];
        $controllers->get('/', $this->getPathController(). 'index');
        $controllers->get('/form', $this->getPathController(). 'form');
        $controllers->post('/', $this->getPathController(). 'store');
        $controllers->get('/id', $this->getPathController(). 'show');

        return $controllers;
    }
}
