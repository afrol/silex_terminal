<?php

namespace App\Controller;

use App\Models\Staff;
use App\Models\StaffTerminal;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use App\Traits\ModelList;

class StaffController extends BaseController
{
    use ModelList;

    public static $path = 'staff';
    public static $active = 'staff';
    public static $model = 'App\\Models\\Staff';

    public function index(Application $app)
    {
        $result = (new Staff($app['db']))->getAll();

        return $app['twig']->render(
            static::$path. '/index.twig',
            $this->getTwigParams([
                'result' => $result,
                'branchList' => array_flip($this->getBranchList($app['db']))
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

        return $app->redirect('/'.self::$path.'/');
    }

    public function show(Application $app, $id)
    {
        $result = (new Staff($app['db']))->getOneById($id);

        if ($result) {
            $attachedTerminalList = (new StaffTerminal($app['db']))->getStaffById($id);
        }

        return $app['twig']->render(
            static::$path. '/card.twig',
            $this->getTwigParams([
                'result' => $result,
                'branchList' => array_flip($this->getBranchList($app['db'])),
                'manufacturerList' => array_flip($this->getManufacturerList($app['db'])),
                'attachedTerminalList' => $attachedTerminalList ?? [],
                'formTerminal' => (new StaffTerminalController())->getForm($id, $app['form.factory'], $app['db'])->createView()
            ])
        );
    }

    protected function createForm($appFormFactory, $db)
    {
        return $appFormFactory->createBuilder(FormType::class)
            ->add('branchId', ChoiceType::class, [
                'choices' => $this->getBranchList($db)
            ])
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Staff'))
            ->getForm();
    }
}
