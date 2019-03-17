<?php

namespace Helper\Core;

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

    /**
     * @param TwigOption $twigOption
     * @return TwigOption
     */
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
}
