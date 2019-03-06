
$(() => {
    let url = '/appointments/getspecialties';
    $.get(url, (data) => {
        data.forEach(specialty => {
            $("#selectEsp").append('<option value="'+ specialty.id +'">'+ specialty.name +'</option>')
        });
    }).fail((err) => {
        console.error(err);
    });

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
        $("#elegirFecha").removeClass('disabled');
    });

    
    $("#elegirFecha").click(() => {
        let url = '/appointments/getFechasByVet/' + $("#selectVet").val();
        $.get(url, (data) => {
            $("#selectFechas").empty();
            data.forEach(date => {
                $("#selectFechas").append('<option value="' + date + '">' + date + '</option>');
            });
        }).fail((err) => {
            console.error(err);
        });
    });

    $("#selectFechas").change(() => {
        let url = '/appointments/getHorasByVetFecha/' + $("#selectFechas").val() + "/" + $("#selectVet").val();
        $.get(url, (data) => {
            $("#selectHoras").empty();
            data.forEach(hour => {
                $("#selectHoras").append('<option value="' + hour + '">' + hour + '</option>');
            });
        }).fail((err) => {
            console.error(err);
        });
    });

});