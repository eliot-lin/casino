$(document).ready(function(){

	function bloodtype($blood) {
		if($blood == 0)
            return "A型";
        if($blood == 1)
            return "B型";
        if($blood == 2)
			return "AB型";
		if($blood == 3)
			return "O型";
		if($blood == 4)
			return "unknown";
	}

	// var password = document.getElementById("formInputPassword")
	// 	, confirm_password = document.getElementById("formInputConfirmPassword");
	

  
	// password.onchange = validatePassword;
	// confirm_password.onkeyup = validatePassword;

	var bool = false;
	// function validatePassword(){
	// 	if (password.value != confirm_password.value) {
	// 		confirm_password.setCustomValidity("密碼不符");
	// 		bool = false;
	// 	} 
	// 	else {
	// 		confirm_password.setCustomValidity('');
	// 		bool = true;
	// 	}
	// }

	$("#sub").click(function(){
		
		// var memberlevel = $('#radioMemberLevel:checked').val();

		// var password = $("#formInputPassword").val();


        var name  = $("#formInputName").val(); 
		var cell  = $("#formInputCell").val(); 
		var tell  = $("#formInputTell").val(); 
		var oTell  = $("#formInputOTell").val(); 


        var id_no   = $("#formInputID").val(); 
        var email_first = $("#formInputEmail").val(); 
        // var email_second = $("#formInputEmail2").val(); 

        var sex = $('.radioSex:checked').val();

		var height    = $("#inputHeight").val(); 
		var weight    = $("#inputWeight").val(); 
		var occupation= $("#occupation").val(); 


		var blood = bloodtype($('.radioBlood:checked').val());
		var addr = $("#inputAddr").val();
		var birthday = $("#birthday").val(); 

		var marital_status = $('.radioMariage:checked').val();
 		var religion = $("#inputReligion").val();

        var uname = $("#inputUrgentName").val();
		var ucell = $("#inputUrgentPhone").val();
        var urelation = $("#inputUrgentRelation").val();
        var uaddr = $("#inputUrgentAddr").val();
        var disabilites = $('.radioDisabilites:checked').val();
		// function check() {
		// 	alert("資料填寫不完整");
		// }

		var user = new Object();



		user.type = "vip";
		user.email_main = email_first;
		user.password = id_no;
		user.id_no = id_no;
		user.name = name;
		user.cell = cell;
		user.tel_home = tell;
		user.tel_office = oTell;
		user.sex = sex;
		user.birthday = birthday;
		user.marital_status = marital_status;
		user.address = addr;

		var vip = new Object();

		// vip.memberlevel = memberlevel;
	   
	    vip.occupation = occupation;
	    vip.height = height;
	    vip.weight = weight;
	    vip.id_no = id_no;
	   
	    vip.sex = sex;
		vip.blood_type = blood;
	 
	    vip.birthday = birthday;
	    
	    vip.religion = religion;
	    vip.contact = uname;
	    vip.contact_relationship = urelation;
	    vip.contact_phone = ucell;
	    vip.contact_address = uaddr;
		vip.handicapped = disabilites;

	    /////////////////////////////////////////////
	   	vip.name = name;
	   	vip.address_visit = addr;
	    vip.cell = cell;
	    vip.nationality = '';
	    vip.education = '';	//string
	    vip.language  = '';	//string
	    vip.tel_home = '';	//string
	    vip.tel_office = '';
	    vip.email_first = email_first;
	    // vip.email_second = email_second;
	    vip.marital_status = marital_status;//tiny interger

	    //add
	    //nationality
	    //
		// check();

		

		console.log(vip);
		console.log(user);

		
		if(name == '' || cell == '' || tell == '' || oTell == '' || id_no == '' 
			|| email_first == '' || sex == '' || height == '' || weight == ''
			|| occupation == '' || blood == '' || addr == '' || birthday == '' || marital_status == '' || religion == ''
			|| uname == '' || ucell == '' || urelation == '' || uaddr == '' || disabilites == '') {
				bool = false;
		 }
		 else  {
			 bool = true;
		 }


		if(bool) {
				$.ajax({
					type: 'POST',
					url: '/users',
					data: user,
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					success: function(results)
					{
						console.log(user);
						alert("完成，建立下一筆資料。");
						// location.reload();
						console.log(results);
						
						vip.user_id = results.data.id;

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
							},
							error:function()
							{
								console.log("error");
							}
						});
					}
				});
		}
		

		

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
