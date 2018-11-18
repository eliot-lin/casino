$(document).ready(function(){        
    $('.case1table').dataTable();
    $('.case2table').dataTable();
    $('.case3table').dataTable();
    $('#pastHsptl').dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": true
    });
});

$(function(){
    // 預設顯示第一個 Tab
    var _showTab = 0;
    $('.abgne_tab').each(function(){
        var $tab = $(this);
 
        var $defaultLi = $('ul.tabs li', $tab).eq(_showTab).addClass('active');
        $($defaultLi.find('a').attr('href')).siblings().hide();
 
        // 當 li 頁籤被點擊時...
        $('ul.tabs li', $tab).click(function() {
            // 找出 li 中的超連結 href(#id)
            var $this = $(this),
                _clickTab = $this.find('a').attr('href');
            // 把目前點擊到的 li 頁籤加上 .active
            // 並把兄弟元素中有 .active 的都移除 class
            $this.addClass('active').siblings('.active').removeClass('active');
            // 淡入相對應的內容並隱藏兄弟元素
            $(_clickTab).stop(false, true).fadeIn().siblings().hide();
 
            return false;
        }).find('a').focus(function(){
            this.blur();
        });
    });
});  
