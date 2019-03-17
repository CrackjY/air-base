<?php

namespace Helper\Core;

use Twig_Loader_Filesystem;
use Twig_Environment;
use Twig_Extension_Debug;

/**
 * Class TwigOption
 * @package App\Twig
 */
class TwigOption
{
     /**
      * @var Twig_Loader_Filesystem
      */
     protected $loader;

     /**
      * @var Twig_Environment
      */
     protected $twig;

    /**
     * Loader constructor.
     */
     public function __construct()
     {
         $this->loader = new Twig_Loader_Filesystem("./templates");
         $this->twig = new Twig_Environment($this->loader,
             [
                 'cache' => false, //__DIR__.'/../../var/tmp',
                 'debug' => true,
             ]
         );

         isset($_SESSION) ? $this->twig->addGlobal('session', $_SESSION) : null;

         $this->twig->addExtension(new Twig_Extension_Debug());
     }

    /**
     * @return Twig_Environment
     */
     public function getTwig()
     {
         return $this->twig;
     }
}
