@extends('layouts.app')

@section('title', 'Medical Login')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,600">

@section('content')

    <form method="post" action="{{ url('medicals/login') }}"> 
        {{ csrf_field() }}
        <div>
            <label>
                <span>E-mail</span>
                <input name="email" id="email" type="text" required>
            </label>
        </div>
        <div>
            <label>
                <span>Password</span>
                <input name="password" id="password" type="password" required>
            </label>
        </div>
        <div>
            <button id="login" type="submit">Login</button>
        </div>
    </form>
    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@endsection

