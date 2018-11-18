(function(){



    //建議任務
    $('#createNewSubmit').click(function(){


        var date = $('#registerdate').val();
        var hospital = $('#VipInputHospital').val();
        var division = $('#VipInputDivision').val();
        var time = $('#VipInputTime').val();
        var doctor = $('#VipInputDoc').val();
        
        var my_message = date + hospital + division + time + doctor; 

        console.log(my_message);

        storeMission({
            'dns_id':0,  
            'vip_id':11, //selector value
            'type':1, //selector value  掛號
            'correspondent': 0,
            'status':0, // 0 待執行  1 執行中  2 完成
            'issued_at':'1507206486',
            'source_type':0,//0 = message ,1 voice , 
            'message':my_message,
        } );
    });

     //建議任務
     $('#createNewSubmit2').click(function(){
        
        
        var date = $('#registerdate').val();
        var hospital = $('#VipInputHospital').val();
        var division = $('#VipInputDivision').val();
        var time = $('#VipInputTime').val();
        var doctor = $('#VipInputDoc').val();
        
        var my_message = date + hospital + division + time + doctor; 

        console.log(my_message);

        storeMission({
            'dns_id':0,  
            'vip_id':11, //selector value
            'type':0, //selector value 諮詢
            'correspondent': 0,
            'status':0, // 0 待執行  1 執行中  2 完成
            'issued_at':'1507206486',
            'source_type':0,//0 = message ,1 voice , 
            'message':my_message,
        } );
    });
        



    // var vipInputHospital = function(){
    //   $.ajax({
    //       url: $('#hospitalUrl').val(),
    //       type: 'get',
    //       contentType: 'application/json',
    //       success: function(hospitals){
    //         console.log(hospitals);
    //             $(hospitals).each(function(index, hospital){
    //                 console.log(hospitals);
    //                 $('#VipInputHospital').append($('<option>', {
    //                     value: hospital.id,
    //                     text: hospital.name,
    //                 })
    //                 );
    //             })
    //       },
    //       error: function(){
    //           console.log("error!");
    //       }
    //   })
    // }
    // vipInputHospital();

    // var vipInputDivision = function(){

    // }
    // vipInputDivision();

})()