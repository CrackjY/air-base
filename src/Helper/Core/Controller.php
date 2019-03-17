<?php

namespace Helper\Core;

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
        // Instance Model
        $this->pilotModel = new PilotModel();
        //$this->flightModel = new FlightModel();
    }

    public function twigOption(TwigOption $twigOption)
    {
        return $this->twig = $twigOption;
    }

    /**
     * @param $string
     * @param array $array
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function render($string, $array = [])
    {
        $twig = $this->twigOption(new TwigOption())->getTwig();

        echo $twig->render($string, $array);
    }

    /**
     * @param mixed
     */
    public function jsonEncode($array)
    {
        echo json_encode($array);
    }

    /**
     * @param $string
     */
    public function redirect($string)
    {
        header("Location: $string");
        exit;
    }

    /**
     * @return Session
     */
    public function session()
    {
        $this->session = new Session();

        return $this->session;
    }

    public function flash()
    {
        $this->flash = new Flash();

        return $this->flash;
    }

}
