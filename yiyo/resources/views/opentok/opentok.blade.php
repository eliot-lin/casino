<!doctype html>
<html>
    <head>
        <title>OpenTok Testing</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/vipinput.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/groupinput.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link  rel="stylesheet" href="{{ asset('css/opentok.css') }}" type="text/css">
        <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
    </head>
    <body>
        <input id = "api_key" type = "hidden" value = "{{$api_key}}">
        <input id = "session_id" type = "hidden" value = "{{$session_id}}">
        <input id = "token" type = "hidden" value = "{{$token}}">
        
        
        <p id="api_key">{{$api_key}}</p>
        <p id="token">{{$token}}</p>
        <p id="session_id">{{$session_id}}</p>

        <div id="videos">
            <div id="publisher"></div>
            <div id="subscriber"></div>
        </div>
        <script type="text/javascript" src="{{ asset('js/opentok.js') }}"></script>

    </body>
</html>
    