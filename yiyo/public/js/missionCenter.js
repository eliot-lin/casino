$(document).ready(function(){

    var selected_missionID = 0;
    // $("#vipProfile").click(function(){
	// 	window.open='localhost/profile/vip';
	// });

    $('#executorInfo').hide();
    $('#MissionForm2').hide();
    $('#MissionForm2').click(function(){
        $('#executorInfo').fadeOut('slow');
        $('#MissionForm2').fadeOut('slow');
        $('#executorTable').DataTable().clear();
        $('#statusInfo').fadeOut('slow');
        $('#MissionForm2').fadeOut('slow');
        $('#statusTable').DataTable().clear();
    })
    $('#missionsTable').dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": true,
        "lengthMenu": [[5,10,15,20], [5,10,15,20]],
        "pageLength": 15,
        "sScrollY":"200px",
        // "sScrollX":"90%"
        // "fixedHeader": {
        //     header: true
        // }
    });
    $('#handle1').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('#missionId-th').attr('checked', false);    
        else
            $('#missionId-th').attr('checked', true);
        
    })
    $('#handle2').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('#owner-th').attr('checked', false);
        else
            $('#owner-th').attr('checked', true);
    })
    var handle3_count = 0;
    $('#handle3').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('#ownerId-th').attr('checked', false);
        else
            $('#ownerId-th').attr('checked', true);
    })
    var handle4_count = 0;
    $('#handle4').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('#missionType-th').attr('checked', false);
        else
            $('#missionType-th').attr('checked', true);
    })
    var handle5_count = 0;
    $('#handle5').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('#vip-th').attr('checked', false);
        else
            $('#vip-th').attr('checked', true);
    })
    var handle6_count = 0;
    // $('#handle6').click(function(e){
    //     if(!e.shiftKey)
    //         $('input[name^=handle-th]:checked').attr('checked', false);
    //     if($(this).hasClass("sorting"))
    //         $('#executor-th').attr('checked', false);
    //     else
    //         $('#executor-th').attr('checked', true);
    // })
    var handle7_count = 0;
    $('#handle7').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('#status-th').attr('checked', false);
        else
            $('#status-th').attr('checked', true);
        
    })
    var handle8_count = 0;
    $('#handle8').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('#missionAge-th').attr('checked', false);
        else
            $('#missionAge-th').attr('checked', true);
      
    })
    // var handle9_count = 0;
    // $('#handle9').click(function(e){
    //     if(!e.shiftKey)
    //         $('input[name^=handle-th]:checked').attr('checked', false);
    //     if($(this).hasClass("sorting"))
    //         $('#message-th').attr('checked', false);
    //     else
    //         $('#message-th').attr('checked', true);
    // })


    $('#btnRegister').click(function(){
        if($('input[id^=choose]:checked').val() != undefined)
        {
            m_id = $('input:checked').val();
            console.log(m_id);
            nMission =  getMainMission( m_id );
            console.log('mission');
            console.log(nMission);
            //掛號請求處理中
            SendProgressToVIP("inprogress","#FFD700",nMission.requester,nMission);
            
            window.open($('#registerUrl').val() + '?' + "id" + "=" + m_id+'&&requester_id='+nMission.requester_id+'&&took_at='+new Date().getTime() / 1000);
        }
        else
            alert("Error!請選擇任務或VIP!");
    })
    $('#btnVisit').click(function(){
        if($('input[id^=choose]:checked').val() != undefined)
            window.open($('#visitUrl').val() + '?' + 'id' + '='+ $('input:checked').val()+'&&requester_id=' + $('input:checked').data('requester_id')+'&&took_at='+new Date().getTime() / 1000);
        else
            alert("Error!請選擇任務或VIP!");
    })
    $('#btnConsult').click(function(){
        if($('input[id^=choose]:checked').val() != undefined)
        {
            m_id = $('input:checked').val();
            nMission =  getMainMission( m_id );
            console.log('mission');
            console.log(nMission);
            //掛號請求處理中
            SendProgressToVIP("inprogress","#FFD700",nMission.requester,nMission);
            
            //諮詢請求處理中
            window.open($('#consultUrl').val() + '?id=' + m_id +'&&requester_id=' + nMission.requester_id + '&&took_at='+new Date().getTime() / 1000);
        }
        else
            alert("Error!請選擇任務或VIP!");
    })

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    })
    var time = function($data){
        if($data == 0)
        {
            return '未完成';
        }
        var t = new Date($data*1000);
        return t.getFullYear()+'/'+(t.getMonth()+1)+'/'+t.getDate() +'<br>'+
        t.getHours() +':'+t.getMinutes()+':'+t.getSeconds();
    }
    var checkPast = function($data)
    {
        var t = new Date($data*1000);
        if(t.getFullYear() <　new Date().getFullYear())
            return 1;
        else if(t.getMonth() < new Date().getMonth())
            return 1;
        else if(t.getDate() < new Date().getDate())
            return 1;
        else
            return 0;
    }
    // var getExecutor = function($id)
    // {   
    //     console.log($id);
    //     $.ajax({
    //         url: $('#executorUrl').val() + '/' + $id,
    //         type: 'get',
    //         contentType: 'application/json',
    //         success: function (missions)
    //         {
    //             console.log(missions);
    //             var trs = [];
    //             var trsPast = [];
    //             var trsPastFinished = [];
    //             for(var i = 0;i<missions.length;i++)
    //             {   
    //                 console.log(missions[i].requester.name);
    //                 if(checkPast(missions[i].issued_at) || missions[i].status_id == 3)
    //                 {
    //                     // if(missions[i].status_id == 3)
    //                     // {
    //                     //     trsPastFinished.push(
    //                     //         [   
    //                     //             '',
    //                     //             '' + missions[i].id + '',
    //                     //             missions[i].type.name,
    //                     //             missions[i].requester.name,
    //                     //             missions[i].provider_name,
    //                     //             '<span style = "color:'+statusColor(missions[i].status_id)+'">' + missions[i].status.name + '</span>',
    //                     //             time(missions[i].issued_at),
    //                     //             time(missions[i].finished_at),
    //                     //         ]);

    //                     // }
    //                     // else
    //                     // {
    //                     //     trsPast.push(
    //                     //     [   
    //                     //         '',
    //                     //         '' + missions[i].id + '',
    //                     //         missions[i].type.name,
    //                     //         missions[i].requester.name,
    //                     //         missions[i].provider_name,
    //                     //         '<span style = "color:'+statusColor(missions[i].status_id)+'">' + missions[i].status.name + '</span>',
    //                     //         time(missions[i].issued_at),
    //                     //         time(missions[i].finished_at),
    //                     //     ]);
    //                     // }
    //                 }
    //                 else
    //                 {
    //                     trs.push(
    //                     [   
    //                         '',
    //                         '' + missions[i].id + '',
    //                         missions[i].type.name,
    //                         missions[i].requester.name,
    //                         // missions[i].provider_name,
    //                         '<span style = "color:'+statusColor(missions[i].status_id)+'">' + missions[i].status.name + '</span>',
    //                         time(missions[i].issued_at),
    //                         time(missions[i].finished_at),
    //                     ]);
                    
    //                 }
    //             }
    //             console.log(trs);
    //             $('#executorTable').DataTable().rows.add(trs).draw(false);
    //             var table = $('#executorTable').DataTable();
    //             table.rows.add(trsPast).draw().nodes().to$().addClass('pastNotFinished');
    //             table.rows.add(trsPastFinished).draw().nodes().to$().addClass('pastFinished');
    //         },
    //         error: function(){
    //             console.log('error!')
    //         }
    //     });
    // }

    var getStatus = function($id, $missionId)
    {   
        console.log($id);
        $.ajax({
            url: $('#statusUrl').val(),
            type: 'get',
            data: {
                'vipId': $id,
                'missionId': $missionId
            },
            contentType: 'application/json',
            success: function (missions)
            {
                
                var trs = [];
                for(var i = 0;i<missions.length;i++)
                {   
                    trs.push(
                        [   
                            '',
                            '' + missions[i].id + '',
                            missions[i].type.name,
                            missions[i].requester.name,
                            // missions[i].provider_name,
                            '<span style = "cursor:pointer; color:'+statusColor(missions[i].status_id)+'">' + missions[i].status.name + '</span>',
                            time(missions[i].issued_at),
                            time(missions[i].finished_at),
                        ]
                    );
                }
                $('#statusTable').DataTable().rows.add(trs).draw(false);
            },
            error: function(){
                console.log('error!')
            }
        });
    }

    var getMission = function ($id)
    {
       
        $.ajax({
            url: $('#vipMissionUrl').val() + '/' + $id,
            type: 'get',
            contentType: 'application/json',
            // text/html
            success: function (mission)
            { console.log($id);
                // console.log(mission);
                // console.log(JSON.parse(mission));
                console.log($('.vip-info #vipName').text());
                if($('.vip-info #vipName').text()=="" || $('.vip-info').is(':visible') == false)
                {   console.log($('.vip-info #vipName').text());
                    $('.vip-info').slideToggle(500);
                    $('.vip-info #vipName').text(mission.requester.name);
                    $('.vip-info #vipSex').text(sex(mission.requester.sex));
                    $('.vip-info #vipAge').text(vipAge(mission.requester.birthday));
                    $('.vip-info #vipMarital').text(marital(mission.requester.marital_status));
                    $('.vip-info #vipCell').text(mission.requester.cell);
                    $('.vip-info #vipAddress').text(mission.requester.address);
                    $('.vip-info #vipVisitAddress').text(mission.requester.member.address_visit);
                    $('.vip-info #vipSurgeryRec').text(mission.requester.member.medicine_records);
                    $('.vip-info #vipMedRec').text(mission.requester.member.medicine_records);
                  
                    var oldSrc = 'medical_pic';
                    var newSrc = mission.requester.portrait;
                    $('#vipPortrait').attr('src', newSrc);
                // $('body').append(mission);
               }
               else if($('.vip-info').is(':visible') && mission.requester.name!=$('.vip-info #vipName').text())
               {    console.log($('.vip-info #vipName').text());
                    $('.vip-info #vipName').text(mission.requester.name);
                    $('.vip-info #vipSex').text(sex(mission.requester.sex));
                    $('.vip-info #vipAge').text(vipAge(mission.requester.birthday));
                    $('.vip-info #vipMarital').text(marital(mission.requester.marital_status));
                    $('.vip-info #vipCell').text(mission.requester.cell);
                    $('.vip-info #vipAddress').text(mission.requester.address);
                    $('.vip-info #vipVisitAddress').text(mission.requester.member.address_visit);
                    $('.vip-info #vipSurgeryRec').text(mission.requester.member.medicine_records);
                    $('.vip-info #vipMedRec').text(mission.requester.member.medicine_records);

                    var oldSrc = 'medical_pic';
                    var newSrc = mission.requester.portrait;
                    $('#vipPortrait').attr('src', newSrc);
               }
               else if($('.vip-info').is(':visible') && mission.requester.name==$('.vip-info #vipName').text())
               {
                
                    $('.vip-info').slideToggle(500);
                    $('.vip-info #vipName').text(mission.requester.name);
                    $('.vip-info #vipSex').text(sex(mission.requester.sex));
                    $('.vip-info #vipAge').text(vipAge(mission.requester.birthday));
                    $('.vip-info #vipMarital').text(marital(mission.requester.marital_status));
                    $('.vip-info #vipCell').text(mission.requester.cell);
                    $('.vip-info #vipAddress').text(mission.requester.address);
                    $('.vip-info #vipVisitAddress').text(mission.requester.member.address_visit);
                    $('.vip-info #vipSurgeryRec').text(mission.requester.member.medicine_records);
                    $('.vip-info #vipMedRec').text(mission.requester.member.medicine_records);

                    var oldSrc = 'medical_pic';
                    var newSrc = mission.requester.portrait;
                    $('#vipPortrait').attr('src', newSrc);
               }
            }
        });
    }
    var getCare = function ($id)
    {
        $.ajax({
            url: $('#vipMissionUrl').val() + '/' + $id,
            type: 'get',
            contentType: 'application/json',
            // text/html
            success: function (mission)
            {
                
                console.log($('.care-info #careName').text());
                if($('.care-info #careName').text()=="" || $('.care-info').is(':visible') == false)
                {   console.log($('.care-info #careName').text());
                    $('.care-info').slideToggle(500);
                    $('.care-info #careName').text(mission.requester.name);
                    $('.care-info #careSex').text(sex(mission.requester.sex));
                    $('.care-info #careAge').text(vipAge(mission.requester.birthday));
                    $('.care-info #careCell').text(mission.requester.cell);
                    $('.care-info #careMarital').text(marital(mission.requester.marital_status));
                    $('.care-info #careAddress').text(mission.requester.address);
                    $('.care-info #careVisitAddress').text(mission.requester.member.address_visit);
                    $('.care-info #careSurgeryRec').text(mission.requester.member.medicine_records);
                    $('.care-info #careMedRec').text(mission.requester.medicine_records);

                    var oldSrc = 'medical_pic';
                    var newSrc = mission.requester.portrait;
                    $('#carePortrait').attr('src', newSrc);
                // $('body').append(mission);
               }
               else if($('.care-info').is(':visible') && mission.requester.name!=$('.care-info #careName').text())
               {    console.log($('.care-info #careName').text());
                    $('.care-info #careName').text(mission.requester.name);
                    $('.care-info #careSex').text(sex(mission.requester.sex));
                    $('.care-info #careAge').text(vipAge(mission.requester.birthday));
                    $('.care-info #careCell').text(mission.requester.cell);
                    $('.care-info #careMarital').text(marital(mission.requester.marital_status));
                    $('.care-info #careAddress').text(mission.requester.address);
                    $('.care-info #careVisitAddress').text(mission.requester.member.address_visit);
                    $('.care-info #careSurgeryRec').text(mission.requester.member.medicine_records);
                    $('.care-info #careMedRec').text(mission.requester.medicine_records);

                    var oldSrc = 'medical_pic';
                    var newSrc = mission.requester.portrait;
                    $('#carePortrait').attr('src', newSrc);
               }
               else if($('.care-info').is(':visible') && mission.requester.name==$('.care-info #careName').text())
               {
                
                    $('.care-info').slideToggle(500);
                    $('.care-info #careName').text(mission.requester.name);
                    $('.care-info #careSex').text(sex(mission.requester.sex));
                    $('.care-info #careAge').text(vipAge(mission.requester.birthday));
                    $('.care-info #careCell').text(mission.requester.cell);
                    $('.care-info #careMarital').text(marital(mission.requester.marital_status));
                    $('.care-info #careAddress').text(mission.requester.address);
                    $('.care-info #careVisitAddress').text(mission.requester.member.address_visit);
                    $('.care-info #careSurgeryRec').text(mission.requester.member.medicine_records);
                    $('.care-info #careMedRec').text(mission.requester.medicine_records);

                    var oldSrc = 'medical_pic';
                    var newSrc = mission.requester.portrait;
                    $('#carePortrait').attr('src', newSrc);
               }
            }
        });
    }

    $('body').on('change', 'input[id^="choose"]', function(){
        console.log('check');
        selected_missionID = $(this).data('id');

        console.log($(this).data('id'));
        console.log($(this).data('requester_id'));
        getMission($(this).data('id'));
    })
    $('body').on('click', 'span[id^="vip"]', function () {
        $('#choose'+$(this).data('missionid')+'').prop('checked',true);
        console.log($(this).data('id'));
        getMission($(this).data('missionid'));
    })
    $('body').on('change', 'input[id^="_choose"]', function(){
        console.log('check');
        console.log($(this).data('id'));
        getCare($(this).data('id'));
    })
    $('body').on('click', 'span[id^="_vip"]', function () {
        $('#_choose'+$(this).data('careid')+'').prop('checked',true);
        getCare($(this).data('id'));
    })
    $('body').on('click', 'span[id^="mission"]', function(){
        console.log($(this));
        console.log($(this).data('type'));
        $('#choose'+$(this).data('id')+'').prop('checked',true);
        console.log($('input:checked').data('requester_id'));
        getMission($('input:checked').data('requester_id'));
        switch($(this).data('type'))
        {  
            case 1: window.open($('#consultUrl').val()+'?id='+$('input:checked').val()+'&&requester_id='+$('input:checked').data('requester_id')+'&&took_at='+new Date().getTime() / 1000, "_blank"); break;
            case 2: window.open($('#registerUrl').val()+'?id='+$('input:checked').val()+'&&requester_id='+$('input:checked').data('requester_id')+'&&took_at='+new Date().getTime() / 1000, "_blank"); break;
            case 3: window.open($('#visitUrl').val()+'?id='+$('input:checked').val()+'&&requester_id='+$('input:checked').data('requester_id')+'&&took_at='+new Date().getTime() / 1000, '_blank'); break;
            case 4: confirm("傳送急診片語?"); break;
        }
    })
    $('body').on('click', 'a[id^=method]', function(){
        console.log($(this).data('method'));
        $('#choose'+$(this).data('id')+'').prop('checked',true);
        if($(this).data('method') == 0)
        {
            window.open($('#messageUrl').val());
            $(this).css("color", "grey");
            getMission($(this).data('id'));
        }
        if($(this).data('method') == 1)
        {
            $(this).toggle(function(){
            $(this).removeClass('glyphicon-play-circle').addClass('glyphicon-pause');
            }, function(){$(this).removeClass('glyphicon-pause').addClass('glyphicon-play-circle').css("color", "grey");});
            getMission($(this).data('id'));
        }
    })
    // $('body').on('click', 'span[id^=executor]', function(){
    //     $('#choose'+$(this).data('id')+'').prop('checked',true);
    //     console.log($(this).data('correspondent'));
    //     $('#executorInfo').fadeIn('slow');
    //     $('#MissionForm2').fadeIn('slow');
    //     getExecutor($(this).data('correspondent'));
    //     console.log($('#executorTable'));
    //     getMission($('input:checked').data('requester_id'));
        
    // })
    // $('body').on('click', 'span[id^=status]', function(){
    //     $('#choose'+$(this).data('id')+'').prop('checked',true);
    //     console.log($(this).data('vip'));
    //     getStatus($(this).data('vip'),$(this).data('id'));
    //     $('#statusInfo').fadeIn('slow');
    //     $('#MissionForm2').fadeIn('slow');
    //     getMission($('input:checked').data('requester_id'));
    // })
    // $('body').on('click', 'span[id^=_executor]', function(){
    //     $('#_choose'+$(this).data('id')+'').prop('checked',true);
    //     console.log($(this).data('correspondent'));
    //     getExecutor($(this).data('correspondent'));
    //     $('#executorInfo').fadeIn('slow');
    //     $('#MissionForm2').fadeIn('slow');
    //     console.log($("input[id^='_choose']:checked").val());
    //     getCare($("input[id^='_choose']:checked").data('requester_id'));
    // })
    $('body').on('click', 'span[id^=_mission]', function(){
        $('#_choose'+$(this).data('id')+'').attr('checked',true);
        getStatus($(this).data('vip'),$(this).data('id'));
        $('#statusInfo').fadeIn('slow');
        $('#MissionForm2').fadeIn('slow');
    })
    var getMissions = function ()
    {
        $.ajax({
            url: $('#handleMissionsUrl').val(),
            type: 'get',
            contentType: 'application/json',
            success: function (missions)
            {
                var trs = [];
                for (var i = 0; i < missions.length; i++) { 
                    console.log(missions[i]);
                    if( missions[i].type.id == 0)continue;
                    trs.push(
                        [
                            '<input type = "radio" name = "choose" data-id = "'+missions[i].id+'"id="choose' + missions[i].id+'" value = "'+ missions[i].id +'" data-requester_id = "'+missions[i].requester.member.id+'">',
                            '' + missions[i].id + '',
                            '<span id = "owner' + missions[i].id + '" data-id = "'+missions[i].requester.member.user_id+'">' + missions[i].requester.name + '</span>',
                            '<span id = "member' + missions[i].id+ '" data-id = "'+missions[i].requester.member.user_id+'">'+missions[i].requester.member.card_no+'</span>',
                            '<button id="'+ missions[i].id + '" type="button" class="btn btn-' + missionTypeButtonClass(missions[i].type.name) +'" onclick="getMissionPage(this.id)" >' + missions[i].type.name + '</button>',
                            '<span id = "vip' + missions[i].id + '" data-missionid="'+missions[i].id+'"data-id="' + missions[i].requester.member.id + '" style = "cursor:pointer;">' + missions[i].requester.name + '</span>',
                            // '<span id = "executor"' + missions[i].id + ' data-correspondent="' + missions[i].provider_id + '" style = "cursor:pointer"  data-id = "'+missions[i].id+'">' + missions[i].provider_name + '</span>',
                            '<span id = "status"' + missions[i].id + ' data-status="'+ missions[i].status_id +'" data-vip="'+missions[i].requester_id+'"style = "cursor:pointer; color:'+statusColor(missions[i].status_id)+'"  data-id = "'+missions[i].id+'">' + missions[i].status.name + '</span>',
                            '<span id = "age'+missions[i].id+'" data-sort = "'+missions[i].issued_at+'" style = "color:'+ missionColor(missions[i].type_id) +'"  data-id = "'+missions[i].id+'">'+missions[i].issued_at+'</span>',
                            '<a href="#" id = "method'+ missions[i].id +'" data-sort = "'+missions[i].method+'"data-method = "'+ missions[i].method +'" class="'+ missionMethod(missions[i].method)+'" style = "text-decoration:none;"  data-id = "'+missions[i].id+'"><span style="display:none;">'+missions[i].method+'</span></a>'
                        ]
                    );
                }
                // $('#missionsTable tbody').append(trs.join(' '));
                $('#missionsTable').DataTable().rows.add(trs).draw(false);
                
            },
            error: function ()
            {
                console.log('error');
            }
        });
    }
    getMissions();


    var getCares = function ()
    {
        $.ajax({
            url: $('#concernMissionsUrl').val(),
            type: 'get',
            contentType: 'application/json',
            success: function (missions)
            {
                var trs = [];
                for (var i = 0; i < missions.length; i++) {
                    console.log(missions[i].provider_id);
                    trs.push(
                        [
                            '<input type = "radio" name = "_choose" id="_choose' + missions[i].id+'" value = "'+ missions[i].requester.user_id +'" data-id = "'+missions[i].id+'">',
                            // '' + missions[i].id + '',
                            '<span id = "_owner' + missions[i].id + '" data-id = "'+missions[i].requester.member.user_id+'">' + missions[i].requester.name + '</span>',
                            '<span id = "_member' + missions[i].id+ '" data-id = "'+missions[i].requester.member.user_id+'">'+missions[i].requester.member.card_no+'</span>',
                            '<span  id = "_mission' + missions[i].id + '"data-type="'+ missions[i].type_id + '" data-vip = "'+missions[i].requester_id +'"data-id = "'+missions[i].id+'" style = "cursor:pointer;">' + missions[i].type.name +'</span>',
                            '<span id = "_vip' + missions[i].id + '" data-careid="'+missions[i].id+'"data-id="' + missions[i].requester.member.user_id + '" style = "cursor:pointer;">' + missions[i].requester.name + '</span>',
                            // '<span  id = "_executor"' + missions[i].id + '" data-correspondent="' + missions[i].provider_id + '" style = "cursor:pointer"  data-id = "'+missions[i].id+'">' + missions[i].provider_name + '</span>',
                            '<span  id = "_age'+ missions[i].id +'"style = "color:green;" data-id = "'+missions[i].id+'"></span>',
                        ]
                    );
                }
                // $('#missionsTable tbody').append(trs.join(' '));
                $('#careTable').DataTable().rows.add(trs).draw(false);
            },
            error: function ()
            {
                console.log('error');
            }
        });
    }
    getCares();

    $('.vip-info').hide();
    $('.care-info').hide();
    $('.glyphicon.glyphicon-envelope').click(function(){
        window.open("{{url('callcenter/message')}}", "_blank");
        $(this).css("color", "grey");
    })

    $('.glyphicon-play-circle').toggle(function(){
        $(this).removeClass('glyphicon-play-circle').addClass('glyphicon-pause');
    }, function(){$(this).removeClass('glyphicon-pause').addClass('glyphicon-play-circle').css("color", "grey");});
    
    


    function executor() {
        window.open($('#executorUrl').val(), "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=500,width=800,height=400");
    }
    function status()
    {
        window.open($('#statusUrl').val(), "_blank", "toolbar=yes,scrollbar=yes,resizable=yes,top=50,left=500,width=800,height=400");
    }
    function marital($marital)
    {
        if($marital == 0)
            return "已婚";
        if($marital == 1)
            return "未婚";
        if($marital == 2)
            return "不公開";
    }
    function sex($sex)
    {
        if($sex == 1)
            return "男";
        if($sex == 2)
            return "女";
    }

   
    function vipAge($string)
    {
        console.log($string);
        var birth = $string;
        console.log(birth);
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
                        var timer =hours + "h "
                        + minutes + "m " + seconds + "s ";
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
    var countConcernAge = function(){
        $.ajax({
            url: $('#concernMissionsUrl').val() + '/',
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
                        var distance = now/1000 - missions[i].finished_at;
                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (60 * 60 * 24));
                        var hours = Math.floor((distance % (60 * 60 * 24)) / ( 60 * 60));
                        var minutes = Math.floor((distance % (60 * 60)) / (60));
                        var seconds = Math.floor(distance % 60);
                        //days + "d " 
                        var timer =hours + "h "
                        + minutes + "m " + seconds + "s ";
                        // $('.navbar-brand').text(a);
                        $('[id="_age'+missions[i].id+'"]').text(timer);
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
    countConcernAge();

    $('#delteMission').click(function(){
        if($('input[id^=choose]:checked').val() != undefined)
        {
            console.log('MID' + selected_missionID);
            deletMission(selected_missionID);
            // $('#missionsTable').DataTable().clear();
            // getMissionList();
        }
        else
            alert("Error!請選擇任務或VIP!");
    });
  
});

var deletMission = function($id){
   
    $.ajax({
        url: $('#vipMissionUrl').val() + '/' + $id,
        type: 'delete',
        contentType: 'application/json',
        success: function(response){
            console.log('delete success');
            alert("資料刪除成功！");
            $('#missionsTable').DataTable().clear();
            getMissionList();
        },
        error: function(){
            console.log('error');
        }
    });

}

var getMissionList = function ()
{
    $.ajax({
        url: $('#handleMissionsUrl').val(),
        type: 'get',
        contentType: 'application/json',
        success: function (missions)
        {
            var trs = [];
            for (var i = 0; i < missions.length; i++) { 
                console.log(missions[i]);
                if( missions[i].type.id == 0)continue;
                trs.push(
                    [
                    
                        '<input type = "radio" name = "choose" data-id = "'+missions[i].id+'"id="choose' + missions[i].id+'" value = "'+ missions[i].id +'" data-requester_id = "'+missions[i].requester.member.id+'">',
                        '' + missions[i].id + '',
                        '<span id = "owner' + missions[i].id + '" data-id = "'+missions[i].requester.member.user_id+'">' + missions[i].requester.name + '</span>',
                        '<span id = "member' + missions[i].id+ '" data-id = "'+missions[i].requester.member.user_id+'">'+missions[i].requester.member.card_no+'</span>',
                        '<button id="'+ missions[i].id + '" type="button" class="btn btn-' + missionTypeButtonClass(missions[i].type.name) +'" onclick="getMissionPage(this.id)" >' + missions[i].type.name + '</button>',
                        '<span id = "vip' + missions[i].id + '" data-missionid="'+missions[i].id+'"data-id="' + missions[i].requester.member.id + '" style = "cursor:pointer;">' + missions[i].requester.name + '</span>',
                        // '<span id = "executor"' + missions[i].id + ' data-correspondent="' + missions[i].provider_id + '" style = "cursor:pointer"  data-id = "'+missions[i].id+'">' + missions[i].provider_name + '</span>',
                        '<span id = "status"' + missions[i].id + ' data-status="'+ missions[i].status_id +'" data-vip="'+missions[i].requester_id+'"style = "cursor:pointer; color:'+statusColor(missions[i].status_id)+'"  data-id = "'+missions[i].id+'">' + missions[i].status.name + '</span>',
                        '<span id = "age'+missions[i].id+'" data-sort = "'+missions[i].issued_at+'" style = "color:'+ missionColor(missions[i].type_id) +'"  data-id = "'+missions[i].id+'">'+missions[i].issued_at+'</span>',
                        '<a href="#" id = "method'+ missions[i].id +'" data-sort = "'+missions[i].method+'"data-method = "'+ missions[i].method +'" class="'+ missionMethod(missions[i].method)+'" style = "text-decoration:none;"  data-id = "'+missions[i].id+'"><span style="display:none;">'+missions[i].method+'</span></a>'
                    ]
                );
            }
            // $('#missionsTable tbody').append(trs.join(' '));
            $('#missionsTable').DataTable().rows.add(trs).draw(false);
            
        },
        error: function ()
        {
            console.log('error');
        }
    });
}


var getMainMission = function ($id){

    var mission;
    $.ajax({
        url: $('#vipMissionUrl').val() + '/' + $id,
        type: 'get',
        contentType: 'application/json',
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


var getMissionPage = function($id){
    
     console.log('id');
     console.log($id);
     nMission =  getMainMission( $id );
     console.log('mission');
     console.log(nMission);

     //掛號請求處理中
     SendProgressToVIP("inprogress","#FFD700",nMission.requester,nMission);


     $.ajax({
        type: 'GET',
        url: '/vips',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(results)
        {   
            var temp;
            $(results).each(function (index, result) {
                if(result.user_id == nMission.requester_id)
                temp = result.id;
            });
            if(results)
            window.open(missionTypeEng(nMission.type_name) + '?' + "id" + "=" + $id+'&&requester_id='+ temp +'&&took_at='+new Date().getTime() / 1000);
        }
    });
 }

$("#list")

$("#gray").click(function() {
    $("#add").fadeOut("slow");
    $("#gray").fadeOut("slow");
});

 $("#newMission").click(function () {
    $("#add").fadeIn("slow");
    $("#gray").fadeIn("slow");
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
 
 $.ajax({
    type: 'GET',
    url: '/users/new',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(users)
    {
        $(users).each(function (index, user) {
            $('#list').append($('<option>', {
                value: user.id,
                text: user.name + "、" + user.id_no,
            }));
        });
    },
});

$.ajax({
    type: 'GET',
    url: '/vips',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(users)
    {
        $("#list").change(function() {
            var id = $(this).find('option:selected').val();
            var name = $(this).find('option:selected').text();
            name = name.substring(0, name.indexOf('、'));
            console.log(id, name);

            $(users).each(function (index, user) {
                if(user.id == id) {
                    $("#card_no").text(user.card_no);
                }
            });

            $("#sub").click(function(){

                var temp1 = document.getElementById("hospitalSelector");
                var strUser1 = temp1.options[temp1.selectedIndex].text;
            
                var temp3 = document.getElementById("diagnosis");
                var strUser3 = temp3.options[temp3.selectedIndex].text;
            
                var description = ("醫院："  + strUser1 + "<br></br>日期、時間：" + $("#date").val() + " " + strUser3 + "<br></br>症狀: " + $("#des").val() + "<br></br>指定醫師: " + $("#drname").val());
                console.log(description);
            
                var ms = new Object();
                
                ms.requester_name = name;
                ms.requester_id = id;
                ms.type_id = 2;
                ms.type_name = "掛號";
                ms.date = $("#date").val();
                ms.status_id = 1;
                ms.status_name = "未執行";
                ms.description = description;
                ms.vip_card_no = "S001-000" + id;
            
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
                
                ms.requester_name = name;
                ms.requester_id = id;
                ms.type_id = 1;
                ms.type_name = "諮詢";
                ms.status_id = 1;
                ms.status_name = "未執行";
                ms.description = $("#des2").val();
                ms.vip_card_no = "S001-000" + id;
            
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
            $("#sub3").click(function(){
            
                var ms2 = new Object();
                
                ms2.requester_name = name;
                ms2.requester_id = id;
                ms2.type_id = 3;
                ms2.type_name = "出診";
                ms2.status_id = 1;
                ms2.status_name = "未執行";
                ms2.description = $("#des3").val();
                ms2.vip_card_no = "S001-000" + id;
                ms2.date = $("#date3").val();
                
                ms2.visitAddress = $("#address").val();
            
                $.ajax({
                    type: 'POST',
                    url: '/missions',
                    data: ms2,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(results)
                    {
                        
                        console.log(ms2);
                        console.log(results);
                        
                    }
                });
            });
            // $('#careTable').DataTable().rows.add(trs).draw(false);
        });

        $("#service").change(function() {
            if($(this).children(":selected").val() == 1) {
                $("#registerTable").hide("slow");
                $("#visitTable").hide("slow");
                $("#consultationTable").fadeIn("slow");
            }
            else if($(this).children(":selected").val() == 2) {
                $("#registerTable").fadeIn("slow");
                $("#visitTable").hide("slow");
                $("#consultationTable").hide("slow");
            }
            else if($(this).children(":selected").val() == 3) {
                $("#registerTable").hide("slow");
                $("#visitTable").fadeIn("slow");
                $("#consultationTable").hide("slow");
            }
            
        })

    },
});

 
 //傳送片語給vip
 var SendProgressToVIP = function (text,color,vip,mission)
 {   
     console.log(text);
     console.log(vip);

     //1. progress (from_id, to_id, created_at, source_type, source)
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

     //2. 傳送progress notifiation 
     console.log(vip.device_token);
     var vip_token; 
     var notificationProgress= {
         "to": vip.device_token,
         "data": {
            'fcm_type':'進度',
             'mission_id': mission.id,
             "issued_at": new Date().getTime() / 1000,
             "content": text,
             "color": color,
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

 var VisibleMenu = ''; // 記錄目前顯示的子選單的 ID

 // 顯示或隱藏子選單
 function switchMenu( theMainMenu, theSubMenu, theEvent ){
     var SubMenu = document.getElementById( theSubMenu );
     if( SubMenu.style.display == 'none' ){ // 顯示子選單
         SubMenu.style.minWidth = theMainMenu.clientWidth; // 讓子選單的最小寬度與主選單相同 (僅為了美觀)
         SubMenu.style.display = 'block';
         hideMenu(); // 隱藏子選單
         VisibleMenu = theSubMenu;
     }
     else{ // 隱藏子選單
         if( theEvent != 'MouseOver' || VisibleMenu != theSubMenu ){
             SubMenu.style.display = 'none';
             VisibleMenu = '';
         }
     }
 }
 
 // 隱藏子選單
 function hideMenu(){
     if( VisibleMenu != '' ){
         document.getElementById( VisibleMenu ).style.display = 'none';
     }
     VisibleMenu = '';
 }

 var missionTypeButtonClass = function($type)
 {
    switch($type)
    {   
        case '委託掛號':
            return "primary";
        case '掛號':
            return "success";
        case '諮詢':
            return "info";
        case '急診':
            return "danger";
        case '出診':
            return "warning";
        case '委託掛號': 
            return "primary";
        case '委託諮詢': 
            return "primary";
        default :
            return "info";
    }
 }

 function statusColor($status)
 {
     if($status == 1)
         return  "red";
     if($status == 2)
         return "orange";
     if($status == 6)
         return "red";
     
 }

 function missionColor($type)
 {
     switch($type)
     {
         case 1: 
             return "green";
         case 2: 
             return "orange";
         case 3: 
             return "blue";
         case 4: 
             return "red";
     }
 }

 function missionAge($type)
 {
     switch($type)
     {
         case 0: return "3H"; break;
         case 1: return "24H"; break;
         case 2: return "0.5H"; break;
         case 3: return "6H"; break;
     }
 }

 function missionColor($type)
 {
     switch($type)
     {
         case 1: 
             return "green";
         case 2: 
             return "orange";
         case 3: 
             return "blue";
         case 4: 
             return "red";
     }
 }

 function missionMethod($data)
 {
     switch($data)
     {
         case 0: return "glyphicon glyphicon-envelope"; break;
         case 1: return "glyphicon glyphicon-play-circle"; break;
         case 2: return "glyphicon glyphicon-earphone"; break;
     }
 }


 function missionTypeEng($type)
 {
     switch($type)
     {
         case '掛號': 
             return "register";
         case '出診': 
             return "visit";
         case '諮詢': 
             return "consultation";
     }
 }
