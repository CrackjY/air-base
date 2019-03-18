<?php

namespace Helper\Core;

use App\Manager\User\UserManager;
use App\Manager\TypeManager;
use App\Manager\CityManager;
use App\Manager\PilotManager;
use App\Manager\AirplaneManager;
use App\Manager\FlightManager;

abstract class Model
{
    protected $userManager;

    protected $airplaneManager;

    protected $cityManager;

    protected $flightManager;

    protected $pilotManager;

    protected $typeManager;

    public function getUserManager()
    {
        $this->userManager = new UserManager();

        return $this->userManager;
    }

    public function getAirplaneManager()
    {
        $this->airplaneManager = new AirplaneManager();

        return $this->airplaneManager;
    }

    public function getCityManager()
    {
        $this->cityManager = new CityManager();

        return $this->cityManager;
    }

    public function getFlightManager()
    {
        $this->flightManager = new FlightManager();

        return $this->flightManager;
    }

    public function getPilotManager()
    {
        $this->pilotManager = new PilotManager();

        return $this->pilotManager;
    }

    public function getTypeManager()
    {
        $this->typeManager = new TypeManager();

        return $this->typeManager;
    }
}
