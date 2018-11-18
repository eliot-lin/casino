
// dns js




$(document).ready(function(){

	// if ( !cell_phone.match(/^09[0-9]{8}$/) ) 
	// { 
	// 	alert( "手機不可空白!\n長度必須是10，\n不可以是文字，\n必定要09帶頭。") 
	// 	document.form1.cell_phone.focus(); 
	// 	return false; 
	// } 

	$("#userid").change(function(){
		var reg = /^[A-Z]{1}[1-2]{1}[0-9]{8}$/;
		validation($("#userid").val(),reg,'userid');
	});

	$("#cell").change(function(){
		var reg = /^09[0-9]{8}$/;
		validation($("#cell").val(),reg,'cell');
		
		// if ( !$("#cell").val().match(/^09[0-9]{8}$/) ) 
		// { 
		// 	$(".alert-cell-fail").first().hide().fadeIn(200).delay(2000).fadeOut(1000);
		// 	// alert( "手機不可空白!\n長度必須是10，\n不可以是文字，\n必定要09帶頭。") 
		// 	return false; 
		// } 
		// else{
		// 	$(".alert-cell-success").first().hide().fadeIn(200).delay(2000).fadeOut(1000);
		// }
	});

	$("#email").change(function(){
	 	var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		validation($("#email").val(),reg,'mail');
		// console.log('chage');
		// validate() ;
	});

	$("#sub").click(function(){
	
		var pro_type    = $('#inputVocation:checked').val();
		var relationship  = $('#inputCooperationRelationship:checked').val();
		var hierarchy   = $('#inputHierarchy:checked').val();
		var service_hostpital = $("#inputHospitalName").val(); 

        var name  = $("#inputDNSName").val(); 
        var cell  = $("#inputDNSCellPhone").val(); 
        var id_no  = $("#inputIDNumber").val(); 
        var email_first = $("#inputDNSEmail").val(); 
        var email_second = $("#inputDNSEmail").val(); 

		var education   = $('#radioEducation:checked').val();

		//option
		var country = $("#country").val();
		
		var zone=[];
	    $('input[name=zone]:checked').each(function () {
		  zone.push($(this).val());
		});

		var lang=[];
	    $('input[name=lang]:checked').each(function () {
		  lang.push($(this).val());
		});

	    var time=[];
	    $('input[name=time]:checked').each(function () {
		  time.push($(this).val());
		});

		result = zone.toString();
		//console.log( result ); 		

		result2 = lang.toString();
		//console.log( result2 ); 		

		var department_first = $("#department").val();
		
		var department_second = $("#department2").val();
		
		var mariage = $('#radioMariage:checked').val();

		var addr = $("#inputAddr").val();
		
		var birthday = $("#birthday").val();



		var dns = new Object();
		//dns attribute
		dns.pro_type = pro_type;		//            $table->tinyInteger('pro_type')->default(0);
		dns.relationship = relationship;//     $table->tinyInteger('relationship')->default(0);
		dns.hierarchy = hierarchy;		//            $table->tinyInteger('hierarchy')->default(2);
		dns.service_hostpital = service_hostpital;// $table->string('serve_hospital', 40)->default('')->nullable();
		dns.time = time;				//         $table->text('contact_times')->nullable();
		dns.zone = zone;				// 補上 database

		//member attribute
		dns.name = name;
		dns.cell = cell;
		dns.department_first = department_first;	//$table->string('department_first', 40)->default('')->nullable();
		dns.department_second = department_second;  //$table->string('department_second', 40)->default('')->nullable();
		dns.email_first = email_first;
		dns.education = education;
		dns.country = country;
		dns.birthday = birthday;
		dns.addr = addr;
		dns.mariage = mariage;
		dns.id_no = id_no;

		$.ajax({
	        type: 'POST',
	        url: '/dnss',
	        data: dns,
	        headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
		    success: function(results)
		    {
		    	alert("完成，建立下一筆資料。");
		    	console.log(dns);
		    	// console.log(results);
		    }
    	});
    });
});


// function validateEmail(email) {
// 	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
// 	return re.test(email);
// }

// function validate() {
	
// 	$("#result").text("");
// 	var email = $("#email").val();


// 	if (validateEmail(email)) {
// 		$(".alert-success-mail").first().hide().fadeIn(100).delay(2000).fadeOut(1000);
// 	} else {
// 		$(".alert-danger-mail").first().hide().fadeIn(100).delay(2000).fadeOut(1000);
// 	}
// 	return false;
// }


function validation(val,reg,type)
{
	if(val.match(reg))
	{
		$('.alert-success-'+ type).first().hide().fadeIn(100).delay(2000).fadeOut(1000);
	}
	else
	{
		$('.alert-danger-' + type).first().hide().fadeIn(100).delay(2000).fadeOut(1000);
	}
}