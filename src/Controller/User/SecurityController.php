<?php

namespace App\Controller\User;

use Helper\Core\Controller;

/**
 * Class SecurityController
 * @package App\Controller\User
 */
class SecurityController extends Controller
{

    public function registerAction()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!empty($this->post('firstname')) && !empty($this->post('lastname')) && !empty($this->post('pseudo')) && !empty($this->post('adress')) && !empty($this->post('zip_code')) && !empty($this->post('city')) && !empty($this->post('phone')) && !empty($this->post('email')) && !empty($this->post('password'))) {
                $firstname = $this->post('firstname');
                $lastname = $this->post('lastname');
                $pseudo = $this->post('pseudo');
                $adress = $this->post('adress');
                $zipCode = $this->post('zip_code');
                $city = $this->post('city');
                $phoneNumber = $this->post('phone');
                $email =$this->post('email');

                $this->userModel->register($firstname, $lastname, $pseudo, $adress, $zipCode, $city, $phoneNumber, $email);
                //$roleModel->newUserRole($userModel->getRoleId(), $pseudo);

                $this->flash->setMessage('registrationSuccess', 'Registration success, check your email !');

                $this->redirect('/air-base/?page=login');
            } else {
                $errors['error'] = 'Error !';
            }
        }

        $this->render('security/register.html.twig', array(
            'errors' => $errors,
        ));
    }


    public function loginAction()
    {
        $email = $this->post('email');
        $password = $this->post('password');

        $messages = [];

        $credentials = $this->userModel->getCredentials($email);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (password_verify($password, $credentials['encrypt_password'])) {
                $this->session->set('id', $credentials['id']);
                $this->session->set('pseudo', $credentials['pseudo']);
                $this->flash->setMessage('authenticationSuccess', 'Authentication success ! :)');

                $this->redirect('/air-base/');
            }

            if (!password_verify($password, $credentials['encrypt_password'])) {
                $messages['authenticationFailed'] = 'Wrong authentication ! :(';
            }
        }

        $this->render('security/login.html.twig', array(
            'messages' => $messages,
            'flashSuccess' => $this->flash->unsetMessage('registrationSuccess'),
        ));
    }

    public function logout()
    {
        session_destroy();
        session_unset();
        $this->redirect('/air-base/');
    }

}