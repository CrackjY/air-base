<?php

namespace App\Controller\Front;

use Helper\Core\Controller;

class FrontController extends Controller
{
    public function homeAction()
    {
       /* $imgsRandom = [
            'assets/imgs/random-ban-1',
            'assets/imgs/random-ban-2',
            'assets/imgs/random-ban-3',
        ];*/

        $this->render('front/home.html.twig', [
            'msg' => $this->flash->unsetMessage('authenticationSuccess'),
            'flights' => $this->flightModel->listingWithPilotAndAirplaneFront(),
        ]);
    }

    public function flightDataJson()
    {
        $this->jsonEncode($this->flightModel->listingWithPilotAndAirplaneFront());
    }

    public function searchAction() {
        $this->render('front/search_result.html.twig', [
            'flights' => $this->flightModel->searchByTerm($this->post('flightSearch'))
        ]);
    }
}
