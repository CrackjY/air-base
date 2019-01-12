<?php

namespace App\Controller\Back;

use Helper\Core\Controller;

class BackController extends Controller
{
    public function homeAction()
    {
        $this->render('back/home.html.twig');
    }
}