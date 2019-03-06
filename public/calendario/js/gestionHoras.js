$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
    }
});

setTimeout(() => {
    var vet_id = $('#veterinarios').val();
    var url = '/appointments/getApptsByVet/' + vet_id;
    $.get(url, (data) => {
        horasfullcalendar(data);
    }).fail((err) => {
        console.error(err);
    });
}, 100);


var textowa = "";

var m = moment();
var n = moment();
var o = moment();
m.lang('es'); // week start on monday
n.lang('es'); // week start on monday
o.lang('es'); // week start on monday

var start = m.startOf('week').format('DD'), 
    end = m.endOf('week').subtract(1, 'days').format('DD'),
    month = m.endOf('week').format('MMMM'),
    afterMonth = start > end ? ' de '+m.startOf('week').format('MMMM') : '';

var texto2 = 'Aplicar para la semana del '+ start + afterMonth +' al '+ end +' de '+month;
var texto3 = 'Aplicar para todo el mes de ' + n.format('MMMM');

$("#radios2").html(texto2);
$("#radios3").html(texto3);

$('#veterinarios').change(() => {
    var vet_id = $('#veterinarios').val();
    var url = '/appointments/getApptsByVet/' + vet_id;
    $.get(url, (data) => {
        $('#calendar').hide();
        $('#calendar').fullCalendar('removeEvents');
        $('#calendar').fullCalendar('addEventSource', data);    
        $('#calendar').fullCalendar('rerenderEvents');
        $('#calendar').fullCalendar('prev');
        $('#calendar').fullCalendar('next');
        $('#calendar').show();
    }).fail((err) => {
        console.error(err);
    });
});


$('#crear').click(() => {
    if($("#time").val() == "") {
        alert("Debes seleccionar una hora que corresponda");
    }

    else {
        var vet = $('#veterinarios').val();
        var date = $("#date").val();
        var time = $("#time").val();

        if($("input[name = horasMultiples]:checked").val() == 1) {
            if($("#date").val() == "") {
                alert("Debes seleccionar una fecha que corresponda");
            }
            else {
                var url = '/appointments/addAppointmentsByVet/'+vet+'/'+date+'/'+time;
                $.get(url, (data) => {
                    if(data == 200) {
                        var url2 = '/appointments/getApptsByVet/' + vet;
                        $.get(url2, (events) => {
                            $('#calendar').hide();
                            $('#calendar').fullCalendar('removeEvents');
                            $('#calendar').fullCalendar('addEventSource', events);    
                            $('#calendar').fullCalendar('rerenderEvents');
                            $('#calendar').fullCalendar('prev');
                            $('#calendar').fullCalendar('next');    
                            $('#calendar').show();
                        }).fail((err2) => {
                            console.error(err2);
                        });
                    }
                    else if(data == 201) { //Error al ingresar la info
                        alert("Estás tratando de ingresar un horario que ya existe en la base de datos, ¡No tomes alcohol en horas de trabajo!");
                    }
                }).fail((err) => {
                    console.error(err);
                });

                textowa = "📅 Estimado " + $("#veterinarios>option:selected").text() + " de acuerdo a lo conversado, se ha agregado el horario de las " + time + " hrs. para el día " + moment(date).format('DD/MM/YYYY') + " Saludos! 👋";
                window.open("https://api.whatsapp.com/send?phone=56996198670&text="+encodeURI(textowa));
            }
        }
        else if($("input[name = horasMultiples]:checked").val() == 2) {
            var inicio = n.startOf('week').format('YYYY-MM-DD');
            var fin = o.endOf('week').subtract(1, 'days').format('YYYY-MM-DD');
            let fechaInicio = moment(inicio);
            let fechaFin = moment(fin);
            let fechas = [];
            
            for (let x = fechaInicio; x <= fechaFin; x.add(1, 'days')) {
                fechas.push(x.format('YYYY-MM-DD'));
            }
    
            $.post('/appointments/arrayAppointments', {'fechas[]': fechas, 'time': time, 'vet': vet}, (data) => {
                if(data == 'logrado') {
                    var url3 = '/appointments/getApptsByVet/' + vet;
                    $.get(url3, (events) => {
                        $('#calendar').hide();
                        $('#calendar').fullCalendar('removeEvents');
                        $('#calendar').fullCalendar('addEventSource', events);    
                        $('#calendar').fullCalendar('rerenderEvents');
                        $('#calendar').fullCalendar('prev');
                        $('#calendar').fullCalendar('next');
                        $('#calendar').show();
                    }).fail((err2) => {
                        console.error(err2);
                    });
                }
            }).fail((error) => {
                console.error(error);
            });
            textowa = "📅 Estimado " + $("#veterinarios>option:selected").text() + " de acuerdo a lo conversado, se han agregado el horario de las " + time + " hrs. para la semana de " + moment(inicio).format('DD/MM/YYYY') + " y " + moment(fin).format('DD/MM/YYYY') + " Saludos! 👋";
            window.open("https://api.whatsapp.com/send?phone=56996198670&text="+encodeURI(textowa));
        }
        else if($("input[name = horasMultiples]:checked").val() == 3) {
            
            let m = moment().utc();
            let n = moment().utc();
    
            let inicio = moment(m.startOf('month').format('YYYY-MM-DD'));
            let final = moment(n.endOf('month').format('YYYY-MM-DD'));
    
            let fechas = [];
    
            for (let x = inicio; x <= final; x.add(1, 'days')) {
                if(x.weekday() != 6)
                    fechas.push(x.format('YYYY-MM-DD'));
            }
    
            $.post('/appointments/arrayAppointments', {'fechas[]': fechas, 'time': time, 'vet': vet}, (data) => {
                if(data == 'logrado') {
                    var url3 = '/appointments/getApptsByVet/' + vet;
                    $.get(url3, (events) => {
                        $('#calendar').hide();
                        $('#calendar').fullCalendar('removeEvents');
                        $('#calendar').fullCalendar('addEventSource', events);    
                        $('#calendar').fullCalendar('rerenderEvents');
                        $('#calendar').fullCalendar('prev');
                        $('#calendar').fullCalendar('next');
                        $('#calendar').show();
                    }).fail((err2) => {
                        console.error(err2);
                    });
                }
            }).fail((error) => {
                console.error(error);
            });
    
            textowa = "📅 Estimado " + $("#veterinarios>option:selected").text() + ", de acuerdo a lo conversado se han agregado el horario de las " + time + " hrs. para el mes de " + n.format('MMMM'); + ". Saludos! 👋";
            window.open("https://api.whatsapp.com/send?phone=56996198670&text="+encodeURI(textowa));            
        }
    }
});