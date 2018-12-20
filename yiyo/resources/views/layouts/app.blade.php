<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,600">
        <input id = "ccurl" type="hidden" value = "{{ url('call-centers/login') }}">
        <input id = "medurl" type="hidden" value = "{{ url('medicals/login') }}">
        <input id = "vipurl" type="hidden" value = "{{ url('vips/login') }}">
        @section('css')
        @show
        <title>醫療系統 @yield('title')</title>
    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- <a class="navbar-brand" href="#">益友網</a> -->
                </div>
                <ul class="nav navbar-nav">
                    @if (Auth::check())
                        <li class="active"><a href="{{ url('call-centers/index') }}">{{ Auth::user()->name }} - 任務中心</a></li>
                        <!-- <li><a target="_blank" href="#">VIP管理</a></li>
                        <li><a target="_blank" href="#">醫師＆護士</a></li> -->
                    @else
                        <li id = "cc" class="active"><a href="{{ url('call-centers/login') }}">Login As Call Center</a></li>
                        <li id = "med"><a href="{{ url('medicals/login') }}">Login As Medical</a></li>
                        <li id = "vip"><a href="{{ url('vips/login') }}">Login As VIP</a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li><a href="{{ url('logout') }}"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;登出</a></li>
                    @else
                        <li><a href="{{ url('vips/login') }}">Sign in</a></li>
                        <li><a href="{{ url('vips/register') }}">Sign up</a></li>
                    @endif
                </ul>
            </div>
        </nav>

        <content>
            @section('content')
            @show
        </content>

        <footer>
            @section('footer')
            @show
        </footer>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/app2.js') }}"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        @section('js')
        @show
    </body>
</html>
