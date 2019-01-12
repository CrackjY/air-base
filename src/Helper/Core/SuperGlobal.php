<?php
namespace Helper\Core;

class SuperGlobal
{
    protected $get;

    protected $post;

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
}