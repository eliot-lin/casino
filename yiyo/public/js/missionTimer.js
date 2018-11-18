(function (){
    
    // Set the date we're counting down to
    var countDownDate = new Date().getTime();
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
    // Get todays date and time
    var now = new Date().getTime();
    
        // Find the distance between now an the count down date
        var distance = now - countDownDate;
    
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        //days + "d " 
        var timer =hours + "h "
        + minutes + "m " + seconds + "s ";
        // $('.navbar-brand').text(a);
        $('#abc').text('處理時間 : '  + timer);
        // Output the result in an element with id="demo"
    
    
        // document.getElementById("Timer").innerHTML = 
    
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
    
 })()
    