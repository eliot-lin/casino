$(document).ready(function(){        
    $('#acceptMission').dataTable({
        "language": {
            "emptyTable": "您目前沒有任務。"
        },
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false,
    });

    $('#acceptedMission').dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false,
        "language": {
            "emptyTable": "您目前沒有任務。"
        },
    });
});


(function () {   

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    })
    var deleteMission = function($id){
   
        $.ajax({
            url: $('#missionUrl').val() + '/' + $id,
            type: 'delete',
            contentType: 'application/json',
            success: function(response){
                console.log('delete success');
                // $('#acceptMission').DataTable().clear();
                getMissions();
            },
            error: function(){
                console.log('error');
            }
        });
    }

    var updateMission = function($id){
   
        $.ajax({
            url: $('#missionUrl').val() + '/' + $id,
            type: 'PATCH',
            data:JSON.stringify(  {'status_name': "執行中" ,  
                                   'status_id': 2} ),
            contentType: 'application/json',
            success: function(response){
                console.log(response);
                console.log('update success');
                alert('您已接受此任務');
                getMissions();
            },
            error: function(){
                console.log('error');
            }
        });
    }

    var completeMission = function($id){
   
        $.ajax({
            url: $('#missionUrl').val() + '/' + $id,
            type: 'PATCH',
            contentType: 'application/json',
            data:JSON.stringify(  {'status_name': "完成" ,  
                                   'status_id': 3} ),
            success: function(response){
                alert('您已完成此任務');
                console.log('complete success');
                getMissions();
            },
            error: function(){
                console.log('error');
            }
        });
    }

    var countMIssionAge = function(){
        $.ajax({
            url: $('#handleMissionsUrl').val() + '/',
            type: 'get',
            contentType: 'application/json',
            success: function(missions)
            {
                  // Set the date we're counting down to
                // var countDownDate = new Date().getTime();
                // Update the count down every 1 second
                    var x = setInterval(function() {
                    for(var i = 0;i < missions.length;i++)
                    {// Get todays date and time
                        var now = new Date().getTime();
                        // Find the distance between now an the count down date
                        var distance = now/1000 - missions[i].issued_at;
                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (60 * 60 * 24));
                        var hours = Math.floor((distance % (60 * 60 * 24)) / ( 60 * 60));
                        var minutes = Math.floor((distance % (60 * 60)) / (60));
                        var seconds = Math.floor((distance % (60)));
                        //days + "d " 
                        var timer = days + "天 " + hours + "時 "
                        + minutes + "分 " + seconds + "秒 ";
                        // $('.navbar-brand').text(a);
                        $('[id="age'+missions[i].id+'"]').text(timer);
                        // Output the result in an element with id="demo"
                        // document.getElementById("Timer").innerHTML = 
                        // If the count down is over, write some text 
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("demo").innerHTML = "EXPIRED";
                        }
                    }
                    }, 1000);
                
            },
            error: function()
            {

            }
        })
   
    }
    countMIssionAge();

    var getMissions = function()
    {
        
        $.ajax({
            url: $('#getMissionsUrl').val(),
            data: { 
                'id' : $('#medical_id').val() 
            },
            type: 'get',
            contentType: 'application/json',
            success: function(missions)
            {     
                count = missions.length;
                var mission = [];
                var acceptMission = [];
                $(missions).each(function (index, ms) {
                    if(ms.status_name == "等待中") {
                            mission.push([
                            ms.requester_name,
                            ms.type_name,
                            '<span id = "age'+ ms.id + '">' + ms.issued_at + '</span>',
                            ms.description,
                            '<input type="button" id="accept'+ ms.id +'" value="接受">&nbsp;&nbsp;&nbsp;</input><input type="button" id="refuse'+ ms.id +'" value="拒絕"></input>',
                        ]);
                    }
                    else if(ms.status_name == "執行中") {
                            acceptMission.push([
                            ms.requester_name,
                            ms.type_name,
                            '<span id = "age'+ ms.id + '">' + ms.issued_at + '</span>',
                            ms.description,
                            '<input type="button" id="complete'+ ms.id +'" class="' + ms.parent_id +'"value="完成">',
                        ]);
                    }
                
                });
                $('#acceptMission').DataTable().clear().rows.add(mission).draw(true);
                $('#acceptedMission').DataTable().clear().rows.add(acceptMission).draw(true);
            },
            error: function(error)
            {
                console.log(error);
                console.log($('#medical_id').val());
            }
        })
    }
    getMissions();




    $('body').on('click', 'input[id^=accept]', function(){
        updateMission(this.id.substr(6, this.id.length));
    })
    $('body').on('click', 'input[id^=refuse]', function(){
        deleteMission(this.id.substr(6, this.id.length));
    })
    $('body').on('click', 'input[id^=complete]', function(){
        deleteMission(this.id.substr(8, this.id.length));
        completeMission($(this).attr("class"));
    })
    
   
}) ()