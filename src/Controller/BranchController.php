<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BranchController extends BaseController
{
    public static $path = 'branch';
    public static $active = 'branch';
    public static $model = 'App\\Models\\Branch';

    public function index(Application $app)
    {
        $model = $this->getModel($app['db']);
        $result = $model->getAll();

        return $app['twig']->render(
            static::$path. '/index.twig',
            $this->getTwigParams(['result' => $result])
        );
    }

    public function form(Application $app)
    {
        $form = $app['form.factory']->createBuilder(FormType::class)
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Branch'))
            ->getForm();

        return $app['twig']->render(
            static::$path. '/form.twig',
            $this->getTwigParams(['form' => $form->createView()])
        );
    }

    public function store(Application $app, Request $request)
    {
        $form = $app['form.factory']->createBuilder(FormType::class)
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Branch'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $model = $this->getModel($app['db']);
            $model->save($form->getData());
        }

        return $app->redirect('/'.self::$path.'/');
    }
}
