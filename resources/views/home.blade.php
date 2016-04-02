@extends('layouts.parent')

@section('content')
<div class="widget-profil">
    <div class="avatar">
        <img src="{{ Auth::user()->avatar_url }}">
    </div>
    <div>
        <p>Wellcome</p>
        <h2>{{ Auth::user()->name }}</h2>
        <h3>{{ Auth::user()->email }}</h3>
    </div>
    <div >
         <a class="btn-fb-login" href="{{ url('/logout')}}">Logout</a>
    </div>
</div>
@endsection
