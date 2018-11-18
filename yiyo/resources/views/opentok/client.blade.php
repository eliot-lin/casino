<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>YIYO connect test on web</title>
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/helloworld.js') }}"></script>
<<<<<<< HEAD
    <meta name="csrf-token" content="{{ csrf_token() }}" />
=======
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
>>>>>>> 817763243d4c6943901c2e19bdf8f6a25aa81fff
    <script type="text/javascript">

        $( document ).ready(function() {
            // Handler for .ready() called.

            $('#btn').on('click',function () {
                var taskId = $('#tid').val();
                var url = 'https://www.yoecare.com/calls/'+taskId;

                // var url = 'http://114.34.167.136/calls/'+taskId;

                $.ajax({
                    url: url,
                    type: 'get',
                    // dataType:'jsonp',
                    contentType: 'application/json',
                    success: function (data) {
                        console.log('data=',data);
                        // Android.startChat(data.api_key,data.session_id,data.token, data.room_name);
                        videoChatConnect(data.api_key, data.session_id,data.token);
                    }
                });
            });

        });

        // $.ajax({
        // url: $('#callsURL').val(),
        // type: 'get',
        // contentType: 'application/json',
        // success: function (calls)
        // {
        //     var trs = [];
        //     for (var i = 0; i < calls.length; i++) {
        //         trs.push(
        //             [
        //                 calls[i].id,
        //                 calls[i].room_name,
        //                 '<button id="'+ calls[i].id +'"  onclick="getSpecificTok(this.id)" type="button" class="btn btn-success">通話</button>',
        //                 '<button id="'+ calls[i].id +'"  onclick="waitReplay(this.id)" type="button" class="btn btn-warning">稍後</button>',
        //                 '<button id="'+ calls[i].id +'"  onclick="destroyCall(this.id)" type="button" class="btn btn-danger">刪除</button>',
        //             ]
        //         );
        //     }

        //     $('#callTable').DataTable().rows.add(trs).draw(false);
          
        // },
        // error: function ()
        // {
        //     console.log('error');
        // }
    // });


    </script>
</head>
<body>
<h2>多方通話</h2>

<span>請輸入TaskID : </span>
<input type="text" id="tid" />
<button id="btn">連線</button>

<div id="publisher"></div>

<div id="subscribers"></div>
</body>
</html>

