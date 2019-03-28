<?php

namespace App\Controller\Back;

use App\Model\User\RoleModel;
use App\Model\User\UserModel;
use Helper\Core\Controller;

class UserController extends Controller
{
    public function listAction()
    {
        $userModel = new UserModel();

        $users = $userModel->findAll();
        $usersWithRoles = $userModel->findAllWithRelationship();

        $this->render('back/user/list.html.twig', [
            'users' => $users,
            'usersWithRoles' => $usersWithRoles,
        ]);
    }

    public function editAction()
    {
        $userModel = new UserModel();
        $roleModel = new RoleModel();

        $firstname = $this->post('firstname');
        $lastname = $this->post('lastname');
        $pseudo = $this->post('pseudo');
        $birth_date = $this->post('birth_date');
        $address = $this->post('address');
        $zipCode = $this->post('zip_code');
        $city = $this->post('city');
        $phoneNumber = $this->post('phone');
        $email =$this->post('email');

        $id = $this->get('id');

        $user = $userModel->findById($id);
        $roles = $roleModel->findAll();

        $userId = $user['id'];
        $roleId = $this->post('role');

        $rolesByUserId = $roleModel->findByAllByUserId($userId);

        echo '<pre>';
        var_dump(
        [
            'roles' => $rolesByUserId,
        ]
        );
        echo '</pre>';
        die;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel->editUser($firstname, $lastname, $pseudo, $birth_date, $address, $zipCode, $city, $phoneNumber, $email, $id);
            $userModel->newRoleInUser($userId, $roleId);

            $this->redirect('/air-base/?page=admin/users');
        }

        $this->render('back/user/edit.html.twig', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }
}
