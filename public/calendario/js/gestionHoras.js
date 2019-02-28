setTimeout(() => {
    var vet_id = $('#veterinarios').val();
    var url = '/appointments/getApptsByVet/' + vet_id;
    $.get(url, (data) => {
        horasfullcalendar(data);
    }).fail((err) => {
        console.error(err);
    });
}, 100);


$('#veterinarios').change(() => {
    var vet_id = $('#veterinarios').val();
    var url = '/appointments/getApptsByVet/' + vet_id;
    $.get(url, (data) => {
        $('#calendar').fullCalendar('removeEvents');
        $('#calendar').fullCalendar('addEventSource', data);    
        $('#calendar').fullCalendar('rerenderEvents');
    }).fail((err) => {
        console.error(err);
    });
});

$('#crear').click(() => {
    var vet = $('#veterinarios').val();
    var date = $("#date").val();
    var time = $("#time").val();
    var url = '/appointments/addAppointmentsByVet/'+vet+'/'+date+'/'+time;
    $.get(url, (data) => {
        if(data == 200) {
            var url2 = '/appointments/getApptsByVet/' + vet;
            $.get(url2, (events) => {
                $('#calendar').fullCalendar('removeEvents');
                $('#calendar').fullCalendar('addEventSource', events);    
                $('#calendar').fullCalendar('rerenderEvents');
            }).fail((err2) => {
                console.error(err2);
            });
        }
        else if(data == 201) { //Error al ingresar la info
            alert("Estás tratando de ingresar un horario que ya existe en la base de datos, ¡No tomes alcohol en horas de trabajo!");
            console.log(url);
        }
    }).fail((err) => {
        console.error(err);
    });
    // window.open("https://web.whatsapp.com/send?phone=56996198670", '_blank');
});