<?php

namespace Helper\Core;

use Helper\Session\Session;
use Helper\Session\Flash;

class SuperGlobal
{
    protected $get;

    protected $post;

    protected $flash;

    protected $session;

    /**
     * @param $value
     * @return null
     */
    public function get($value)
    {
        return $this->get = isset($_GET[$value]) ? $_GET[$value] : null;
    }

    /**
     * @param $value
     * @return null
     */
    public function post($value)
    {
        return $this->post = isset($_POST[$value]) ? $_POST[$value] : null;
    }

    /**
     * @param $value
     */
    public function isMethod($value)
    {
    }

    /**
     * @return mixed
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return Session
     */
    public function session()
    {
        $this->session = new Session();

        return $this->session;
    }

    /**
     * @return Flash
     */
    public function flash()
    {
        $this->flash = new Flash();

        return $this->flash;
    }
}