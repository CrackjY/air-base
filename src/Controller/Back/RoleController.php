<?php

namespace App\Controller\Back;

use App\Model\User\RoleModel;
use Helper\Core\Controller;

class RoleController extends Controller
{
    public function listAction()
    {
        $roleModel = new RoleModel();

        $roles = $roleModel->findAll();

        $this->render('back/role/list.html.twig', [
            'roles' => $roles,
        ]);
    }

    public function newAction()
    {
        $roleModel = new RoleModel();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $roleModel->newRole($this->post('name'));

            $this->redirect('/air-base/?page=admin/roles');
        }

        $this->render('back/role/new.html.twig', []);
    }
}