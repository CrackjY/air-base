<?php

namespace App\Controller\Back;

use Helper\Core\Controller;
use App\Model\AirplaneModel;
use App\Model\TypeModel;

class AirplaneController extends Controller
{
    /**
     *
     */
    public function listAction()
    {
        $airplaneModel = new AirplaneModel();

        $this->render('back/airplane/list.html.twig', array(
            'airplanesWithType' => $airplaneModel->findAllWithRelationship(),
        ));
    }

    /**
     *
     */
    public function newAction()
    {
        $airplaneModel = new AirplaneModel();
        $typeModel = new TypeModel();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $airplaneModel->newAirplane(
                $this->post('name'),
                $this->post('capacityEconomic'),
                $this->post('capacityBusiness'),
                $this->post('capacityFirst'),
                $this->post('capacity'),
                $this->post('type')
            );

            $this->redirect('/air-base/?page=admin/airplanes');
        }

        $this->render('back/airplane/new.html.twig', array(
            'types' => $typeModel->findAll(),
        ));
    }
}
