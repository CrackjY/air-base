<?php

namespace Helper\Instance;

use App\Controller\User\SecurityController;
use Helper\Core\SuperGlobal;
use App\Controller\Back\AirplaneController;
use App\Controller\Back\BackController;
use App\Controller\Back\CityController;
use App\Controller\Back\FlightController;
use App\Controller\Back\TypeController;
use App\Controller\Front\FrontController;
use App\Controller\Back\PilotController;
use Helper\Session\Flash;
use Helper\Session\Session;

class Instance
{
    // flash && Session
   protected $flash;

   protected $session;

    // Security
    protected $securityController;

    // Super global
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
        // flash && Session
        $this->flash = new Flash();
        $this->session = new Session();
        // Security
        $this->securityController = new SecurityController();

        // SUPER GLOBAL
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
