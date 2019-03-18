<?php

namespace App\Controller\Back;

use Helper\Core\Controller;
use App\Model\CityModel;

class CityController extends Controller
{
    /**
     *
     */
    public function listAction()
    {
        $cityModel = new CityModel();

        $this->render('back/city/list.html.twig', array(
            'cities' => $cityModel->findAll(),
        ));
    }

    /**
     *
     */
    public function newAction()
    {
        $cityModel = new CityModel();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cityModel->newCity($this->post('name'));

            $this->redirect('/air-base/?page=admin/cities');
        }

        $this->render('back/city/new.html.twig');
    }
}
