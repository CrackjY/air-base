<?php

namespace App\Controller\Back;

use Helper\Core\Controller;

class AirplaneController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listAction()
    {
        $limit = 5;
        $airplanes = $this->airplaneModel->findAllWithTypeById();
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
            'airplanesWithType' => $this->airplaneModel->listingWithType($start, $limit),
        ));
    }

    public function newAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->airplaneModel->insert(
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
            'types' => $this->typeModel->listing(),
        ));
    }
}
