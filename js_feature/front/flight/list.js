(() => {
	let renderer;
	let flights = [];

	fetch($urlApiFlightFront)
		.then(response => response.json())
		.then(data => {
			data.map((flight) => {
				flights.push(flight);
				renderer = `
					<div class="row-card">
				        <div class="card w-75 flight-card mb-4">
				            <div class="card-body">
				                <h5 class="card-title">${flight.name }</h5>
				                <p class="card-text">${flight.departure_city } <img class="airplane-icon" src="assets/imgs/airplane-icon.png"> ${flight.arrival_city }</p>
				                <p class="card-text float-right">Post the ${flight.date}</p>
				                <a href="#" class="btn btn-danger">Show more...</a>
				            </div>
				        </div>
			        </div>
				`;
				document.querySelector('.block-front-flight').innerHTML += renderer;
			});

			document.querySelector(".btn-search").addEventListener('click', (e) => {
				e.preventDefault();
				console.log(document.querySelector("input[type=search]").value);

				console.log(flights);
			});
		})
		.catch(error => console.error('error : ', error));
})();