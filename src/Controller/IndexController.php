<?php

namespace App\Controller;

use App\Traits\ModelList;
use Silex\Application;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\{
    ChoiceType,
    FormType,
    SubmitType,
    TextType
};

class IndexController extends BaseController
{
    use ModelList;

    public static $path = 'index';
    public static $active = 'index';
    public static $model = 'App\\Models\\Terminal';

    public function index(Application $app)
    {
        $model = $this->getModel($app['db']);
        $result = $model->getAll();

        return $app['twig']->render(
            static::$path. '/index.twig',
            $this->getTwigParams([
                'result' => $result,
                'branchList' => array_flip($this->getBranchList($app['db'])),
                'manufacturerList' => array_flip($this->getManufacturerList($app['db']))
            ])
        );
    }

    public function form(Application $app)
    {
        $form = $this->createForm($app['form.factory'], $app['db']);
        return $app['twig']->render(
            static::$path. '/form.twig',
            $this->getTwigParams(['form' => $form->createView()])
        );
    }

    public function store(Application $app, Request $request)
    {
        $form = $this->createForm($app['form.factory'], $app['db']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $model = $this->getModel($app['db']);
            $model->save($form->getData());
        }

        return $app->redirect('/');
    }

    protected function createForm($appFormFactory, $db)
    {
        return $appFormFactory->createBuilder(FormType::class)
            ->add('code', TextType::class)
            ->add('manufacturerId', ChoiceType::class, [
                'choices' => $this->getManufacturerList($db)
            ])
            ->add('branchId', ChoiceType::class, [
                'choices' => $this->getBranchList($db)
            ])
            ->add('imgUrl', TextType::class)
            ->add('status', ChoiceType::class, [
                'choices' => $this->getTerminalStatusList()
            ])
            ->add('save', SubmitType::class, array('label' => 'Create Terminal'))
            ->getForm();
    }
}
