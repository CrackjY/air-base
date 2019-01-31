<?php

namespace App\Controller\Back;

use Helper\Core\Controller;

class CityController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listAction()
    {
        $this->render('back/city/list.html.twig', array(
            'cities' => $this->cityModel->listing(),
        ));
    }

    public function newAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->cityModel->insert($this->post('name'));

            $this->redirect('/air-base/?page=admin/cities');
        }

        $this->render('back/city/new.html.twig');
    }
}