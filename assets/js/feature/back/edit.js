(() => {
    let urlPiece;
    let fetchApi;
    let addAction;
    let fd;
    let confirm;
    let values;
    let formValues = {};
    let table = document.querySelector('.table-responsive');
    let url = 'http://air-base.com.local/';
    let linkNewItem = document.querySelector('.link-new-item');
    let urlPieces = {
        admin: '?page=admin',
        airplanes: '?page=admin/airplanes',
        types: '?page=admin/types',
        pilots: '?page=admin/pilots',
        flights: '?page=admin/flights',
        cities: '?page=admin/cities',
    };

    let newAction = () => {
        fetchApi = fetch(url + urlPiece + '/new');
    };

    let createObj = () => {
        fetchApi
            .then(response => response.text())
            .then((data) => {
                document.querySelector('.container-add');
                document.querySelector('.container-add').innerHTML = data;

                confirm = document.querySelector('.confirm');

                confirm.addEventListener('click', (e) => {
                    e.preventDefault();

                    values = document.querySelectorAll('input, select');

                    values.forEach((v) => {
                        formValues[v.getAttribute('id')] = v.value;
                    });

                    fd = new FormData();

                    for (let i in formValues) {
                        fd.append(i, formValues[i]);
                    }

                    addAction = fetch(url + urlPiece + '/new', {
                        method: 'POST',
                        body: fd,
                    });
                })

                document.querySelector('.close').addEventListener('click', function(e) {
                    document.querySelector('.container-add').classList.remove('d-flex');
                    document.querySelector('.container-add').classList.add('d-none');
                });
            })
    };

    let confirmation = () => {
        linkNewItem.addEventListener('click', (e) => {
            e.preventDefault();
            
            newAction();
            createObj();
            
            document.querySelector('.container-add').classList.add('d-flex');
        });
    };

    if (location.search === urlPieces.airplanes) {
        urlPiece = location.search;
        confirmation();
    } else if (location.search === urlPieces.types) {
        urlPiece = location.search;
        confirmation();
    } else if (location.search === urlPieces.pilots) {
        urlPiece = location.search;
        confirmation();
    } else if (location.search === urlPieces.flights) {
        urlPiece = location.search;
        confirmation();
    } else if (location.search === urlPieces.cities) {
        urlPiece = location.search;
        confirmation();
    }

    if (document.querySelector('.add')) {
        console.log(document.querySelector('.close'))
       
    }

})();
