$(document).ready(function(){
    
    if(document.URL == $("#ccurl").val()) {
        document.getElementById("cc").className = "active";
        document.getElementById("med").className = "";
        document.getElementById("vip").className = "";
    }
    else if(document.URL == $("#medurl").val()) {
        document.getElementById("med").className = "active";
        document.getElementById("cc").className = "";
        document.getElementById("vip").className = "";
    }
    else if(document.URL == $("#vipurl").val()) {
        document.getElementById("vip").className = "active";
        document.getElementById("cc").className = "";
        document.getElementById("med").className = "";
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });
});