<?php

namespace App\Controller\Front;

use Helper\Core\Controller;

class FrontController extends Controller
{
    public function homeAction()
    {
        $this->render('front/home.html.twig', [
            'msg' => $this->flash->unsetMessage('authenticationSuccess'),
            'flights' => $this->flightModel->listingWithPilotAndAirplaneFront(),
            'cities' => $this->cityModel->listNames(),
        ]);
    }

    public function flightDataJson()
    {
        $this->jsonEncode($this->flightModel->listingWithPilotAndAirplaneFront());
    }

    public function showAction()
    {
        $this->render('front/flight/show.html.twig', array(
            'flight' => $this->flightModel->findById($this->get('id')),
        ));
    }

    public function searchAction()
    {
        $this->render('front/search_result.html.twig', [
            'flights' => $this->flightModel->searchByTerm($this->post('flightSearch')),
            'cities' => $this->cityModel->listNames(),
        ]);
    }

    public function advancedSearchAction()
    {
        $criteria = $this->flightModel->advancedSearch(
            $this->post('searchByDateOfDeparture'),
            $this->post('searchByDateOfArrival'),
            $this->post('searchByDepartureCity'),
            $this->post('searchByArrivalCity')
        );

        $this->render('front/advanced_search.html.twig', [
            'cities' => $this->cityModel->listNames(),
            'criteria' => $criteria,
        ]);
    }

}
