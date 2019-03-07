
$("#selectEsp").change(() => {
    let url = '/appointments/getVetByEsp/' + $("#selectEsp").val();
    $.get(url, (data) => {
        $("#selectVet").empty();
        $("#selectVet").append('<option value="0" disabled selected>-Seleccione un veterinario-</option>')
        data.forEach(veterinary => {
            let name = `${veterinary.user.name} ${veterinary.user.last_name}`;
            $("#selectVet").append('<option value="'+ veterinary.id +'">'+ name +'</option>')
        });
    }).fail((err) => {
        console.error(err);
    });
});

$("#selectVet").change(() => {
    $("#siguiente").removeClass('disabled');
});


$("#siguiente").click(() => {
    
    let hoy = moment();
    for (let index = 0; index < 10; index++) {
        if(hoy.weekday() != 6)
        $("#fechasFiltradas").append('<option value="'+hoy.format('YYYY-MM-DD')+'">'+hoy.format('LL')+'</option>');
        hoy.add(1, 'days');
    }
    $("#fechasFiltradas").show();
});

$("#fechasFiltradas").change(() => {
    let url = '/appointments/getHorasByVetFecha/' + $("#fechasFiltradas").val() + "/" + $("#selectVet").val();
    $.get(url, (data) => {
        $("#selectHoras").empty();
        $("#selectHoras").append('<option value="0" disabled selected>- Elegir una hora -</option>');
        data.forEach(hour => {
            $("#selectHoras").append('<option value="' + hour.slice(0,5) + '">' + hour.slice(0,5) + '</option>');
        });
        $("#selectHoras").show();
    }).fail((err) => {
        console.error(err);
    });
});

$("#selectHoras").change(() => {
    $("#reservar").show();
});

$("#reservar").click(() => {
    let url = "/appointments/takeAppointment/" + $("#fechasFiltradas").val() + "/" + $("#selectHoras").val() + "/" + $("#selectVet").val();
    $.post(url, { state_id: 2,name: $("#nameUser").val(), phone: $("#phoneUser").val(), _token: $('input[type="hidden"]').val()}, (data) => {
        if(data != 'logrado')
            alert('Ocurrió un problema');
        else
            alert('Cita reservada');
    }).fail((err) => {
        console.error(err);
    });
});



$(document).ready(function() {
    $("#fechasFiltradas").hide();
    $("#selectHoras").hide();
    $("#reservar").hide();
    let url = '/appointments/getspecialties';
    $.get(url, (data) => {
        data.forEach(specialty => {
            $("#selectEsp").append('<option value="'+ specialty.id +'">'+ specialty.name +'</option>');
        });
    }).fail((err) => {
        console.error(err);
        alert('Ocurrió un problema');
    });
});