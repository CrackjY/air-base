<?php

namespace Config;

use Helper\Instance\Instance;

class Routing extends Instance
{
    public function __construct()
    {
        parent::__construct();

        if ($_SERVER['REQUEST_URI'] == '/air-base/') {
            $this->frontController->homeAction();
        }

        if (isset($_GET['page'])) {
            switch ($_GET['page']) {
                //Front

                //Back
                case 'admin';
                    $this->backController->homeAction();
                    exit;
                //City
                case 'admin/cities';
                    $this->cityController->listAction();
                    exit;
                case 'admin/cities/new';
                    $this->cityController->newAction();
                    exit;
                //Airplane
                case 'admin/airplanes';
                    $this->airplaneController->listAction();
                    exit;
                case 'admin/airplanes/new';
                    $this->airplaneController->newAction();
                    exit;
                //Type
                case 'admin/types';
                    $this->typeController->listAction();
                    exit;
                case 'admin/types/new';
                    $this->typeController->newAction();
                    exit;
                //Pilot
                case 'admin/pilots';
                    $this->pilotController->listAction();
                    exit;
                case 'admin/pilots/new';
                    $this->pilotController->newAction();
                    exit;
                //Flight
                case 'admin/flights';
                    $this->flightController->listAction();
                    exit;
                case 'admin/flights/new';
                    $this->flightController->newAction();
                    exit;
                case 'admin/flights/edit';
                    $this->flightController->editAction();
                    exit;
                case 'admin/flights/delete';
                    $this->flightController->deleteAction();
                    exit;

                //API
                case 'api/admin/flights';
                    $this->flightController->flightDataJson();
                    exit;
            }
        }
    }
}