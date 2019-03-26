<?php

namespace Config;

abstract class Parameter
{
    protected $host;

    protected $name;

    protected $charset;

    protected $user;

    protected $password;

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host = '127.0.0.1';
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name = 'air_base';
    }

    /**
     * @return mixed
     */
    public function getCharset()
    {
        return $this->charset = 'utf8';
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user = '';
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password = '';
    }
}