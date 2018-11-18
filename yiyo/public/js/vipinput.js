$(document).ready(function(){
	
	$("#sub").click(function(){
		
		var memberlevel = $('#radioMemberLevel:checked').val();
		
        var name  = $("#formInputName").val(); 
        var cell  = $("#formInputCell").val(); 
        var id_no   = $("#formInputID").val(); 
        var email_first = $("#formInputEmail").val(); 
        var email_second = $("#formInputEmail2").val(); 

        var sex = $('#radioSex:checked').val();

		var height    = $("#inputHeight").val(); 
		var weight    = $("#inputWeight").val(); 
		var occupation= $("#occupation").val(); 


        var blood = $('#radioBlood:checked').val();
 		var addr = $("#inputAddr").val();
		var birthday = $("#birthday").val(); 

        var marital_status = $('#radioMariage:checked').val();
 		var religion = $("#inputReligion").val();

        var uname = $("#inputUrgentName").val();
		var ucell = $("#inputUrgentPhone").val();
        var urelation = $("#inputUrgentRelation").val();
        var uaddr = $("#inputUrgentAddr").val();
        var disabilites = $('#radioDisabilites:checked').val();
        
		var vip = new Object();
		vip.memberlevel = memberlevel;
	   
	    vip.occupation = occupation;
	    vip.height = height;
	    vip.weight = weight;
	    vip.id_no = id_no;
	   
	    vip.sex = sex;
	    vip.blood = blood;
	 
	    vip.birthday = birthday;
	    
	    vip.religion = religion;
	    vip.uname = uname;
	    vip.urelation = urelation;
	    vip.ucell = ucell;
	    vip.uaddr = uaddr;
	    vip.disabilites = disabilites;

	    /////////////////////////////////////////////
	   	vip.name = name;
	   	vip.addr = addr;
	    vip.cell = cell;
	    vip.nationality = '';
	    vip.marital_status = 0;
	    vip.education = '';	//string
	    vip.language  = '';	//string
	    vip.tel_home = '';	//string
	    vip.tel_office = '';
	    vip.email_first = email_first;
	    vip.email_second = email_second;
	    vip.marital_status = marital_status;//tiny interger



	    //add
	    //nationality
	    //

	    console.log(vip);

	    $.ajax({
	        type: 'POST',
	        url: '/vips',
	        data: vip,
	        headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
		    success: function(results)
		    {
		    	alert("完成，建立下一筆資料。");
		    	console.log(vip);
		    	// location.reload();
		        console.log(results);
		    }
    	});

    });


	 $("#newSurguryHistoryForm").click(function(){
		
 		$("#History").clone().appendTo("#suguryhistory");

 		// alert("test");
    });


	$("#newDrugForm").click(function(){
		
		
 		$("#Drug").clone().appendTo("#divdrug");

 		// alert("test");
    });

  
});
