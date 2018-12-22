(function () {   
    $('.cmuh').click(function(){
        window.open('http://www.cmuh.cmu.edu.tw/web/dep_index.php?depid=17652', '_blank');
    }); 

    $('.ntuh').click(function(){
        window.open('https://reg.ntuh.gov.tw/webadministration/', '_blank');
    }); 

    $('.ccgh').click(function(){
        window.open('http://www.ccgh.com.tw/html/webap.aspx?pagetype=3&otherkind=1', '_blank');
    }); 

    $('.kmuh').click(function(){
        window.open('http://www.kmuh.org.tw/KMUHWeb/Pages/P02Register/NetReg/NetRegFirst.aspx', '_blank');
    }); 
    
    $('.femh').click(function(){
        window.open('http://www.femh.org.tw/webregs/start.aspx', '_blank');
    }); 

    $('.vghks').click(function(){
        window.open('http://www.vghks.gov.tw/Advanced_Search.aspx?q=%E6%8E%9B%E8%99%9F', '_blank');
    }); 

    $('.hlh').click(function(){
        window.open('http://webreg.hwln.mohw.gov.tw/Oinetreg/', '_blank');
    }); 
 
    $('.visit-btn').click(function(){
        confirm("傳送出診片語?");
    });

    var url = document.URL;
    var requester_id = document.URL.substring((document.URL.lastIndexOf('r_id=') + 5), url.indexOf('&&took'));
    var id = document.URL.substring((document.URL.lastIndexOf('?id=') + 4), url.indexOf('&'));
    console.log(requester_id);

    $('.CompleteVisitMission').click(function(){
        if(confirm("確定完成出診任務?")){
            
            updateMission(id , {
                'status_id':  3 ,   // 1 待執行  2 執行中  3 完成
                'status_name': "完成",
                'finished_at': new Date().getTime() / 1000
            } );
        }
    });
   
    
    $(".data-table").dataTable();

    // 拿 出診日期
    var getDate = function()
    {
        $.ajax({
            url: $('#missionUrl').val() + '/' + id,
            type: 'get',
            contentType: 'application/json',
            success: function(cmt)
            {
                var element = cmt.date;
                var address = cmt.visitAddress;
                var d = cmt.description;
                
                $('#date').val(element);
                $('#address').val(address);
                $("#des").val(d);

                console.log(element);
            }
        })
    }
    getDate();
    

    // 拿 medicals人員
    $.ajax({
        type: 'GET',
        url: '/medicals',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(results)
        {
            
            $.ajax({
                type: 'GET',
                url: '/users/new',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(users)
                {
                    $.ajax({
                        type: 'GET',
                        url: '/cities',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(cities)
                        {
                            $.ajax({
                                type: 'GET',
                                url: '/hospitals',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(hospitals)
                                {
                                    $.ajax({
                                        type: 'GET',
                                        url: '/divisions',
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        success: function(divisions)
                                        {
                                            var drs = [];
                                            var ns = [];
                                            $(results).each(function (index, result) {
                                                if(result.occupation_id == 1 && result.relationship == "合約") {
                                                        var name, area, division, hospital, id = result.user_id;
                                                        $(users).each(function (index, user) {
                                                            if(result.user_id == user.id) 
                                                                name = user.name;
                                                        });
                                                        $(divisions).each(function (index, dv) {
                                                            if(result.division_main_id == dv.id) 
                                                                division = dv.name;
                                                        });
                                                        $(hospitals).each(function (index, hs) {
                                                            if(result.hospital_id == hs.id) {
                                                                var temp = hs.city_id;
                                                                hospital = hs.name;
                                                                $(cities).each(function (index, ct) {
                                                                    if(temp == ct.id) 
                                                                        area = ct.name;
                                                                });
                                                            }
                                                        });

                                                        drs.push([
                                                        '<input type="radio" value="' + id + '" name="dr" id="' + id +'">' ,                                                        
                                                        area,
                                                        division,
                                                        hospital,
                                                        '<span id="dr' + id + '">' + name + '</span>',
                                                        "待命中",
                                
                                                    ]);
                                                }
                                                else if(result.occupation_id == 2 && result.relationship == "合約") {
                                                        var name, area, division, hospital, id = result.id;
                                                        $(users).each(function (index, user) {
                                                            if(result.user_id == user.id) 
                                                                name = user.name;
                                                        });
                                                        $(divisions).each(function (index, dv) {
                                                            if(result.division_main_id == dv.id) 
                                                                division = dv.name;
                                                        });
                                                        $(hospitals).each(function (index, hs) {
                                                            if(result.hospital_id == hs.id) {
                                                                var temp = hs.city_id;
                                                                hospital = hs.name;
                                                                $(cities).each(function (index, ct) {
                                                                    if(temp == ct.id) 
                                                                        area = ct.name;
                                                                });
                                                            }
                                                        });

                                                        ns.push([
                                                            '<input type="radio" value="' + id + '" name="ns" id="' + id +'">' ,                                                        
                                                            area,
                                                            division,
                                                            hospital,
                                                            '<span id="ns' + id + '">' + name + '</span>',
                                                            "待命中",
                                    
                                                        
                                                    ]);
                                                }
                                            
                                            });
                                            $('#drTable').DataTable().clear().rows.add(drs).draw(true);
                                            $('#nsTable').DataTable().clear().rows.add(ns).draw(true);
                        
                                        },
                                    });
                
                                },
                            });
        
                        },
                    });

                },
            });
        }
    });

    // end of taking data
    var drName, nsName;
    $('body').on('change', '[id^="drTable"] td:nth-child(1)', function () {
        drName = $('#dr' + $("input[name='dr']:checked").val()).text();
        $('#confirmDr').val($('#dr' + $("input[name='dr']:checked").val()).text());
    });

    $('body').on('change', '[id^="nsTable"] td:nth-child(1)', function () {
        nsName = $('#ns' + $("input[name='ns']:checked").val()).text();
        $('#confirmNs').val($('#ns' + $("input[name='ns']:checked").val()).text());
    });

    $('.Register-btn').click(function (){
        var d =  $("#date").val();
        d = d.replace("T", " - ");

        $('#phraseForm').fadeIn('slow');
        $('#MissionForm2').fadeIn('slow');
        $("#phraseType option[value='3']").text('已為您掛到 ' + d + '，醫師:' 
                                                               + $('#confirmDr').val() + ' '
                                                               + $("#confirmNs").val() + '，地點:'
                                                               + $("#address").val()
                                                               );
    });

    $('#confirmDr').change(function () {
        $('.drTable').DataTable().search($(this).find('option:selected').text()).draw();
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

        if(phrase_value == 3 && ($("input[name='ns']:checked").val() == undefined && $("input[name='dr']:checked").val() == undefined)) {
            alert("請選擇出診醫師或護理師");
        }
        else {
            var progress_text = $("#phraseType").find(":selected").text();
            

            updateMission(id , {
                'status_id':  2 ,   // 1 待執行  2 執行中  3 完成
                'status_name': "執行中",
                'suggestion' : progress_text,
            } );
        }

        
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

    
    
    $('#SeedMission').click(function(){
        console.log("in");
        if($("input[name='ns']:checked").val() == undefined && $("input[name='dr']:checked").val() == undefined){
            alert("請輸入選擇出診醫師或護理師");
            return;
        }
        else
        {
            // var temp1 = document.getElementById("hospitalSelector");
            // var strUser1 = temp1.options[temp1.selectedIndex].value;

            // var temp2 = document.getElementById("divisionSelector");
            // var strUser2 = temp2.options[temp2.selectedIndex].value;

            // var temp3 = document.getElementById("diagnosis");
            // var strUser3 = temp3.options[temp3.selectedIndex].text;

            var name = $('#name').val();
            var d =  $("#date").val();
            d = d.replace("T", " - ");
    
            var temp = "請問能否出診<br>姓名：" + name + "<br>地址：" + $("#address").val() + "<br>時間：" + d + "<br>病狀" + 
            $("#des").val() + "。";
            console.log(temp);

            //建立委推任務

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

                    if($("input[name='dr']:checked").val() != undefined) {
                        console.log("dr");
                        
                        $.ajax({
                            url: $('#missionUrl').val(),
                            
                            data:JSON.stringify({
                                'parent_id': id,
                                'requester_id': rid,
                                'provider_id': $("input[name='dr']:checked").val(),
                                'provider_name': drName,
                                'type_id': 7,//委託出診
                                'status_id': 6,//等待中
                                'issued_at': new Date().getTime() / 1000,
                                'vip_id': id,
                                'requester_name': name,
                                'status_name': "等待中",
                                'date': d,
                                'type_name': "委託出診",
                                'description': temp,
                                'method': 0, // dr
                            }),
                            type: 'post',
                            async: false,
                            contentType: 'application/json',
                            success: function(response){
                                console.log(response);
                            },
                            error: function(){
                                console.log('error');
                                console.log(Date.parse($('#date').val()));
                            }
                        });
                    }
                    if($("input[name='ns']:checked").val() != undefined) {
                        console.log("ns");
                        $.ajax({
                            url: $('#missionUrl').val(),
                            
                            data:JSON.stringify({
                                'parent_id': id,
                                'requester_id': rid,
                                'provider_id': $("input[name='ns']:checked").val(),
                                'provider_name': nsName,
                                'type_id': 7,//委託出診
                                'status_id': 6,//等待中
                                'issued_at': new Date().getTime() / 1000,
                                'vip_id': id,
                                'requester_name': name,
                                'status_name': "等待中",
                                'date': d,
                                'type_name': "委託出診",
                                'description': temp,
                                'method': 1, // ns
                            }),
                            type: 'post',
                            async: false,
                            contentType: 'application/json',
                            success: function(response){
                                console.log(response);
                            },
                            error: function(){
                                console.log('error');
                                console.log(Date.parse($('#date').val()));
                            }
                        });
                    }

                },
            });
        };
    });
})()
