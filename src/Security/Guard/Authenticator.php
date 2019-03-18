<?php

namespace App\Security\Guard;

use Helper\Core\SuperGlobal;

/**
 * Class Authenticator
 * @package App\Security\Guard
 */
class Authenticator
{
    /**
     * @var $encryptPassword
     */
    private $encryptPassword;

    /**
     * @return bool|string
     */
    public function getEncryptPassword()
    {
        $sg = new SuperGlobal();
        $this->encryptPassword = $this->encryptPassword($sg->post('password'));

        return $this->encryptPassword;
    }

    /**
     * @param $plainPassword
     * @return bool|string
     */
    private function encryptPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }
}
