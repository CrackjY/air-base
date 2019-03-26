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

    /**
     * @return UserManager
     */
    public function getUserManager()
    {
        $this->userManager = new UserManager();

        return $this->userManager;
    }

    /**
     * @return AirplaneManager
     */
    public function getAirplaneManager()
    {
        $this->airplaneManager = new AirplaneManager();

        return $this->airplaneManager;
    }

    /**
     * @return CityManager
     */
    public function getCityManager()
    {
        $this->cityManager = new CityManager();

        return $this->cityManager;
    }

    /**
     * @return FlightManager
     */
    public function getFlightManager()
    {
        $this->flightManager = new FlightManager();

        return $this->flightManager;
    }

    /**
     * @return PilotManager
     */
    public function getPilotManager()
    {
        $this->pilotManager = new PilotManager();

        return $this->pilotManager;
    }

    /**
     * @return TypeManager
     */
    public function getTypeManager()
    {
        $this->typeManager = new TypeManager();

        return $this->typeManager;
    }
}
