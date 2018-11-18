<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">   
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/missionCenter.css') }}">
        <title>call list</title>
    </head>
    <body>
        <input id = "callsURL" type = "hidden" value = "{{ url('calls')}}">
        <input id = "TokRoomURL" type = "hidden" value = "{{ url('opentok')}}">
        

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">任務中心</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="">任務中心</a></li>
                    <li><a target="_blank" href="/vips/create">建立VIP</a></li>
                    <li><a target="_blank" href="/dnss/create">建立DNS</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>登出</a></li>
                </ul>
            </div>
        </nav>
            
        <div class = "container mission-table">
            <h1 class = "table-title">Calllist</h1>
            <table id="callTable" class = "table table-hover">   
                <thead>
                    <tr>
                        <th>序號</th>
                        <th>房間</th>
                        <th>通話按鈕</th>
                        <th>稍後回電</th>
                        <th>刪除紀錄</th>
                        <!-- <th>忙線中</th> -->
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                </tbody>
            </table>  
        </div>
        <button id="fcmtest" type="button" class="btn btn-success">提交</button>

    </body>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src = "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/calllist.js')}}"></script>
    
</html>
