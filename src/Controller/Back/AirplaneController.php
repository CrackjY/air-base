<?php

namespace App\Controller\Back;

use Helper\Core\Controller;
use App\Model\AirplaneModel;
use App\Model\TypeModel;

class AirplaneController extends Controller
{
    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function listAction()
    {
        $airplaneModel = new AirplaneModel();

        $limit = 5;
        $airplanes = $airplaneModel->findAllWithTypeById();
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
            'airplanesWithType' => $airplaneModel->listingWithType($start, $limit),
        ));
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function newAction()
    {
        $airplaneModel = new AirplaneModel();
        $typeModel =new TypeModel();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $airplaneModel->insert(
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
            'types' => $typeModel->listing(),
        ));
    }
}
