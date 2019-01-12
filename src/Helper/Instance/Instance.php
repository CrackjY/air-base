<?php

namespace Helper\Instance;

use Helper\Core\SuperGlobal;
use App\Controller\Back\AirplaneController;
use App\Controller\Back\BackController;
use App\Controller\Back\CityController;
use App\Controller\Back\FlightController;
use App\Controller\Back\TypeController;
use App\Controller\Front\FrontController;
use App\Controller\Back\PilotController;

class Instance
{
    //Super global
    protected $sg;

    // Front
    protected $frontController;

    // Back
    protected $backController;

    protected $cityController;

    protected $airplaneController;

    protected $typeController;

    protected $pilotController;

    protected $flightController;

    public function __construct()
    {
        //SUPER GLOBAL
        $this->sg = new SuperGlobal();

        // FRONT
        $this->frontController = new FrontController();

        //BACK
        $this->backController  = new BackController();
        $this->cityController  = new CityController();
        $this->airplaneController = new AirplaneController();
        $this->typeController = new TypeController();
        $this->pilotController = new PilotController();
        $this->flightController = new FlightController();
    }
}
