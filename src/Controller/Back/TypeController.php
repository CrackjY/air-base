<?php

namespace App\Controller\Back;

use Helper\Core\Controller;
use App\Model\TypeModel;

class TypeController extends Controller
{
    /**
     *
     */
    public function listAction()
    {
        $typeModel = new TypeModel();

        $this->render('back/type/list.html.twig', array(
            'types' => $typeModel->listing(),
        ));
    }

    /**
     *
     */
    public function newAction()
    {
        $typeModel = new TypeModel();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $typeModel->insert($this->post('name'));

            $this->redirect('/air-base/?page=admin/types');
        }

        $this->render('back/type/new.html.twig');
    }
}