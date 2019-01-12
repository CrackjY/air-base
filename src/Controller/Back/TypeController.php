<?php

namespace App\Controller\Back;

use Helper\Core\Controller;

class TypeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listAction()
    {
        $this->render('back/type/list.html.twig', array(
            'types' => $this->typeModel->listing(),
        ));
    }

    public function newAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->typeModel->insert($this->post('name'));
        }

        $this->render('back/type/new.html.twig');
    }
}