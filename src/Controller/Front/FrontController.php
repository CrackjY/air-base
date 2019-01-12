<?php

namespace App\Controller\Front;

use Helper\Core\Controller;

class FrontController extends Controller
{
    public function homeAction()
    {
        $this->render('front/home.html.twig', array(
/*            'flights' => $this->flightModel->listingWithPilotAndAirplane(),*/
        ));
    }
}
