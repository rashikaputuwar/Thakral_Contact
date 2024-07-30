@extends('pages.sidebar')


@section('content')
@auth
<p>Welcome, {{ Auth::add_user()->name }}! You are logged in.</p>
@else
<p>You are not logged in.</p>
@endauth
     
@endsection
