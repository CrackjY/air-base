<?php

namespace Helper\Instance;

use App\Controller\Back\RoleController;
use App\Controller\Back\UserController;
use App\Controller\User\SecurityController;
use App\Controller\Back\AirplaneController;
use App\Controller\Back\BackController;
use App\Controller\Back\CityController;
use App\Controller\Back\FlightController;
use App\Controller\Back\TypeController;
use App\Controller\Front\FrontController;
use App\Controller\Back\PilotController;


class Instance
{
    // Security
    protected $securityController;

    // Front
    protected $frontController;

    // Back
    protected $userController;

    protected $roleController;

    protected $backController;

    protected $cityController;

    protected $airplaneController;

    protected $typeController;

    protected $pilotController;

    protected $flightController;

    /**
     * @return FrontController
     */
    public function getFrontController()
    {
        $this->frontController = new FrontController();

        return $this->frontController;
    }

    /**
     * @return UserController
     */
    public function getUserController()
    {
        $this->userController = new UserController();

        return $this->userController;
    }

    /**
     * @return mixed
     */
    public function getRoleController()
    {
        $this->roleController = new RoleController();

        return $this->roleController;
    }

    /**
     * @return BackController
     */
    public function getBackController()
    {
        $this->backController = new BackController();

        return $this->backController;
    }

    /**
     * @return CityController
     */
    public function getCityController()
    {
        $this->cityController = new CityController();

        return $this->cityController;
    }

    /**
     * @return AirplaneController
     */
    public function getAirplaneController()
    {
        $this->airplaneController = new AirplaneController();

        return $this->airplaneController;
    }

    /**
     * @return TypeController
     */
    public function getTypeController()
    {
        $this->typeController = new TypeController();

        return $this->typeController;
    }

    /**
     * @return PilotController
     */
    public function getPilotController()
    {
        $this->pilotController = new PilotController();

        return $this->pilotController;
    }

    /**
     * @return FlightController
     */
    public function getFlightController()
    {
        $this->flightController = new FlightController();

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
