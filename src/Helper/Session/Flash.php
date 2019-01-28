<?php

namespace Helper\Session;

/**
 * Class Flash
 * @package Helper\Session
 */
class Flash extends Session
{
    /**
     * @var flash
     */
    private $flash;

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function setMessage($key, $value)
    {
        $flash = $this->set($key, $value);

        return $flash;
    }

    /**
     * @param $message
     * @return Flash|mixed
     */
    public function unsetMessage($message)
    {
        $this->flash = $this->get($message);

        isset($this->flash) ? $this->delete($message) : null;

        return $this->flash;
    }
}