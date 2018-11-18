(function () {   
    $('#acceptBtn').click(function (){
        updateMission($('#subId').val() , {
            'status_id':  2 ,   // 1 待執行  2 執行中  3 完成
        } );
    });
    $('#refuseBtn').click(function (){
        updateMission($('#subId').val() , {
            'status_id':  4 ,   // 1 待執行  2 執行中  3 完成  4 失敗
            
        } );
    });

    var sexual = function($no)
    {
        if($no == 1)
            $('#gender').text("男性");
        else 
            $('#gender').text("女性");
    }
    sexual($('#gender').text());

    var type = function($type)
    {
        if($type == 5)
            $('#type').text("諮詢");
        else if($type == 6)
            $('#type').text("掛號");
    }
    type($('#type').text());

})()
