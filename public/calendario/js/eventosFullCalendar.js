function fullcalendar() {
    $('#calendar').fullCalendar({
        themeSystem: 'bootstrap4',
        defaultView: 'listWeek',
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'today'
        },
        height: 600,
        noEventsMessage: "No hay atenciones médicas establecidas para esta semana",
        events: eventos,
        timeFormat: 'H:mm',
        eventClick: function(eventObj) {
            var action = "/appointments/" + eventObj.id;
            var route = "/appointments/"+ eventObj.id +"/edit";
    
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
    });
}