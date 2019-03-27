(() => {
	let flightIds = [];
	let tbodyFlight = document.querySelector('.tbody-flight');
	let trash = document.querySelector('.th-trash');
	
	if (location.href === $locationHrefFlightBack) {
		fetch($urlApiFlightBack)
			.then(response => response.json())
			.then(data => {
				data.forEach(flight => {	
					const enabledText = (flight.enabled === true)
						? '<div class="text-success font-weight-bold">on</div>'
						: '<div class="text-danger font-weight-bold">off</div>';
	
					tbodyFlight.innerHTML += `
						<tr class="row-flight">
							<td>
								<input type="checkbox" value="${flight.id}" id="checkbox-${flight.id}" class="input-checkbox">
							</td>
							<td>${flight.id}</td>
							<td>${flight.name}</td>
							<td>${flight.departure_city}</td>
							<td>${flight.arrival_city}</td>
							<td>${flight.date_of_departure}</td>
							<td>${flight.date_of_arrival}</td>
							<td>${flight.pilot_name}</td>
							<td>${flight.price} €</td>
							<td>${flight.airplane_name}</td>
							<td>${flight.capacity}</td>
							<td>${flight.date}</td>
							<td>
								${enabledText}
							</td>
							<td>
								<a href="/air-base/?page=admin/flights/edit&amp;id=${flight.id}"><i class="fa fa-pencil fa-2x text-danger text-center" aria-hidden="true"></i></a>
							</td>
						</tr>`;
				});
	
				let checkboxAction = (element) => {
					if (element.getAttribute('checked') && element.getAttribute('style')) {
						element.removeAttribute('checked');
						element.style.backgroundImage = "";
						element.parentNode.parentNode.removeAttribute('checked');

						const index = flightIds.indexOf(element.getAttribute('value'));

						flightIds.splice(index, 1);
					} else {
						element.setAttribute('checked', 'checked');
						element.style.backgroundImage = "url('assets/imgs/checked.png')";
						element.parentNode.parentNode.setAttribute('checked', 'checked');
						flightIds.push(element.getAttribute('value'));
					}
				};
	
				document.querySelectorAll('.input-checkbox').forEach((checkboxElement) => {
					checkboxElement.addEventListener('click', function(e) {
						e.preventDefault();
						checkboxAction(this)
					});
				});
	
				trash.addEventListener('click', (e) => {
					if (flightIds.length < 0) {
						console.log('empty !');
					} else {
						fetch($urlDeleteFlightBack + flightIds.join(), {
							method: 'DELETE',
						});
	
						flightIds = [];
					}
	
					document.querySelectorAll('.row-flight').forEach((row) => {
						if (row.getAttribute('checked')) {
							row.style.display = 'none';
						}
					});
				}); 
			});
	}
})();

