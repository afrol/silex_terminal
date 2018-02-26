<?php

namespace App\Controller;

use App\Traits\ModelList;
use Doctrine\DBAL\Connection;
use Silex\Application;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;

class StaffTerminalController extends BaseController
{
    use ModelList;

    protected static $path = 'staff_terminal';
    protected static $active = 'staff_terminal';

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

    /**
     * @param string $staffId
     * @param FormFactory $appFormFactory
     * @param Connection $db
     * @return \Symfony\Component\Form\FormInterface
     */
    protected function createForm(string $staffId, FormFactory $appFormFactory, Connection $db)
    {
        return $appFormFactory->createBuilder(FormType::class)
            ->add('staffId', HiddenType::class, ['data' => $staffId])
            ->add('terminalId', ChoiceType::class, [
                'choices' => $this->getTerminalList($db)
            ])
            ->add('save', SubmitType::class, array('label' => 'Add terminal to staff'))
            ->getForm();
    }

    /**
     * @param array ...$params
     * @return \Symfony\Component\Form\FormInterface
     */
    public function getForm(...$params)
    {
        return $this->createForm(...$params);
    }
}
