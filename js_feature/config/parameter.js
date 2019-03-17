let url = 'http://localhost/air-base/';
let urlPieces = {
    admin: '?page=admin',
    airplanes: '?page=admin/airplanes',
    types: '?page=admin/types',
    pilots: '?page=admin/pilots',
    flights: '?page=admin/flights',
    cities: '?page=admin/cities',
};

// Back flight
let $locationHrefFlightBack = 'http://localhost/air-base/?page=admin/flights';
let $urlApiFlightBack = 'http://localhost/air-base/?page=api/admin/flights';
let $urlDeleteFlightBack = 'http://localhost/air-base/?page=admin/flights/delete&id=';
