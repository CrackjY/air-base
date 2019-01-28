<?php

namespace Helper\Session;

/**
 * Interface SessionInterface
 * @package Helper\Session
 */
interface SessionInterface
{
    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value);

    /**
     * @param $key
     */
    public function delete($key);
}
