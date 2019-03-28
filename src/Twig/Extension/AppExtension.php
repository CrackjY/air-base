<?php

namespace App\Twig\Extension;

/**
 * Class AppExtension
 * @package App\Twig\Extension
 */
class AppExtension extends \Twig_Extension
{
    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('hook', array($this, 'hook')),
        );
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('length', array($this, 'length')),
        );
    }

    /**
     * @param $term
     * @return string
     */
    public function hook($term)
    {
        return '[' . $term . ']';
    }
    /**
     * @param $title
     * @return int
     */
    public function length($title)
    {
        return strlen($title);
    }
}
