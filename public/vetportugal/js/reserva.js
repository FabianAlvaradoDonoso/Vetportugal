$('#selectEsp').change(() => {
	$('#fechasFiltradas').empty();
	$('#fechasFiltradas').append('<option value="" >- Complete el PASO 1 -</option>');
	$('#selectHoras').empty();
	$('#selectHoras').append('<option value="" >- Complete el PASO 1 -</option>');

	let url = '/appointments/getVetByEsp/' + $('#selectEsp').val();
	$.get(url, (data) => {
		$('#selectVet').empty();
		$('#selectVet').append('<option value="0" disabled selected>-Seleccione un veterinario-</option>');
		data.forEach((veterinary) => {
			let name = `${veterinary.user.name} ${veterinary.user.last_name}`;
			$('#selectVet').append('<option value="' + veterinary.id + '">' + name + '</option>');
		});
	}).fail((err) => {
		console.error(err);
	});
});

$('#selectVet').change(() => {
	$('#siguiente').removeClass('disabled');
	$('#fechasFiltradas').empty();

	$('#paso2').show();
	document.getElementById('paso2').classList.add('animated', 'fadeIn');

	$('#fechasFiltradas').empty();
	let hoy = moment();
	for (let index = 0; index < 10; index++) {
		if (hoy.weekday() != 6) {
			$('#fechasFiltradas').append(
				'<option value="' + hoy.format('YYYY-MM-DD') + '">' + hoy.format('LL') + '</option>'
			);
		}
		hoy.add(1, 'days');
	}
	$('#fechasFiltradas').show();
});

$('#fechasFiltradas').change(() => {
	$('#paso3').show();
	document.getElementById('paso3').classList.add('animated', 'fadeIn');

	let url = '/appointments/getHorasByVetFecha/' + $('#fechasFiltradas').val() + '/' + $('#selectVet').val();
	$.get(url, (data) => {
		$('#selectHoras').empty();
		$('#selectHoras').append('<option value="" disabled selected>- Elegir una hora -</option>');

		data.forEach((hour) => {
			$('#selectHoras').append('<option value="' + hour.slice(0, 5) + '">' + hour.slice(0, 5) + '</option>');
		});
	}).fail((err) => {
		$('#selectHoras').empty();
		$('#selectHoras').append('<option value="1" >No hay horas disponibles para esa fecha</option>');
		$('#selectHoras').append('<option value="2" >No hay horas disponibles para esa fecha</option>');

		console.error(err);
	});
});

$('#selectHoras').change(() => {
	// $('#reservar').show();
	$('#paso4').show();
	document.getElementById('paso4').classList.add('animated', 'fadeIn');
});

$('#nameUser').keyup(() => {
	reservarShow();
});
$('#phoneUser').keyup(() => {
	reservarShow();
});
$('#emailUser').keyup(() => {
	reservarShow();
});

function reservarShow() {
	var nombre = $('#nameUser').val();
	var telefono = $('#phoneUser').val();
	var email = $('#emailUser').val();

	if (nombre != '' && telefono != '' && email != '') {
		if (!$('#reservar').length) {
			$('#divButton').html(
				'<button id="reservar" class="btn btn-primary btn-lg btn-block text-uppercase m-t-20"><i class="fa fa-calendar-plus-o fa-fw m-r-5"></i> Reservar Hora</button>'
			);
			document.getElementById('divButton').classList.add('animated', 'fadeIn');
		}
	} else {
		document.getElementById('divButton').classList.remove('animated', 'fadeIn');
		$('#divButton').empty();
	}
}

$('#reservar').click(() => {
	if ($('#fechasFiltradas').val() != null || $('#selectHoras').val() != null || $('#selectVet').val() != null) {
		let url =
			'/appointments/takeAppointment/' +
			$('#fechasFiltradas').val() +
			'/' +
			$('#selectHoras').val() +
			'/' +
			$('#selectVet').val();
		$.post(
			url,
			{
				state_id: 2,
				name: $('#nameUser').val(),
				phone: $('#phoneUser').val(),
				_token: $('input[type="hidden"]').val()
			},
			(data) => {
				if (data != 'logrado') alert('Ocurrió un problema');
				else alert('Cita reservada');
			}
		).fail((err) => {
			console.error(err);
		});
	} else {
		alert('Complete todos los PASOS antes de continuar');
	}
});

$(document).ready(function() {
	$('#paso2').hide();
	$('#paso3').hide();
	$('#paso4').hide();
	// $('#fechasFiltradas').hide();
	// $('#selectHoras').hide();
	// $('#reservar').hide();
	let url = '/appointments/getspecialties';
	$.get(url, (data) => {
		data.forEach((specialty) => {
			$('#selectEsp').append('<option value="' + specialty.id + '">' + specialty.name + '</option>');
		});
	}).fail((err) => {
		console.error(err);
		alert('Ocurrió un problema');
	});
});

// $('#siguiente').click(() => {
// $('#paso2').show();
// document.getElementById('paso2').classList.add('animated', 'fadeIn');
// $('#fechasFiltradas').empty();
// let hoy = moment();
// for (let index = 0; index < 10; index++) {
// 	if (hoy.weekday() != 6) {
// 		$('#fechasFiltradas').append(
// 			'<option value="' + hoy.format('YYYY-MM-DD') + '">' + hoy.format('LL') + '</option>'
// 		);
// 	}
// 	hoy.add(1, 'days');
// }
// $('#fechasFiltradas').show();
// });
