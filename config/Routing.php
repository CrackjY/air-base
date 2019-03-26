<?php

namespace Config;

use Helper\Instance\Instance;

class Routing extends Instance
{
    public function __construct()
    {
        if ($_SERVER['REQUEST_URI'] == '/air-base/') {
            $this
                ->getFrontController()
                ->homeAction();
        }

        if (isset($_GET['page'])) {
            switch ($_GET['page']) {

                // Front
                case 'flights/search';
                    $this
                        ->getFrontController()
                        ->searchAction();
                    exit;
                case 'flights/advanced-search';
                    $this
                        ->getFrontController()
                        ->advancedSearchAction();
                    exit;

                // Flight
                case 'flight/show';
                    $this
                        ->getFrontController()
                        ->showAction();
                    exit;

                // Security
                case 'register';
                    $this
                        ->getSecurityController()
                        ->registerAction();
                    exit;
                case 'login';
                    $this
                        ->getSecurityController()
                        ->loginAction();
                    exit;
                case 'logout';
                    $this
                        ->getSecurityController()
                        ->logoutAction();
                    exit;

                //Back
                case 'admin';
                    $this
                        ->getBackController()
                        ->homeAction();
                    exit;

                //City
                case 'admin/cities';
                    $this
                        ->getCityController()
                        ->listAction();
                    exit;
                case 'admin/cities/new';
                    $this
                        ->getCityController()
                        ->newAction();
                    exit;

                //Airplane
                case 'admin/airplanes';
                    $this
                        ->getAirplaneController()
                        ->listAction();
                    exit;
                case 'admin/airplanes/new';
                    $this
                        ->getAirplaneController()
                        ->newAction();
                    exit;

                //Type
                case 'admin/types';
                    $this
                        ->getTypeController()
                        ->listAction();
                    exit;
                case 'admin/types/new';
                    $this
                        ->getTypeController()
                        ->newAction();
                    exit;

                //Pilot
                case 'admin/pilots';
                    $this
                        ->getPilotController()
                        ->listAction();
                    exit;
                case 'admin/pilots/new';
                    $this
                        ->getPilotController()
                        ->newAction();
                    exit;

                //Flight
                case 'admin/flights';
                    $this
                        ->getFlightController()
                        ->listAction();
                    exit;
                case 'admin/flights/new';
                    $this
                        ->getFlightController()
                        ->newAction();
                    exit;
                case 'admin/flights/edit';
                    $this
                        ->getFlightController()
                        ->editAction();
                    exit;
                case 'admin/flights/delete';
                    $this
                        ->getFlightController()
                        ->deleteAction();
                    exit;

                //API Flight
                case 'api/admin/flights';
                    $this
                        ->getFlightController()
                        ->flightDataJson();
                    exit;
            }
        }
    }
}
