<?php

namespace App\Controller\Front;

use Helper\Core\Controller;
use App\Model\FlightModel;
use App\Model\CityModel;

class FrontController extends Controller
{
    /**
     *
     */
    public function homeAction()
    {
        $cityModel = new CityModel();
        $flightModel = new FlightModel();

        $unsetAuthSuccessMsg = $this->flash()->unsetMessage('authenticationSuccess');

        $this->render('front/home.html.twig', [
            'msg' => $unsetAuthSuccessMsg,
            'flights' => $flightModel->findAllWithRelationship(),
            'cities' => $cityModel->findNames(),
        ]);
    }

    /*
    public function flightDataJson()
    {
        $flightModel = new FlightModel();

        $this->jsonEncode($flightModel->findAllWithRelationship());
    }
    */

    /**
     *
     */
    public function showAction()
    {
        $flightModel = new FlightModel();

        $this->render('front/flight/show.html.twig', array(
            'flight' => $flightModel->findById($this->get('id')),
        ));
    }

    public function searchAction()
    {
        $cityModel = new CityModel();
        $flightModel = new FlightModel();

        $this->render('front/search_result.html.twig', [
            'flights' => $flightModel->searchByTerm($this->post('flightSearch')),
            'cities' => $cityModel->findNames(),
        ]);
    }

    /**
     *
     */
    public function advancedSearchAction()
    {
        $cityModel = new CityModel();
        $flightModel = new FlightModel();

        $criteria = $flightModel->advancedSearch(
            $this->post('searchByDateOfDeparture'),
            $this->post('searchByDateOfArrival'),
            $this->post('searchByDepartureCity'),
            $this->post('searchByArrivalCity')
        );

        $this->render('front/advanced_search_result.html.twig', [
            'cities' => $cityModel->findNames(),
            'criteria' => $criteria,
        ]);
    }

}
