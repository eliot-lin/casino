var updateMission = function(id, data)
{
     //create
     console.log($('#missionUpdateUrl').val());
     $.ajax({
        url: $('#missionUpdateUrl').val() + '/' + id,
        type: 'put',
        async: false,
        data: JSON.stringify(data),
        contentType: 'application/json',
        success: function (data)
        {
            // $('body').append(data);
            console.log(data);
        }
    })
}


var storeMission = function(data)
{
   
     //create
     $.ajax({
        url: $('#missionStoreUrl').val(),
        type: 'post',
        async: false,
        data: JSON.stringify(data),
        contentType: 'application/json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data)
        {
            alert("完成，建立下一筆資料。");
            console.log("CRUD");
        }
    })
}

var storeMessage = function(data)
{
    //create
    console.log(data);
    $.ajax({
        url: $('#messageStoreUrl').val(),
        data: JSON.stringify(data),
        type: 'post',
        contentType: 'application/json',
        success: function (data)
        {
            // alert("完成，建立下一筆資料。");
            // close();
            console.log("CRUD");
        }
    })
}

