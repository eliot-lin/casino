(function (){

    $('#MissionForm').hide();
    $('#MissionForm2').hide();
    $('#phraseForm').hide();
    
    $('#MissionForm2').on('click' , function () {
        $('#complainForm').fadeOut("slow");
        $('#phraseForm').fadeOut("slow");
        $('#MissionForm').fadeOut("slow");
        $('#MissionForm2').fadeOut("slow");
    });

    $('#suggest').click(function (){
        $('#MissionForm').fadeIn("slow");
        $('#MissionForm2').fadeIn("slow");
    });

    $('#complain').click(function (){
        $('#complainForm').fadeIn("slow");
        $('#MissionForm2').fadeIn("slow");
    });

    $('#cancel').click(function (){
        $('#MissionForm').fadeOut("slow");
        $('#MissionForm2').fadeOut("slow");
    });
    $('#reply').click(function(){
        $('#phraseForm').fadeIn('slow');
        $('#MissionForm2').fadeIn('slow');
    })
    $('#phraseCancel').click(function(){
        $('#phraseForm').fadeOut('slow');
        $('#MissionForm2').fadeOut('slow');
    });
    $('#phraseSend').click(function(){
        $('#phraseForm').fadeOut('slow');
        $('#MissionForm2').fadeOut('slow');
        var temp1 = document.getElementById("missionPhrase");
        var strUser1 = temp1.options[temp1.selectedIndex].text;
        updateMission($('#missionId').val() , {
            'status_id':  2 ,   // 1 待執行  2 執行中  3 完成
            'status_name': "執行中",
            'suggestion': strUser1,
        } );
        console.log($("#missionId").val());
    });
    $('#submit').click(function (){
       
    });

    var birth_str = $('#birthday').text();
    var ori = birth_str;
    var sliced = birth_str.slice(4,birth_str.length);
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    })

    $('#complete').click(function(){
        console.log("press complete");
        if(confirm("確定完成諮詢任務?")){
            updateMission($('#missionId').val() , {
                'status_id':  3 ,   // 1 待執行  2 執行中  3 完成
                'status_name': "完成",
                'finished_at': new Date().getTime() / 1000,
            } );
        }
    });
    // var update = function()
    // {
    //     updateMission($('#missionId').val(), {
    //         'took_at': $('#missionTookAt').val()
    //     });
    // }
    // update();
    var changeChildStatus = function($missionId)
    {   
        console.log($missionId);
        $.ajax({
            url: $('#childIdUrl').val(),
            type: 'get',
            data: {
                'missionId': $missionId
            },
            contentType: 'application/json',
            success: function (missions)
            {
                for(var i = 0;i<missions.length;i++)
                {
                    updateMission(missions[i].id ,{
                        'status_id': 3,
                        'finished_at': new Date().getTime() / 1000,
                   });
                }
                
            },
            error: function(){
                console.log('error!')
            }
        });
    }

    //將狀態為接受請求的醫師  指定爲配對醫師
    $('#SetMissionExcutor').click(function(){


      
        var zone=[];
        $('input[name=chooseDoctor]:checked').each(function () {
          zone.push($(this).val());
        });

       updateMission($('#missionId').val() ,{
            'status_id': 2,
       });

        if(zone.length > 2 || zone.length == 0 )
        {
            alert("選取一個醫生");
            return;
        }

       
        $.each( zone, function( i, val ) { 
            $.ajax({
                url: $('#dnsUrl').val(),
                type: 'get',
                data: {'val':val},
                contentType: 'application/json',
                success: function (doctor)
                {
                    $("#excutor").text("諮詢人員：  " + doctor[0].user.name);
                    $('#excutor').val(doctor[0].user.id);
                    $('#excutor_name').val(doctor[0].user.name);
                    console.log(doctor[0].user.name);
                    $("#cell").text("電話：  " + doctor[0].user.cell);
                    $("#division").text("科別：  " + doctor[0].main_division.name);
                    $("#hospital").text("醫院：  " + doctor[0].hospital.name);
                    $('#drPic').show();
                    $('#default').hide();
                    var oldSrc = 'medical_pic';
                    var newSrc = doctor[0].user.portrait;
                    $('img[src="' + oldSrc + '"]').attr('src', newSrc);
                    updateMission($('#missionId').val() ,{
                        'provider_name': doctor[0].user.name,
                        'provider_id': doctor[0].user.id,
                   });
                },
                error: function(){
                    console.log("error!");
                }
            })
            $( "#status" + val ).text( "諮詢");
            $( "#status" + val ).css('color', 'steelblue');    
        });
        changeChildStatus($('#missionId').val());

    });

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

    //  //發生任務請求給醫生們
    //  $('#SeedMission').click(function(){
    //     var zone=[];
    //     $('input[name=chooseDoctor]:checked').each(function () {
    //       zone.push($(this).val());
    //     });
         
    //     $.each( zone, function( i, val ) {
    //         // //接收
    //         // $( "#status" + val ).text( "接收");
    //         // $( "#status" + val ).css('color', 'Green');

    //         //  //拒絕
    //         //  $( "#status" + val ).text( "拒絕");
    //         //  $( "#status" + val ).css('color', 'red');    

    //          //配對
             
    //     });
    // });
   


    //醫師名單 全選  全不選
    $("#checkAll").change(function () {
        if($('#checkAll').prop("checked"))
            $("input[name=chooseDoctor]").prop("checked", true);
        else
        $("input[name=chooseDoctor]").prop("checked", false);
    });

    var url = document.URL;
    var requester_id = document.URL.substring((document.URL.lastIndexOf('r_id=') + 5), url.indexOf('&&took'));
    var id = document.URL.substring((document.URL.lastIndexOf('?id=') + 4), url.indexOf('&'));

    //發生任務請求給醫生們
    $('#SeedMission').click(function(){
        var zone=[];
        var name=[]

        $('input[name=chooseDoctor]:checked').each(function () {
          zone.push($(this).val());
          name.push($(this).data('doctor'));
        });
         
        $.each( zone, function( i, val ) {
            $( "#status" + val ).text( "等待中");
            $( "#status" + val ).css('color', 'GoldenRod');             
        });

        if($('input:checked').val() != undefined)
        {
            $.ajax({
                type: 'GET',
                url: '/vips',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(vips)
                {
                    var rid;
                    $(vips).each(function (index, vip) {
                        if(requester_id == vip.id) 
                            rid = vip.user_id;
                    });
                    console.log(rid);
                    $.ajax({
                        url: $('#missionSubUrl').val(),
                        
                        data:JSON.stringify({
                            'id': $('#missionId').val(),
                            'provider_id': $('input[name^=chooseDoctor]:checked').val(),
                            'provider_name': $('input[name^=chooseDoctor]:checked').data('doctor'),
                            'type_id': 5,//委託諮詢
                            'status_id': 6,//等待中
                            'issued_at': new Date().getTime() / 1000,
                            'requester_id': rid,
                            'requester_name': $('#vipName').val(),
                            'status_name': "等待中",
                            'type_name': "諮詢",
                            'description': $('#comment').val(),
                            'vip_card_no': "123",
                        }),
                        type: 'post',
                        async: false,
                        contentType: 'application/json',
                        success: function(response){
                            console.log("success");
                        },
                        error: function(){
                            console.log('error');
                            console.log($("#card").val());
                        }
                    });
                },
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
    // console.log($vip.user);

    // $( "#myselect option:selected" ).text();

    
    // var getCreateElement = function()
    // {
    //     $.ajax({
    //         url: $('#missionElementUrl').val(),
    //         data: { 
    //             'id': $('#missionId').val(),
    //             'vip_id': $('vipId').val(),
    //         },
    //         type: 'get',
    //         contentType: 'application/json',
    //         success: function(data){
    //             console.log($('#vipId').val());
    //             storeMission({
    //                 'parent_id': 0,
    //                 'requester_id': $('#vipId').val(),
    //                 'provider_id': $('#excutor').val(),
    //                 'type_id':$('#missionType').val(), //selector value
    //                 'status_id': 0, // 0 待執行  1 執行中  2 完成
    //                 'method': 2,
    //                 'vip_card_no': $('#vipCardNo').val(),
    //                 'type_name': $('#missionType').text(),
    //                 'requester_name': $('#vipName').val(),
    //                 'provider_name':$('#excutor_name').val(),
    //                 'status_name':'待執行',
    //                 'issued_at':'1507206486',
    //                 'description': "這是諮詢完建議任務的掛號訊息",
    //                 'suggestion' : '這是建議訊息'
    //             } );
    //         },
    //         error: function(){
    //             console.log("error!");
    //         }
    //     })
    // }
    //建議任務
    $('#createNewSubmit').click(function(){
        // console.log($('#missionType').val());
        var proNameStr = $('#excutor').text()
        var typeName = document.getElementById("missionType");
        var newMissionTime = new Date().getTime() / 1000;
        var test = newMissionTime;
        var newMissionId;
        console.log($('#excutor').val());
        
        // console.log(typeName.options[typeName.selectedIndex].text);
        storeMission({
            'parent_id': 0,
            'requester_id': $('#vipId').val(),
            'provider_id': $('#excutor').val(),
            'type_id':$('#missionType').val(), //selector value
            'status_id': 1, 
            'method': $('#missionMethod').val(),
            'vip_card_no': $('#vipCardNo').val(),
            'type_name': $('#missionType').attr('rel'),
            'type_name': typeName.options[typeName.selectedIndex].text,
            'requester_name': $('#vipName').val(),
            'provider_name':proNameStr.slice(6, proNameStr.length),
            'group_name':$('#vipGroupName').val(),
            'status_name':'待執行',
            'issued_at': test,
            'description': "這是諮詢完建議任務的掛號訊息",
            'suggestion' : '這是建議訊息'
        } );

        console.log(test);
        $.ajax({
            url: $('#allMission').val(),
            type: 'get',
            async: false,
            contentType: 'application/json',
            success: function(missions)
            {
                newMissionId = missions[missions.length - 1].id;
                createMessage(newMissionId);
                console.log(newMissionId );
            },
            error: function()
            {
                console.log("error");
            }
        })
        
        // createMessage(newMissionId);

        $('#MissionForm').fadeOut("slow");
        $('#MissionForm2').fadeOut("slow");
    });

    var createMessage = function(id)
    {
        console.log(id);
        storeMessage({
            'mission_id': id,
            'from_id': $('#vipId').val(),
            'created_at': new Date().getTime() / 1000,
            'source_type': $('#missionMethod').val(),
            'source': "這是訊息內容",
        })
    }
    // $('#SeedMission').click(function(){

    //     if($('input:checked').val() != undefined)
    //     {
    //         var zone1=[];
    //         $('input[name=chooseDoctor]:checked').each(function () {
    //             zone1.push($(this).val());
    //         });
    //         console.log($('input[name^=chooseDoctor]:checked').data('doctor'));
    //         console.log($('#missionId').val());
    //         $.ajax({
    //             url: $('#missionSubUrl').val(),
                
    //             data:JSON.stringify({
    //                 'id': $('#missionId').val(),
    //                 'provider_id': $('input[name^=chooseDoctor]:checked').val(),
    //                 'provider_name': $('input[name^=chooseDoctor]:checked').data('doctor'),
    //                 'type_id': 1,
    //                 'status_id': 2,
    //                 'issued_at': new Date().getTime() / 1000,
    //             }),
    //             type: 'post',
    //             contentType: 'application/json',
    //             success: function(response){
    //                 alert(response.message);
    //             },
    //             error: function(){
    //                 console.log('error');
    //             }
    //         })

    //         $.each( zone1, function( i, val ) {
    //             $( "#status" + val ).text( "等待中");
    //             $( "#status" + val ).css('color', 'GoldenRod');
    //         });
    //         //等待中
           
    //     }
    //     else
    //         alert("Error!請選擇委託醫師!");
    // });


})()


