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

        // SUPER GLOBAL
        $this->sg = new SuperGlobal();

        //BACK
        $this->backController  = new BackController();
        $this->cityController  = new CityController();
        $this->airplaneController = new AirplaneController();
        $this->typeController = new TypeController();
        $this->pilotController = new PilotController();
        $this->flightController = new FlightController();
    }

    /**
     * @return FrontController
     */
    public function getFrontController()
    {
        $this->frontController = new FrontController();

        return $this->frontController;
    }

    /**
     * @return BackController
     */
    public function getBackController()
    {
        return $this->backController;
    }

    /**
     * @return CityController
     */
    public function getCityController()
    {
        return $this->cityController;
    }

    /**
     * @return AirplaneController
     */
    public function getAirplaneController()
    {
        return $this->airplaneController;
    }

    /**
     * @return TypeController
     */
    public function getTypeController()
    {
        return $this->typeController;
    }

    /**
     * @return PilotController
     */
    public function getPilotController()
    {
        return $this->pilotController;
    }

    /**
     * @return FlightController
     */
    public function getFlightController()
    {
        return $this->flightController;
    }

    /**
     * @return SecurityController
     */
    public function getSecurityController()
    {
        $this->securityController = new SecurityController();

        return $this->securityController;
    }
}
