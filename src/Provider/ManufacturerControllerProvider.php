<?php

namespace App\Provider;

use App\Models\Manufacturer;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class ManufacturerControllerProvider extends BaseProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];
        $controllers->get('/', Manufacturer::class. '::index');
        $controllers->get('/form', Manufacturer::class. '::form');
        $controllers->post('/', Manufacturer::class. '::store');
        $controllers->get('/id', Manufacturer::class. '::show');

        return $controllers;
    }
}
