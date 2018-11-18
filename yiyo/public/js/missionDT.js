$(document).ready(function(){
    var getMission = function ($id)
    {
        $.ajax({
            url: $('#missionsListUrl').val() + '/' + $id,
            type: 'get',
            contentType: 'application/json',
            // text/html
            success: function (mission)
            {
                $('.vip-info').slideToggle(500);
                $('#vipInfo #vipName').text(mission.name);
                console.log(mission);
                // $('body').append(mission);
            }
        });
    } , 
    var getMissions = function ()
    {
        $.ajax({
            url: $('#missionsListUrl').val(),
            type: 'get',
            contentType: 'application/json',
            success: function (missions)
            {
                var trs = [];
                for (var i = 0; i < missions.length; i++) {
                    var tr = '<tr><td><input type = "radio" name = "choose"></td><td>' + missions[i].id + '</td><td id = "mission' + missions[i].type + '" style = "cursor:pointer;" class = "register">掛號</td><td id = "vip' + missions[i].id + '" data-id="' + missions[i].id + '" style = "cursor:pointer;">' + missions[i].name + '</td><td id = "executor1" style = "cursor:pointer">' + missions[i].correspondent + '</td><td id = "status1" style = "cursor:pointer;">執行中</td><td style = "color:#00AA00;">24H</td><td> <a href="#"><span class="glyphicon glyphicon-envelope"></span></a></td></tr>';
                    trs.push(tr);
                }
                $('#missionsTable tbody').append(trs.join(' '));
                $('#missionsTable').DataTable( {
                    initComplete: function () {
                        this.api().columns().every( function (index, value) {
                            if (index > 1 && index < 6 ) {
                            var column = this;
                            var select = $('<select><option value=""></option></select>')
                                .appendTo( $(column.footer()).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
            
                                    column
                                        .search( val ? '^'+val+'$' : '', true, false )
                                        .draw();
                                } );
            
                            column.data().unique().sort().each( function ( d, j ) {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            } );
                            }
                        } );
                    }
                });
            },
            error: function ()
            {
                console.log('error');
            }
        });
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });
});