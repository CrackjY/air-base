<?php

namespace App\Controller\Back;

use Helper\Core\Controller;
use App\Model\PilotModel;

class PilotController extends Controller
{
    /**
     *
     */
    public function listAction()
    {
        $pilotModel = new PilotModel();

        $this->render('back/pilot/list.html.twig', array(
            'pilots' => $pilotModel->listing(),
        ));
    }

    /**
     *
     */
    public function newAction()
    {
        $pilotModel = new PilotModel();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pilotModel->insert($this->post('name'), $this->post('address'), $this->post('salary'));

            $this->redirect('/air-base/?page=admin/pilots');
        }

        $this->render('back/pilot/new.html.twig');
    }
}
