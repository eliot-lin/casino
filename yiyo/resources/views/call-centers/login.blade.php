@extends('layouts.app')

@section('title', 'Call Center Login')

@section('content')
    <form method="post" action="{{ url('call-centers/login') }}">
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
            <button type="submit">Login</button>
        </div>
    </form>
@endsection
