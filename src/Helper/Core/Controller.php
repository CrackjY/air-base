<?php

namespace Helper\Core;

use App\Model\AirplaneModel;
use App\Model\CityModel;
use App\Model\FlightModel;
use App\Model\TypeModel;
use App\Model\PilotModel;
use Helper\Session\Session;
use Helper\Session\Flash;
use App\Model\User\UserModel;

/**
 * Class Controller
 * @package Helper\Controller
 */
abstract class Controller extends SuperGlobal
{
    protected $request;

    protected $twigOption;

    protected $twig;

    protected $method;

    protected $flash;

    protected $session;

    // User
    protected $userModel;

    // Model
    protected $airplaneModel;

    protected $cityModel;

    protected $typeModel;

    protected $pilotModel;

    protected $flightModel;

    /**
     * Controller constructor.
     */
    public function __construct() // i will optimise
    {
        // User
        $this->userModel = new userModel();

        // Session && flash
        $this->session = new Session();
        $this->flash = new Flash();

        // Instance Model
        $this->airplaneModel = new AirplaneModel();
        $this->cityModel = new CityModel();
        $this->typeModel = new TypeModel();
        $this->pilotModel = new PilotModel();
        $this->flightModel = new FlightModel();
    }

    public function twigOption(TwigOption $twigOption)
    {
        return $this->twig = $twigOption;
    }

    public function render($string, $array = [])
    {
        $twig = $this->twigOption(new TwigOption())->getTwig();

        echo $twig->render($string, $array);
    }

    public function jsonEncode($array) {
        echo json_encode($array);
    }

    /**
     * @param $string
     */
    public function redirect($string)
    {
        return header("Location: $string");
        exit;
    }
}
