@extends('layouts.parent')

@section('content')
    <div class="login-container">
        <form class="form-login">
            <h2>
                Login
            </h2>
        <a class="btn-fb-login" href="{{ url('/login/facebook')}}">Login with Facebook</a>
        </form>
    </div>
@endsection
