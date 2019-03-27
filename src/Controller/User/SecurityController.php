<?php

namespace App\Controller\User;

use Helper\Core\Controller;
use App\Model\User\UserModel;

/**
 * Class SecurityController
 * @package App\Controller\User
 */
class SecurityController extends Controller
{
    /**
     *
     */
    public function registerAction()
    {
        $userModel = new UserModel();

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!empty($this->post('firstname')) && !empty($this->post('lastname')) && !empty($this->post('pseudo')) && !empty($this->post('birth_date')) && !empty($this->post('address')) && !empty($this->post('zip_code')) && !empty($this->post('city')) && !empty($this->post('phone')) && !empty($this->post('email')) && !empty($this->post('password'))) {
                $firstname = $this->post('firstname');
                $lastname = $this->post('lastname');
                $pseudo = $this->post('pseudo');
                $birth_date = $this->post('birth_date');
                $address = $this->post('address');
                $zipCode = $this->post('zip_code');
                $city = $this->post('city');
                $phoneNumber = $this->post('phone');
                $email =$this->post('email');

                $userModel->newUser($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email);

                $this
                    ->flash()
                    ->setMessage('registrationSuccess', 'Registration success, check your email !');
            } else {
                $errors['error'] = 'Error !';
            }
        }

        $users = $userModel->findAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $currentUserId = end($users)['id'];
            $roleId = 1;
            $userModel->newRoleInUser($currentUserId, $roleId);

            $this->redirect('/air-base/?page=login');
        }

        $this->render('security/register.html.twig', array(
            'errors' => $errors,
        ));
    }

    /**
     *
     */
    public function loginAction()
    {
        $userModel = new UserModel();

        $email = $this->post('email');
        $password = $this->post('password');

        $messages = [];

        $credentials = $userModel->findCredentials($email);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (password_verify($password, $credentials['encrypt_password'])) {
                $this->session()->set('id', $credentials['id']);
                $this->session()->set('pseudo', $credentials['pseudo']);
                $this->flash()->setMessage('authenticationSuccess', 'Authentication success ! :)');

                $this->redirect('/air-base/');
            }

            if (!password_verify($password, $credentials['encrypt_password'])) {
                $messages['authenticationFailed'] = 'Wrong authentication ! :(';
            }
        }

        $this->render('security/login.html.twig', array(
            'messages' => $messages,
            'flashSuccess' => $this->flash()->unsetMessage('registrationSuccess'),
        ));
    }

    /**
     *
     */
    public function logoutAction()
    {
        if (session_start()) {
            session_destroy();
            session_unset();

            $this->redirect('/air-base/');
       }
    }
}
