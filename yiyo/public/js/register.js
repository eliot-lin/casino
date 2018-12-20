(function () {   


    var registerOject = new Object();
    //pase 完成
    registerOject.region = '早診';

    registerOject.hospital= '台大醫院';
    registerOject.hospitalValue= '';
    
    registerOject.division= '小兒科';
    registerOject.divisionValue= '04';

    registerOject.time = '早診';
    registerOject.timeValue = 2;
    registerOject.date = new Date().getDate();
    registerOject.doctor = '吳宗憲';

    var st = JSON.stringify(registerOject);
    var test = JSON.parse(st);

    var d = new Date();
    d.setDate(d.getDate() - 4); // <-- add this to make it "yesterday"
    

    $('#date2').val(d);
    $('#assignDr').val(registerOject.doctor);
    $('#diagnosis').val(registerOject.timeValue);

    // $('#divisionSelector').val(registerOject.division);
    

    var getMainMission = function (){
        var mission;
        $.ajax({
            url: $('#missionUrl').val() + '/'+ $('#missionId').val(),
            type: 'get',
            contentType: "application/json",
            async: false,
            success: function(response){
                mission = response;
            },
            error: function(){
                console.log('error');
            }
        });
        return mission;
    }

    var callcenter, vip_user, mission;

    mission = getMainMission();
    vip_user =  JSON.parse($('#vipData').val());
    // console.log(vip_user);
    $('#reviseRegisterMessage').hide();
    
    $('#comment').change(function () {
        $('#reviseRegisterMessage').show();
    });

    $('#reviseRegisterMessage').click(function(){
        $('#reviseRegisterMessage').hide();
        //修改訊息 使用http request mission.description
    });

    // sort. checkbox
    $('.handle1').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('.area-th').attr('checked', false);    
        else
            $('.area-th').attr('checked', true);
    })
    $('.handle2').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('.division-th').attr('checked', false);
        else
            $('.division-th').attr('checked', true);
    })
    $('.handle3').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('.hospital-th').attr('checked', false);
        else
            $('.hospital-th').attr('checked', true);
    })
    $('.handle4').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('.doctor-th').attr('checked', false);
        else
            $('.doctor-th').attr('checked', true);      
    })
    $('.handle5').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('.contract-th').attr('checked', false);
        else
            $('.contract-th').attr('checked', true);     
    })
    $('.handle6').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('.service-th').attr('checked', false);
        else
            $('.service-th').attr('checked', true);       
    })
    $('.handle7').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('.phone-th').attr('checked', false);
        else
            $('.phone-th').attr('checked', true);
    })
    $('.handle8').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('.status-th').attr('checked', false);
        else
            $('.status-th').attr('checked', true);
    })
    $('.handle9').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('.name-th').attr('checked', false);
        else
            $('.name-th').attr('checked', true);
    })
    $('.handle10').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('.region-th').attr('checked', false);
        else
            $('.region-th').attr('checked', true);
    })
    // end

    $('body').on('click', '[id^=staff]', function(){
        $('#bailer').val($(this).text());
        $('#bailerID').val($(this).data('id'));
    })

    $('body').on('change', '[id^="tab"] td:nth-child(1)', function () {
        console.log($('input:checked').val());
        $('#bailer').val($('#staff' + $('input:checked').val()).text());
        $('#bailerID').val($('#staff' + $('input:checked').val()).data('id'));
    });

    $('.Register-btn').click(function (){
        $('#phraseForm').fadeIn('slow');
        $('#MissionForm2').fadeIn('slow');
        $("#phraseType option[value='3']").text('已為您掛到 ' + $("#date").val() + ' '
                                                               + $('#hospitalSelector option:selected').text() + ' '
                                                               + $("#divisionSelector option:selected").val() + ' '
                                                               + $("#diagnosis option:selected").text() + ' '
                                                               + '，祝您早日康復！');
    });

    $('#MissionForm2').on('click' , function () {
        $('#phraseForm').fadeOut("slow");
        $('#MissionForm2').fadeOut("slow");
    });

    $('#phraseCancel').click(function(){
        $('#phraseForm').fadeOut('slow');
        $('#MissionForm2').fadeOut('slow');
    });

    $('#phraseSend').click(function(){

        $('#phraseForm').fadeOut('slow');
        $('#MissionForm2').fadeOut('slow');


        var phrase_value = $("#phraseType").find(":selected").val();
        // switch(phrase_value)
        // {
            // case 0:
        var progress_text = $("#phraseType").find(":selected").text();
        
        console.log($('#missionId').val());
        updateMission($('#missionId').val() , {
            'status_id':  2 ,   // 1 待執行  2 執行中  3 完成
            'status_name': "執行中",
            'suggestion' : progress_text,
        } );
        //         break;
        //     case 1:
        //         // 完成任務
        //         // 傳送消息
        //         break;
        // }
        
        

        // 等待 coding
        // var callcenter = new Object();
        // callcenter.id = 27;、
        // notification to device
    });
    // register default value = today
    $('input[type="date"]').each(function(){   
        var today = new Date(),
            y = today.getFullYear(),
            m = today.getMonth() + 1,
            d = today.getDate();
        if (d < 10)
        {
            d = "0" + d;
        }       
        $(this).val(y + '-' + m + '-' + d);
      });
    // end
    var birth_str = $('#birthday').text();
    var ori = birth_str;
    var sliced = birth_str.slice( 6, birth_str.length);
    var age = vipAge(sliced);

    $('#birthday').text(ori + ' - ' + age + "歲");

    function vipAge($string)
    {
        var birth = $string;
        var year = Number(birth.substr(0, 4));
        var month = Number(birth.substr(5, 2)) - 1;
        var day = Number(birth.substr(7, 2));
        var today = new Date();
        var age = today.getFullYear() - year;
        if (today.getMonth() < month || (today.getMonth() == month && today.getDate() < day)) {
        age--;
        }
        return age;
    }

    $('#FailMission').click(function(){
        SendProgressToVIP("掛號失敗", "red" ,vip_user,mission);
    });

    $('.CompleteRegisterMission').click(function(){
        if($('#assignDr').val() == ""){
            alert("請輸入醫生姓名");
            return;
        }
        else if($('#bailer').val() == ""){
            alert("請輸入委託人姓名");
            return;
        }
        else if($('.Time').val() == ""){
            alert("請選擇時間");
            return;
        }
        else if(confirm("確定完成掛號任務?")){

            updateMission($('#missionId').val() , {
                'status_id':  3 ,   // 1 待執行  2 執行中  3 完成
                'status_name': "完成",
                'finished_at': new Date().getTime() / 1000
            } );

            createPastHospitalRecord();

            SendProgressToVIP("完成","green",vip_user,mission)
            // 要在此寫入 傳送(option[value='3'])訊息
        }
    });

    $('#hospitalSelector').change(function () {
        $('.case1table').DataTable().search($(this).find('option:selected').text()).draw();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    })
    
    var createPastHospitalRecord = function ()
    {
        $.ajax({
            url: $('#complete').val(),
            data: JSON.stringify({
                'user_id': $('#vips_id').val(),
                'hospital': $('#hospitalSelector').val(),
                'division': $('#divisionSelector').val(),
                'name' : $('#assignDr').val(),
                'finished_at': $('.Time').val(),
            }),
            type: 'post',            
            contentType: 'application/json',
            success: function(success) {
                
                close();
             },
            error: function() {
                console.log('error');
            }
        });
    }

    var fail = function()
    {
        $.ajax({
            url: $('#').val(),
            data: JSON.stringify({
                'user_id': $('#vips_id').val(),
                'hospital': $('#hospitalSelector').val(),
                'division': $('#divisionSelector').val(),
                'name' : $('#assignDr').val(),
                'finished_at': $('.Time').val(),
            }),
            type: 'post',            
            contentType: 'application/json',
            success: function(success) {
                close();
             },
            error: function() {
                console.log('error');
            }
        });
    }
    
    var getRegionsList = function ()
    {
        $.ajax({
            url: $('#regionsUrl').val(),
            type: 'get',
            contentType: 'application/json',
            success: function (regions)
            {
                var regionsList = [];
                $(regions).each(function (index, region) {
                    regionsList.push('<option value="' + region.no + '">' + region.name + '</option>');
                });
                $('#regionSelector').html(regionsList.join(''));
            },
            error: function ()
            {
                console.error('error');
            }
        });
    }

    getRegionsList();
    
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
                        hospitalsOptions.push('<option>' + hospital.name + '</option>');
                    });
                });
                var doctorsOptions = [];
                var regions = {
                    'N': '北部',
                    'C': '中部',
                    'S': '南部',
                    'E': '東部',
                };
                $('#hospitalSelector').html(hospitalsOptions.join(''));
                $('.case1table').DataTable().search(regions[region.no]).draw();
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
    
    
    var getDoctorsNotEmergency = function ()
    {
        $.ajax({
            url: $('#doctorsNotEmergency').val(),
            type: 'get',
            contentType: 'application/json',
            success: function (doctors)
            {
                var doctorsList = [];
                $(doctors).each(function (index, doctor) {
                    doctorsList.push([
                        '<input type = "radio" name = "choose" id="choose' + doctor.user_id + '" value = "'+ doctor.user_id + '" style="zoom:1.0;" data-doctor = "'+doctor.user.name+'" >',
                        doctor.hospital.city.region.name,
                        doctor.main_division.name,
                        '<a target="_blank" href="' + doctor.hospital.website + '">' + doctor.hospital.name + '</a>',
                        '<span id = "staff' + doctor.user_id + '" data-name = "'+doctor.user.name+'"data-id = "' + doctor.user_id + '">' + doctor.user.name + '</span>',
                        doctor.relationship,
                        doctor.hospital.city.name,
                        '<a href="#" class="glyphicon glyphicon-earphone"> ' + doctor.user.tel_office + '</a>',
                        '<span style="color:dimgray;" id="status' + doctor.user_id +'" class="glyphicon glyphicon-user"></span>',
                    ]);
                });
                $('.case1table').DataTable().clear().rows.add(doctorsList).draw(true);
            }
        });
    }
    
    getDoctorsNotEmergency();
    
    // 拿科別
    
    var getDivisions = function()
    {
        $.ajax({
            url: $('#divisions').val(),
            type: 'get',
            contentType: 'application/json',
            success: function(divisions)
            {
                $(divisions).each(function (index, division) {
                    $('#divisionSelector').append($('<option>', {
                        value: division.name,
                        text: division.no + ' ' + division.name,
                    }));
                });
                $('#divisionSelector').selectpicker('refresh');
            },
        })
    }
    getDivisions();
    
    // 拿 過去的醫院
    
    var getPastHospitals = function()
    {
        $.ajax({
            url: $('#past-hospital').val(),
            data: {'id' : $('#vips_id').val()},
            type: 'get',
            contentType: 'application/json',
            success: function(pastHospitals)
            {     
                console.log(pastHospitals);
                var pastHsptls = [];
                $(pastHospitals).each(function (index, hsptl) {
                    pastHsptls.push([
                        hsptl.hospital,
                        hsptl.division,
                        hsptl.name,
                        hsptl.finished_at,
                    ]);
                });
                $('#pastHsptl').DataTable().clear().rows.add(pastHsptls).draw(true);
            },
            error: function()
            {
                console.log("error");
            }
        })
    }
    var time = function($data){
        if($data == 0)
        {
            return '未完成';
        }
        var t = new Date($data*1000);
        return t.getFullYear()+'/'+(t.getMonth()+1)+'/'+t.getDate();
    }
    
    getPastHospitals();

    // 拿 掛號訊息
    var getComment = function()
    {
        $.ajax({
            url: $('#missionUrl').val() + '/' + $('#missionId').val(),
            type: 'get',
            contentType: 'application/json',
            success: function(cmt)
            {
                var element = cmt.description;
                var res = element.replace(/<br><\/br>/g, "\n");
                $('#comment').text(res);
            }
        })
    }
    getComment();
 

    $('#SeedMission').click(function(){
        
        if($('#assignDr').val() == ""){
            alert("請輸入醫生姓名");
            return;
        }
        else if($('#bailer').val() == ""){
            alert("請輸入委託人姓名");
            return;
        }
        else if($('.Time').val() == ""){
            alert("請選擇時間");
            return;
        }
        else if($('input:checked').val() != undefined)
        {
            console.log('click');
            var temp1 = document.getElementById("hospitalSelector");
            var strUser1 = temp1.options[temp1.selectedIndex].value;

            var temp2 = document.getElementById("divisionSelector");
            var strUser2 = temp2.options[temp2.selectedIndex].value;

            var temp3 = document.getElementById("diagnosis");
            var strUser3 = temp3.options[temp3.selectedIndex].text;

            var temp = "請幫忙掛號" + strUser1 + "的" + strUser2 + "，時間：" + $('#date').val() + " " + strUser3 + 
            "，指定醫師：" + $('#assignDr').val() + "。";


            var zone=[];
            $('input[name=choose]:checked').each(function () {
                zone.push($(this).val());
            });

            var name = $('#name').text();
            name = name.substr(4, name.length);

            //建立委推任務
            var sub_mission_id;
            $.ajax({
                url: $('#missionSubUrl').val(),
                
                data:JSON.stringify({
                    'id': $('#missionId').val(),
                    'provider_id': $('input[name^=choose]:checked').val(),
                    'provider_name': $('input[name^=choose]:checked').data('doctor'),
                    'type_id': 6,//委託掛號
                    'status_id': 6,//等待中
                    'issued_at': new Date().getTime() / 1000,
                    'vip_id': $('#vips_id').val(),
                    'requester_name': name,
                    'status_name': "等待中",
                    'date': $('#date').val() + ' ' + strUser3,
                    'type_name': "掛號",
                    'description': temp,
                }),
                type: 'post',
                async: false,
                contentType: 'application/json',
                success: function(response){
                    sub_mission_id = response.sub.id;
                },
                error: function(){
                    console.log('error');
                    console.log(Date.parse($('#date').val()));
                }
            });

            var doc_token = getDoctorDeviceToken($('#docuser').val());
            var mission = getMainMission();

            console.log(mission);
            // console.log(JSON.parese( mission ) ;
            
            var notificationData = {
                "to": doc_token,
                "data": {
                    "fcm_type":"回覆",
                    "body": mission.requester_name + " " + mission.description + "委託" + mission.type_name,
                    "title": mission.type_name + "請求",
                    "mission_type_id" : mission.type_id,
                    "mission_type": mission.type_name,
                    "name": mission.requester_name,//request name
                    "issued_at": new Date().getTime() / 1000,//now
                    "description": mission.description,
                    "parent_id": mission.parent_id,//VIP送的那個 missionID
                    "sub_mission_id": sub_mission_id,//委託任務的 mission_id
                },
            }


        
            console.log(notificationData);
            //推送 給google
            $.ajax({
                url: 'https://fcm.googleapis.com/fcm/send',
                type: 'post',
                data: JSON.stringify(notificationData),
                dataType: 'json',
                headers: { // header 中的資訊 放在 headers 中
                    'Authorization': 'key=' + 'AAAAn7TpWdg:APA91bFDBFORFGn2zkaX4n8Sz4xmgek6NyOAYS5JDeR1c6pxODISfzJyHWEPNLwR7XFoB-vMDQVrE4a0F9XYpqOc8lmfn8p6hqzBsCd2zaKLu68GclYYspIJN0SdqQGj-JlPokvRP-X_',      
                    'Content-Type': 'application/json',
                },
                success: function (response)
                {
                    console.log(response);
                },
                error: function (response)
                {
                    console.log(response);
                }
            });

            $.each( zone, function( i, val ) {
                $( "#status" + val ).text( "等待中");
                $( "#status" + val ).css('color', 'GoldenRod');
            });
            //等待中
           
        }
        else
            alert("Error!請選擇委託醫師!");
    });

    var toDoctor = function ($data)
    {
        window.open($('#toDoctor').val()+ '?id=' + $data.vipdata.id + '&& missionId=' + $data.sub.id, "_blank");
    }

}) ()

var getDoctorDeviceToken = function ($id)
{
    var token;

    $.ajax({
        url: $('#docuser').val() + '/'+ $('input[name^=choose]:checked').val(),
        type: 'get',
        contentType: "application/json",
        async: false,
        success: function(response){
            token = response.device_token;
        },
        error: function(){
            console.log('error');
        }
    });

    return token;
}

//傳送進度片語給vip
var SendProgressToVIP = function (text,color,vip,mission)
{   
    console.log(text);
    console.log(vip);
    console.log('url ' + $("#messagesUrl").val());

    //1. 建立message (from_id, to_id, created_at, source_type, source)
    $.ajax({
        url: $("#progressesUrl").val(),
        data:JSON.stringify({
            'mission_id': mission.id,
            "issued_at": new Date().getTime() / 1000,
            "content": text,
            "color": color,
        }),
        type: 'post',
        // async: false,
        contentType: 'application/json',
        success: function(response){
            console.log('send progress success');
        },
        error: function(){
            console.log('error');
        }
    });

    //2. 傳送message notifiation 
    console.log(vip.user.device_token);
    var vip_token; 
    var notificationProgress = {
        "to": vip.user.device_token,
        "data": {
            'fcm_type':'進度',
            'notification_title': mission.type_name + "進度",
            'body': text,
            'mission_id': mission.id,//依據該mission_id update progress content
            'issued_at': new Date().getTime() / 1000,
        },
    }
    
    //推送 FCM
    console.log(notificationProgress);
    $.ajax({
        url: 'https://fcm.googleapis.com/fcm/send',
        type: 'post',
        data: JSON.stringify(notificationProgress),
        dataType: 'json',
        headers: { // header 中的資訊 放在 headers 中
            'Authorization': 'key=' + 'AAAAn7TpWdg:APA91bFDBFORFGn2zkaX4n8Sz4xmgek6NyOAYS5JDeR1c6pxODISfzJyHWEPNLwR7XFoB-vMDQVrE4a0F9XYpqOc8lmfn8p6hqzBsCd2zaKLu68GclYYspIJN0SdqQGj-JlPokvRP-X_',      
            'Content-Type': 'application/json',
        },
        success: function (response){
            console.log(response);
            console.log('notification  success');
        },
        error: function (response){
            console.log(response);
            console.log('notification  fail');
        }
    });//end
}
     