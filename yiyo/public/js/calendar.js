$(document).ready(function() {
    var type =['早班','晚班','全班'];
    var color =['#F4BC22','#083D77','#682B4'];
    var time = ['T00:12:00','T12:24:00','T00:24:00']
    // load資料
    getScheduleData();

    var timeType = $('#time:checked').val();

    $('#time').change(function(){
        timeType = $('#time:checked').val();
       
        $(":checkbox").prop("checked", false);
    });


    //鎖右鍵
    $('#calendar:not(".fc-event")').on('contextmenu', function (e) {
        e.preventDefault()
    })

    $('#calendar').fullCalendar({
        eventClick: function(calEvent, jsEvent, view) {
        },
        dayClick: function(date, jsEvent, view) {
           
            if (typeof(timeType) == "undefined") {
                alert('請選取班別！');
                return;
            }

            if(date < new Date()){
                alert('過期無法排班！');
                return;
            }

            exam(date.format());
            
            var newEvent = new Object();
            var newSource = [];
            newEvent.start = date.format()+ time[timeType];
            newEvent.title = type[timeType];
            newEvent.color = color[timeType];
            newSource.push(newEvent);
            $('#calendar').fullCalendar( 'addEventSource', newSource );
        },
        header: {
            left: 'prev,next, today',
            center: 'title',
            right: 'month,basicWeek,listMonth'
        },
        defaultDate: new Date(),
        defaultView: 'month',
        editable: true,
        lang: 'tw',
        eventRender: function (event, element) {
            element.bind('mousedown', function (e) {
                if (e.which == 3) {
                    $('#calendar').fullCalendar('removeEvents',event._id);
                }
            });
        },
        timeFormat: 'H(:mm)'
    });

    $('#delateSchedule').click(function(){
        deleteSchedule();
    });

    //送出
    $('#saveCalender').click(function()
    {  
        console.log('press save Calendar');
        deleteSchedule();
    });

    //清除
    $('#clearCalender').click(function()
    {  
        var all = $('#calendar').fullCalendar( 'getEventSources' );
        $('#calendar').fullCalendar( 'removeEventSources', all );
    });
   
    $(":checkbox").change(function(){
        if(this.checked) {
            if(typeof(timeType) == "undefined")
            {
                this.checked = false;
                alert('請選取班別！');
            }
            else
            {
                checkbox( $(this).val(),timeType);    
            }
            
        }
    });

});

//檢查滑鼠點選到的那天是否有事件，有的話刪除
function exam(date){
    var all = $('#calendar').fullCalendar( 'getEventSources' );
   
    var idlist = [];
    $.each(all,function (i, v) {
        if(v.rawEventDefs[0].start.substring(0,10) == date)
        {
            var copys = v;
            idlist.push(copys);
            return false;
        }
    });
    if(idlist.length > 0)
    {
        $('#calendar').fullCalendar('removeEventSources',idlist);

        while(idlist.length > 0) {
            idlist.pop();
        }     
    }
    return false;
}

function LoadType($type)
{
    switch($type)
    {
        case 0: 
            return '早班';
        case 1:
            return '晚班';
        case 2:
            return '全班';
    }
}

function saveType($type)
{
    switch($type)
    {
        case '早班': 
            return 0;
        case '晚班':
            return 1;
        case '全班':
            return 2;
    }
}

//依據Medical_id擷取對應得排班諮詢
function getScheduleData(){
    var type =['早班','晚班','全班'];
    var color =['#F4BC22','#083D77','#682B4'];
    var time = ['T00:12:00','T12:24:00','T00:24:00']

    $.ajax({
        url: '/worktimes/1',
        type: 'get',
        contentType: 'application/json',
        success: function (wk)
        {
            console.log('auto load : wk' + wk.length);
            var all = $('#calendar').fullCalendar( 'getEventSources' );
            $('#calendar').fullCalendar( 'removeEventSources', all );
            $.each( wk,function (i, v) {
                var newEvent = new Object();
                var newSource = [];
                var getDate = v.date.toString();
                
                var year = getDate.substring(0, 4);
                var month = getDate.substring(4, 6);
                var day = getDate.substring(6, 8);
    
                newEvent.start = year + '-' + month + '-' + day + time[v.period];
                newEvent.title = LoadType(v.period);
                newEvent.color = color[v.period];
                newSource.push(newEvent);
               
                $('#calendar').fullCalendar( 'addEventSource', newSource );
            });
        },
        error: function ()
        {
            console.log('worktime error');
        }
    });
}

//清除 班表資料
function deleteSchedule() {
    // console.log('deleteSchedule');
    
    $.ajax({
        url: '/worktimes/1',
        type: 'delete',
        contentType: 'application/json',
        success: function (wk)
        {
            console.log(wk.message);
            sendSchedule();
        },
        error: function (wk)
        {
            console.log('delete error');

        }
    });
}
//傳送 排班資料
function sendSchedule(){
    var type =['早班','晚班','全班'];
    var color =['#F4BC22','#083D77','#682B4'];
    var time = ['T00:12:00','T12:24:00','T00:24:00']

    // console.log('sendSchedule');
    var all = $('#calendar').fullCalendar( 'getEventSources' );
    var onlyraw = [];
    // console.log(all.length);
    $.each(all,function (i, v) {
        onlyraw.push(v.rawEventDefs);
    });
    var onlyDay = [];
    $.each(onlyraw,function (i, v) {
        onlyDay.push(v[0]);
    });

    $.each(onlyDay,function (i, v) {
        var wtu = new Object();
        wtu.medical_id = 1;

        wtu.date = v.start.substring(0,10);//2017-11-12
        wtu.date = wtu.date.replace(new RegExp('-', 'g'),"");
      
        wtu.period = saveType(v.title);

        $.ajax({
            type: 'POST',
            url: '/worktimes',
            data: wtu,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(results)
            {
               
            }
        });
    });
}

//依據Medical_id擷取對應得排班諮詢
function checkbox(index,timeType){
    // if (typeof(timeType) == "undefined") {
        
    //     return;
    // }
    var type =['早班','晚班','全班'];
    var color =['#F4BC22','#083D77','#682B4'];
    var time = ['T00:12:00','T12:24:00','T00:24:00']
    var week =['sun','mon','tue','wed','thu','fri','sat'];

    var replace = week[index];
    // console.log( $('.fc-' + replace +':not(.fc-past):not(.fc-day-top):not(.fc-day-header)'));
    var arraya =  $('.fc-' + replace +':not(.fc-past):not(.fc-day-top):not(.fc-day-header):not(.fc-today)');
 
    $.each(arraya,function (i, v) {
        var datedata = v.attributes[1].nodeValue;
        exam(datedata);

        var newEvent = new Object();
        var newSource = [];

        newEvent.start = datedata + time[timeType];
        newEvent.title = type[timeType];
        newEvent.color = color[timeType];
        newSource.push(newEvent);
        
        $('#calendar').fullCalendar( 'addEventSource', newSource );

        console.log(v.attributes[1].nodeValue);//日期
    });
}