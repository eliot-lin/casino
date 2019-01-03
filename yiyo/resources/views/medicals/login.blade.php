@extends('layouts.app')

@section('title', 'Medical Login')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,600">

@section('content')

    <form id="form" style="font-family:Quicksand, sans-serif;background-color:rgba(44,40,52,0.73);width:320px;padding:40px;" method="post" action="{{ url('medicals/login') }}">
        {{ csrf_field() }}
        <h1 id="head" style="color:rgb(193,166,83);">Login form</h1>
        <div>
            <img class="img-rounded img-responsive" src="{{ asset('images/logo.png') }}" id="image" style="width:auto;height:auto;">
        </div>
        <div class="form-group">
            <input class="form-control" name="email" id="email" type="text" required>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" id="password" type="password" required>
        </div>
        <div class="form-group"></div>
        <button class="btn btn-default" type="submit" id="login" style="width:100%;margin-bottom:10px;background-color:rgb(106,176,209);">登入</button><a href="#" id="linkas" style="font-size:12px;margin:auto;margin-left:0;margin-right:0;margin-bottom:0;margin-top:0;padding-left:0;padding-right:0;color:rgb(177,151,70);"></a>
    </form>
    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@endsection

