<?php

namespace Helper\Session;

/**
 * Class Session
 * @package Helper\Session
 */
class Session implements SessionInterface
{
    /**
     * @var session
     */
    protected $session;

    /**
     * Session constructor.
     */
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if (array_key_exists($key, $_SESSION)) {

            return $_SESSION[$key];
        }

        return $default;
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param $key
     */
    public function delete($key)
    {
        unset($_SESSION[$key]);
    }
}