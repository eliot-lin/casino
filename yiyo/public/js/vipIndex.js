$(document).ready(function(){        
    $('#acceptedMission').dataTable({
        "language": {
            "emptyTable": "您目前沒有被接受的需求。"
        },
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false,
    });

    $('#sentMission').dataTable({
        "language": {
            "emptyTable": "您目前沒有發出的需求。"
        },
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": false,
    });
    var getHospitalsByRegion = function (no)
    {
        $.ajax({
            url: $('#getHospitalsByRegion').val(),
            data: {'no': no},
            type: 'get',
            contentType: 'application/json',
            success: function (region)
            {
                var hospitalsOptions = [];
                $(region.cities).each(function (i, city) {
                    $(city.hospitals).each(function (index, hospital) {
                        hospitalsOptions.push('<option value=' + hospital.id + '>' + hospital.name + '</option>');
                    });
				});
				
                $('#hospitalSelector').html(hospitalsOptions.join(''));

            },
            error: function()
            {
                console.log('error');
            }
        });
    }

    $('#regionSelector').change(function () {
        getHospitalsByRegion($(this).val());
    });
    
    getHospitalsByRegion('N'); // 預設值
    
    $("#register").click(function() {
        $("#registerTable").fadeIn("slow");
        $("#visitTable").fadeOut("slow");
        $("#consultationTable").fadeOut("slow");
        $("#gray").fadeIn("slow");
    });
    
    $("#consultation").click(function() {
        $("#registerTable").fadeOut("slow");
        $("#visitTable").fadeOut("slow");
        $("#consultationTable").fadeIn("slow");
        $("#gray").fadeIn("slow");

    });

    $("#visit").click(function() {
        $("#registerTable").fadeOut("slow");
        $("#consultationTable").fadeOut("slow");
        $("#visitTable").fadeIn("slow");
        $("#gray").fadeIn("slow");
    });
    
    $("#gray").click(function() {
        $("#registerTable").fadeOut("slow");
        $("#consultationTable").fadeOut("slow");
        $("#visitTable").fadeOut("slow");
        $("#gray").fadeOut("slow");
    });

    $("#sub").click(function(){

        var temp1 = document.getElementById("hospitalSelector");
        var strUser1 = temp1.options[temp1.selectedIndex].text;

        var temp3 = document.getElementById("diagnosis");
        var strUser3 = temp3.options[temp3.selectedIndex].text;

        var description = ("醫院："  + strUser1 + "<br></br>日期、時間：" + $("#date").val() + " " + strUser3 + "<br></br>症狀: " + $("#des").val() + "<br></br>指定醫師: " + $("#drname").val());
        console.log(description);

        var ms = new Object();
        
        ms.requester_name = $("#name").val();
        ms.requester_id = $("#vip_id").val();
        ms.type_id = 2;
        ms.type_name = "掛號";
        ms.date = $("#date").val();
        ms.status_id = 1;
        ms.status_name = "未執行";
        ms.description = description;
        ms.vip_card_no = "S002-000" + $("#vip_id").val();

        $.ajax({
            type: 'POST',
            url: '/missions',
            data: ms,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(results)
            {
                
                console.log(ms);
                console.log(results);
                
            }
        });
    });
    $("#sub2").click(function(){

        var ms = new Object();
        
        ms.requester_name = $("#name").val();
        ms.requester_id = $("#vip_id").val();
        ms.type_id = 1;
        ms.type_name = "諮詢";
        ms.status_id = 1;
        ms.status_name = "未執行";
        ms.description = $("#des2").val();
        ms.vip_card_no = "S002-000" + $("#vip_id").val();

        $.ajax({
            type: 'POST',
            url: '/missions',
            data: ms,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(results)
            {
                
                console.log(ms);
                console.log(results);
                
            }
        });
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
    
    // var updateMission = function($id){
   
    //     $.ajax({
    //         url: $('#missionUrl').val() + '/' + $id,
    //         type: 'PATCH',
    //         data:JSON.stringify(  {'status_name': "執行中" ,  
    //                                'status_id': 2} ),
    //         contentType: 'application/json',
    //         success: function(response){
    //             console.log(response);
    //             console.log('update success');
    //             alert('您已接受此任務');
    //             getMissions();
    //         },
    //         error: function(){
    //             console.log('error');
    //         }
    //     });
    // }

    // var completeMission = function($id){
   
    //     $.ajax({
    //         url: $('#missionUrl').val() + '/' + $id,
    //         type: 'PATCH',
    //         contentType: 'application/json',
    //         data:JSON.stringify(  {'status_name': "完成" ,  
    //                                'status_id': 3} ),
    //         success: function(response){
    //             alert('您已完成此任務');
    //             console.log('complete success');
    //             getMissions();
    //         },
    //         error: function(){
    //             console.log('error');
    //         }
    //     });
    // }

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
                'id' : $('#vip_id').val() 
            },
            type: 'get',
            contentType: 'application/json',
            success: function(missions)
            {   
                count = missions.length;
                var mission = [];
                var acceptMission = [];
                $(missions).each(function (index, ms) {
                    if(ms.status_name == "未執行" || (ms.status_name == "執行中" && ms.type_id != 6)) {
                            mission.push([
                            ms.type_name,
                            '<span id = "age'+ ms.id + '">' + ms.issued_at + '</span>',
                            ms.description,
                            ms.status_name,
                            ms.suggestion,
                            '<input type="button" id="refuse'+ ms.id +'" value="取消">',
                        ]);
                    }
                    else if(ms.status_name == "完成") {
                            acceptMission.push([
                            ms.type_name,
                            ms.description ,
                            '<input type="button" id="complete'+ ms.id +'" value="完成">',
                            // '<span id = "date'+ ms.id + '">' + ms.date + '</span>',
                        ]);
                    }
                
                });
                $('#sentMission').DataTable().clear().rows.add(mission).draw(true);
                $('#acceptedMission').DataTable().clear().rows.add(acceptMission).draw(true);
                console.log("success");
            },
            error: function(error)
            {
                console.log(error);
                console.log($('#medical_id').val());
            }
        })
    }
    getMissions();

    $('body').on('click', 'input[id^=refuse]', function(){
        deleteMission(this.id.substr(6, this.id.length));
    })

    $('body').on('click', 'input[id^=complete]', function(){
        deleteMission(this.id.substr(8, this.id.length));
        // 意見回饋表
        
    })
    
   
}) ()