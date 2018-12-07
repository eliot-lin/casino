@extends('layouts.app')

@section('title', 'VIP Login')

@section('content')
    <form method="post" action="{{ url('vips/login') }}">
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
@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
