<?php

namespace App\Controller\Back;

use App\Model\User\UserModel;
use Helper\Core\Controller;

class UserController extends Controller
{
    public function listAction()
    {
        $userModel = new UserModel();

        $users = $userModel->findAll();

        $this->render('back/user/list.html.twig', [
            'users' => $users,
        ]);
    }
}