function horasfullcalendar(events) {
    $('#calendar').fullCalendar({
        themeSystem: 'bootstrap4',
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'today'
        },
        events: events,
        height: 550,
        timeFormat: 'H:mm',
        eventClick: function(eventObj) {
            
            if($('#slider').is(':checked')) {
                let route = "/appointments/"+ eventObj.id;
                $.ajax({
                    url: route,
                    type: 'DELETE',
                    dataType: 'JSON',
                    data: {
                        "id": eventObj.id
                    },
                    success: (data) => {
                        let vet_id = $('#veterinarios').val();
                        let url = '/appointments/getApptsByVet/' + vet_id;
                        $.get(url, (data2) => {
                            $('#calendar').fullCalendar('removeEvents');
                            $('#calendar').fullCalendar('addEventSource', data2);    
                            $('#calendar').fullCalendar('rerenderEvents');
                            $('#calendar').fullCalendar('prev');
                            $('#calendar').fullCalendar('next');
                        }).fail((err) => {
                            console.error(err);
                        });
                    },
                    error: (err) => {
                        console.error(err);
                    }
                });
            }
            else {
                var action = "/appointments/" + eventObj.id;
                let route = "/appointments/"+ eventObj.id +"/edit";
    
                $.get(route, (data) => {
                    $('#name').val(data.name);
                    $("#phone").val(data.phone);
                    $("#state_id").val(data.state_id);
                    $("#state").css('color', eventObj.color);
                    $("#id").val(data.id);
                    $("#form").attr('action', action);
        
        
                    $('#calendarModal').modal();
                }).fail((err) => {
                    console.error(err);
                });
            }
        }
    });
}