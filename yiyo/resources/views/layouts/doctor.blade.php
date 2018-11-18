<!doctype html>
<head>
    <title>醫師頁面</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">   
    <link rel="stylesheet" href="{{ asset('css/doctor.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <input id="subId" type="hidden" value="{{ $sub->id }}">
    <input id = "missionUpdateUrl" type="hidden" value = "{{ url('missions') }}">
    <div id="container">
        <p id="title">益友網</p>
        <p style="font-size: 30px; text-align: center;"><span id="type">{{ $sub->type_id }}</span>任務</p>
        <div class="patientBox">
            <p>姓名：{{ $vipdata->user->name }}</p>
            <p>性別：<span id="gender">{{ $vipdata->user->sex }}</span></p>
            <p>身分證字號：{{ $vipdata->user->id_no }}</p>
            <p>生日：{{ $vipdata->user->birthday }}</p>
        </div>
        <div class="btnBox">
            <a id="acceptBtn" class="btn btn-success">接受</a>
            <a id="refuseBtn" class="btn btn-danger">拒絕</a>
        </div>
    </div>    
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{ asset('js/doctor.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/missionCRUD.js') }}"></script>

