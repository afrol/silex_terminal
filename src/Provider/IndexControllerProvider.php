<?php

namespace App\Provider;

use Silex\Api\ControllerProviderInterface;
use Silex\Application;

class IndexControllerProvider extends BaseProvider implements ControllerProviderInterface
{
    protected static $controller = 'IndexController';

    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];
        $controllers->get('/', $this->getPathController(). 'index');
        $controllers->get('/form', $this->getPathController(). 'form');
        $controllers->post('/', $this->getPathController(). 'store');
        $controllers->get('/id', $this->getPathController(). 'show');
        $controllers->get('/{id}', $this->getPathController(), 'show');
        $controllers->get('/edit/{id}', $this->getPathController(), 'edit');
        $controllers->put('/{id}', $this->getPathController(), 'update');
        $controllers->delete('/{id}', $this->getPathController(), 'destroy');

        return $controllers;
    }
}
