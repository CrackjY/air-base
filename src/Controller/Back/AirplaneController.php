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

        $limit = 5;
        $airplanes = $airplaneModel->findAllWithRelationshipById();
        $all = count($airplanes);

        if (isset($_GET['pagination']) AND !empty($_GET['pagination']) AND $_GET['pagination'] > 0) {
            $_GET['pagination'] = intval($_GET['pagination']);
            $currentPage = $_GET['pagination'];
        } else {
            $currentPage = 1;
        }

        $start = ($currentPage -1) * $limit;

        // $this->jsonEncode($this->airplaneModel->listingWithType($start, $limit));

        $this->render('back/airplane/list.html.twig', array(
            'airplanesWithType' => $airplaneModel->findAllWithRelationship($start, $limit),
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
