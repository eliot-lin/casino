(function () {
    var drTable = $('#dr_consult').DataTable();

    $('#handle1').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('#region-th').attr('checked', false);    
        else
            $('#region-th').attr('checked', true);
    })
    $('#handle2').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('#division-th').attr('checked', false);    
        else
            $('#division-th').attr('checked', true);
    })
    $('#handle3').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('#hospital-th').attr('checked', false);    
        else
            $('#hospital-th').attr('checked', true);
    })
    $('#handle4').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('#doctor-th').attr('checked', false);    
        else
            $('#doctor-th').attr('checked', true);
    })
    $('#handle5').click(function(e){
        if(!e.shiftKey)
            $('input[name^=handle-th]:checked').attr('checked', false);
        if($(this).hasClass("sorting"))
            $('#status-th').attr('checked', false);    
        else
            $('#status-th').attr('checked', true);
    })
        var getDnss = function (data)
        {
           
            $.ajax({
                url: $('#dnsListUrl').val(),
                type:'get',
                data: data,
                contentType: 'application/json',
                success: function (type)
                {
                    // var regions = {
                    //     'north': '北部',
                    //     'central': '中部',
                    //     'south': '南部',
                    //     'east': '東部',
                    // }; 
                    var rows = [];
                    // console.log(type);
                    $(type.service_types).each(function (index, service_type) {
                        console.log(service_type);
                        if (service_type.medical.occupation_id == data.occupation_id) {
                            rows.push([
                                '<input type = "checkbox" id="chooseDoctor" name="chooseDoctor" value="'+ service_type.medical.user.id + '" style="zoom:1.8;" data-doctor = "'+service_type.medical.user.name+'" >',
                                service_type.medical.hospital.city.region.name,
                                service_type.medical.main_division.name,
                                service_type.medical.hospital.name,
                                service_type.medical.user.name,
                                '<span style="color:dimgray;" id="status'+ service_type.medical.user.id +'" class="glyphicon glyphicon-user"></span>',
                                // '1','2','3','4','5','6','7',
                            ]);
                        }
                    });
                    // $(doctors).each(function (index, doctor) {
                    //     rows.push([
                    //         '<input type = "checkbox" id="chooseDoctor" name="chooseDoctor" value="'+ doctor.user.id + '" style="zoom:1.8;" >',
                    //         doctor.hospital.city.region.name,
                    //         doctor.main_division.name,
                    //         doctor.hospital.name,
                    //         doctor.user.name,
                    //         '1','2','3','4','5','6','7',
                    //     ]);
                    // });
                    // for (var i = 0; i < result['doctors_consult'].length; i++) {
                    //     var doctor = result['doctors_consult'][i];
                    //     rows.push([
                    //         '<input type = "checkbox" id="chooseDoctor" name="chooseDoctor" value="'+ doctor.user.id + '" style="zoom:1.8;" >',
                    //         // regions[doctor.region],
                    //         doctor.hospital.city.region.name,
                    //         doctor.division_name,
                    //         doctor.hospitals_name,
                    //         doctor.name,
                    //         'service area',
                    //         '<span style="color:dimgray;" id="status'+ doctor.id +'" class="glyphicon glyphicon-user"></span>',
                    //     ]);
                    // }
                    console.log(rows);
                    drTable.rows.add(rows).draw(false);
                    // drTable.rows.add(rows).draw(false);
                }
            });
            // $.ajax({
            //     url: $('#dnsListUrl').val(),
            //     contentType: 'application/json',
            //     success: function (result)
            //     {
            //         var regions = {
            //             'north': '北部',
            //             'central': '中部',
            //             'south': '南部',
            //             'east': '東部',
            //         }; 
            //         var rows = [];
            //         for (var i = 0; i < result['doctors_visit'].length; i++) {
            //             var doctor = result['doctors_visit'][i];
            //             rows.push([
            //                 regions[doctor.region],
            //                 doctor.division_name,
            //                 doctor.hospitals_name,
            //                 doctor.name,
            //                 'service area',
            //                 '<span style="color:green;" class="glyphicon glyphicon-user"></span>',
            //             ]);
            //         }
            //         $('#dr_visit').DataTable().rows.add(rows).draw(false);
            //     }
            // });
            // $.ajax({
            //     url: $('#dnsListUrl').val(),
            //     contentType: 'application/json',
            //     success: function (result)
            //     {
            //         var regions = {
            //             'north': '北部',
            //             'central': '中部',
            //             'south': '南部',
            //             'east': '東部',
            //         }; 
            //         var rows = [];
            //         for (var i = 0; i < result['nurses_consult'].length; i++) {
            //             var nurse = result['nurses_consult'][i];
            //             rows.push([
            //                 regions[nurse.region],
            //                 nurse.division_name,
            //                 nurse.hospitals_name,
            //                 nurse.name,
            //                 'service area',
            //                 '<span style="color:green;" class="glyphicon glyphicon-user"></span>',
            //             ]);
            //         }
            //         $('#nurse_consult').DataTable().rows.add(rows).draw(false);
            //     }
            // });
            // $.ajax({
            //     url: $('#dnsListUrl').val(),
            //     contentType: 'application/json',
            //     success: function (result)
            //     {
            //         var regions = {
            //             'north': '北部',
            //             'central': '中部',
            //             'south': '南部',
            //             'east': '東部',
            //         }; 
            //         var rows = [];
            //         for (var i = 0; i < result['nurses_visit'].length; i++) {
            //             var nurse = result['nurses_visit'][i];
            //             rows.push([
            //                 '<input type = "radio" name = "choose" id="choose" value=""/>',
            //                 regions[nurse.region],
            //                 nurse.division_name,
            //                 nurse.hospitals_name,
            //                 nurse.name,
            //                 'service area',
            //                 '<span style="color:green;" class="glyphicon glyphicon-user"></span>',
            //             ]);
            //         }
            //         $('#nurse_visit').DataTable().rows.add(rows).draw(false);
            //     }
            // });
        }
        getDnss({'type_id': 1, 'occupation_id': 1});
})()
