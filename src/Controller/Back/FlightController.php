<?php

namespace App\Controller\Back;

use Helper\Core\Controller;
use App\Model\FlightModel;
use App\Model\AirplaneModel;
use App\Model\CityModel;
use App\Model\PilotModel;

class FlightController extends Controller
{
    /**
     *
     */
    public function listAction()
    {
        $this->render('back/flight/list.html.twig', []);
    }
   
    public function flightDataJson()
    {
        $flightModel = new FlightModel();

        $this->jsonEncode($flightModel->findAllWithRelationship());
    }

    /**
     *
     */
    public function newAction()
    {
        $flightModel = new FlightModel();
        $airplaneModel = new AirplaneModel();
        $pilotModel = new PilotModel();
        $cityModel = new CityModel();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $flightModel->newFlight(
                $this->post('name'),
                $this->post('dateOfDeparture'),
                $this->post('dateOfArrival'),
                $this->post('departureCityId'),
                $this->post('arrivalCityId'),
                $this->post('pilotId'),
                $this->post('price'),
                $this->post('airplaneId')
            );

            $this->redirect('/air-base/?page=admin/flights');
        }

        $this->render('back/flight/new.html.twig', array(
            'airplanes' => $airplaneModel->findNames(),
            'pilots' => $pilotModel->findNames(),
            'cities' => $cityModel->findNames(),
        ));
    }

    /**
     *
     */
    public function editAction()
    {
        $flightModel = new FlightModel();
        $airplaneModel = new AirplaneModel();
        $pilotModel = new PilotModel();
        $cityModel = new CityModel();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $flightModel->editFlight(
                $this->post('name'),
                $this->post('departureCityId'),
                $this->post('arrivalCityId'),
                $this->post('pilotId'),
                $this->post('airplaneId'),
                $this->get('id')
            );

            $this->redirect('/air-base/?page=admin/flights');
        }

        $this->render('back/flight/edit.html.twig', array(
            'flight' => $flightModel->findById($this->get('id')),
            'airplanes' => $airplaneModel->findNames(),
            'pilots' => $pilotModel->findNames(),
            'cities' => $cityModel->findNames(),
        ));
    }

    /**
     *
     */
    public function deleteAction()
    {
        $flightModel = new FlightModel();

        $flightModel->deleteFlight($this->get('id'));
    }
}
