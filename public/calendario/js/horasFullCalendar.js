function horasfullcalendar(events) {
    $('#calendar').fullCalendar({
        themeSystem: 'bootstrap4',
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'today'
        },
        events: events,
        height: 650,
        timeFormat: 'H:mm',
    });
}