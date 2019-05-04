@extends('layouts.app')

@section('title', 'Call Center Login')

@section('content')
    <form id="form" style="font-family:Quicksand, sans-serif;background-color:rgba(44,40,52,0.73);width:320px;padding:40px;" method="post" action="{{ url('call-centers/login') }}">
        {{ csrf_field() }}
        <h1 id="head" style="color:rgb(193,166,83);">呼叫中心登入</h1>
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
@endsection
