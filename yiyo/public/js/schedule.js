$( document ).ready(function() {
   
    var yesterday = new Date();
    yesterday.setDate(yesterday.getDate()-1);

    $('#sandbox-container div').datepicker({
        multidate: true,
        toggleActive: true,
        todayHighlight: true,
        defaultViewDate: new Date(),
        // language: "zh-TW",
        daysOfWeekHighlighted: "0,6",
        // clearBtn: true,
        startDate: new Date(),
    })
    .on('changeDate', function() {
        var dates = $('#sandbox-container div').datepicker('getFormattedDate');
        var partsOfStr = dates.split(',');
        $('#days').text(partsOfStr);
        $('#days').text(partsOfStr.length);
    });

    $('#calendar2').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: '2014-06-12',
        defaultView: 'month',
        editable: true,
        events: [
            {
                title: 'Meeting',
                start: '2014-06-12T10:30:00',
                end: '2014-06-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2014-06-12T12:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2014-06-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2014-06-28'
            }
        ]
    });



});

