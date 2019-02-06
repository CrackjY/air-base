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

    public function searchAction() {
        $this->render('front/search_result.html.twig', [
            'flights' => $this->flightModel->searchByTerm($this->post('flightSearch')),
            'cities' => $this->cityModel->listNames(),
        ]);
    }

    public function advancedSearchAction()
    {
        $criteria = [];

        $searchByDateOfDeparture = $this->post('searchByDateOfDeparture');
        $searchByDateOfArrival = $this->post('searchByDateOfArrival');
        $searchByDepartureCity = $this->post('searchByDepartureCity');
        $searchByArrivalCity = $this->post('searchByArrivalCity');

        if ($searchByDateOfDeparture < $searchByDateOfArrival || $searchByDepartureCity !==  $searchByArrivalCity) {
            $criteria = $this->flightModel->advancedSearch($searchByDateOfDeparture, $searchByDateOfArrival, $searchByDepartureCity, $searchByArrivalCity);
        } else {
            var_dump('Error !');
        }

        $this->render('front/advanced_search.html.twig', [
            'cities' => $this->cityModel->listNames(),
            'criteria' => $criteria,
        ]);
    }
}
