<?php

namespace App\Controller\Back;

use Helper\Core\Controller;

class FlightController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listAction()
    {
        $this->render('back/flight/list.html.twig', []);
    }
   
    public function flightDataJson()
    {
        $this->jsonEncode($this->flightModel->listingWithPilotAndAirplane());
    }

    public function newAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->flightModel->insert($this->post('name'), $this->post('departureCityId'), $this->post('arrivalCityId'), $this->post('pilotId'), $this->post('airplaneId'));
        }

        $this->render('back/flight/new.html.twig', array(
            'airplanes' => $this->airplaneModel->listNames(),
            'pilots' => $this->pilotModel->listNames(),
            'cities' => $this->cityModel->listNames(),
        ));
    }

    public function editAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->flightModel->edit(
                $this->post('name'),
                $this->post('departureCityId'),
                $this->post('arrivalCityId'),
                $this->post('pilotId'),
                $this->post('airplaneId'),
                $this->get('id')
            );
        }

        $this->render('back/flight/edit.html.twig', array(
            'flight' => $this->flightModel->findById($this->get('id')),
            'airplanes' => $this->airplaneModel->listNames(),
            'pilots' => $this->pilotModel->listNames(),
            'cities' => $this->cityModel->listNames(),
        ));
    }

    public function deleteAction() {
        $this->flightModel->delete($this->get('id'));
    }

  //   public function getSecureWhereInString($values, $type = 'int') {
  //   if (!is_array($values)) {
  //     return $this->getSecureString($values, $type);
  //   }
  //   $sanitizedValues = array();
  //   foreach ($values as $value) {
  //     $sanitizedValues[] = $this->getSecureString($value, $type);
  //   }
  //   return implode(',', $sanitizedValues);
  // }
  // public function getSecureString($values, $type = 'int') {
  //   if ($type == 'int') {
  //     return filter_var($values, FILTER_VALIDATE_INT);
  //   } else if ($type == 'string') {
  //     return "'".addslashes($values)."'";
  //   } else {
  //     return addslashes($values);
  //   }
  // }
}
