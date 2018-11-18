$(document).ready(function(){

    var sss = setInterval(function(){
        getCalls();
    },2000);


    var notificationData2 = {
        "to": "cSnIo7hGCkg:APA91bHKf9Ua0raOOs290XYGilw29tAPxrB2kP5x_tJiXbjzRYkcZLsw-HpH11QIwH1cLF3k0WU3aTyz2rrma_SEj-5Q5QPvoecS32IAC2RnFR_nYDJqkLrO9rx6f83HdGNPOwf2DacU",
        "data": {
            "mission_type": "掛號",
            "name": "王小明",
            "issued_at": "201711121843",
            "description": "2017-12-12 中國附醫心臟科 陳大陸 醫師 早診",
            "parent_id": "9",
            "mission_id": "17"
        },
        "notification": {
            "body": "王先生 中國附醫心臟科 委託掛號",
            "title": "掛號任務請求",
            "icon": "myicon"
        }
    }

    $("#fcmtest").click(function(){
        console.log('click');
        
    });

});

var getCalls = function ()
{
    $('#callTable').DataTable().clear();
    $.ajax({
        url: $('#callsURL').val(),
        type: 'get',
        contentType: 'application/json',
        success: function (calls)
        {
            var trs = [];
            for (var i = 0; i < calls.length; i++) {
                trs.push(
                    [
                        calls[i].id,
                        calls[i].room_name,
                        '<button id="'+ calls[i].id +'"  onclick="getSpecificTok(this.id)" type="button" class="btn btn-success">通話</button>',
                        '<button id="'+ calls[i].id +'"  onclick="waitReplay(this.id)" type="button" class="btn btn-warning">稍後</button>',
                        '<button id="'+ calls[i].id +'"  onclick="destroyCall(this.id)" type="button" class="btn btn-danger">刪除</button>',
                    ]
                );
            }

            $('#callTable').DataTable().rows.add(trs).draw(false);
          
        },
        error: function ()
        {
            console.log('error');
        }
    });
}


var waitReplay = function(id)
{
    // $.ajax({
    //     url: $('#callsURL').val() + '/' + id,
    //     type: 'delete',
    //     contentType: 'application/json',
    //     success: function (calls)
    //     {
    //         console.log('delete complete');
    //     },
    //     error: function ()
    //     {
    //         console.log('error');
    //     }
    // });

}

var destroyCall = function(id)
{
    $.ajax({
        url: $('#callsURL').val() + '/' + id,
        type: 'delete',
        contentType: 'application/json',
        success: function (calls)
        {
            console.log('delete complete');
        },
        error: function ()
        {
            console.log('error');
        }
    });

}

var getSpecificTok = function (id)
{
    $.ajax({
        url: $('#callsURL').val() + '/' + id,
        type: 'get',
        contentType: 'application/json',
        success: function (calls)
        {
            console.log(calls);
            // window.open($('#TokRoomURL').val() );
            window.open($('#TokRoomURL').val() + '?' + 'id' + '='+ id);
        },
        error: function ()
        {
            console.log('error');
        }
    });
}

