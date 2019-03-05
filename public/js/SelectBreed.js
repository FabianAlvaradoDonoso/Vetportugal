$('#especie').change((event) => {
	$.get(`/breeds/${event.target.value}`, function(res, pet) {
		$('#raza').empty();
		if (res.length != 0) {
			res.forEach((element) => {
				if ($('#oldRaza').val() == element.id) {
					$('#raza').append(`<option value=${element.id} selected> ${element.name}</option>`);
				} else {
					$('#raza').append(`<option value=${element.id}> ${element.name}</option>`);
				}
			});
		} else {
			$('#raza').append(`<option value=''> Sin razas registradas</option>`);
		}
	});
});
$('#especie').focus((event) => {
	$.get(`/breeds/${event.target.value}`, function(res, pet) {
		$('#raza').empty();
		if (res.length != 0) {
			res.forEach((element) => {
				if ($('#oldRaza').val() == element.id) {
					$('#raza').append(`<option value=${element.id} selected> ${element.name}</option>`);
				} else {
					$('#raza').append(`<option value=${element.id}> ${element.name}</option>`);
				}
			});
		} else {
			$('#raza').append(`<option value=''> Sin razas registradas</option>`);
		}
	});
});
$('#especie').focus();

// OTRA FORMA DE HACER LO MISMO PERO NO TAN ELEGANTE
// $("#cliente").change(function(event){
//     $.get("/pets/" + event.target.value, function(response, pet){
//         $("#mascota").empty();
//         if(response.length != 0){
//             for (i = 0; i < response.length; i++) {
//                 $("#mascota").append("<option value='" + response[i].id + "'>" + response[i].name + "</option>")
//             }
//         }else{
//             $("#mascota").append("<option value=''>Sin mascota registrada</option>")
//         }
//     });
// });
