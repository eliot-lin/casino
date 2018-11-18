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

    $('.CompleteVisitMission').click(function(){
        if(confirm("確定完成出診任務?")){
            close();
        }
    });

})()
