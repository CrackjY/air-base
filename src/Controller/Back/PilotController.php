<?php

namespace App\Controller\Back;

use Helper\Core\Controller;

class PilotController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listAction()
    {
        $this->render('back/pilot/list.html.twig', array(
            'pilots' => $this->pilotModel->listing(),
        ));
    }

    public function newAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->pilotModel->insert($this->post('name'), $this->post('address'), $this->post('salary'));

            $this->redirect('/air-base/?page=admin/pilots');
        }

        $this->render('back/pilot/new.html.twig');
    }
}
