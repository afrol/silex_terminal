<?php

namespace App\Controller;

use Silex\Application;
use App\Models\Terminal;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    public function index(Application $app)
    {
        $model = new Terminal($app['db']);
        $result = $model->getAll();

        return $app['twig']->render( 'index/index.tpl', ['result' => $result]);
    }

    public function store(Application $app, Request $request)
    {
        $model = new Terminal($app['db']);


var_dump($request->request->all());

        $result = $model->save($request->request->all());


        return $app['twig']->render( 'index/index.tpl', ['result' => $result]);
    }
}
