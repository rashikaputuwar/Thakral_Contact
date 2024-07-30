@extends('pages.sidebar')


@section('content')
@auth
<p>Welcome, @if(session('employee_id')) 
{{ session('employee_fname') }} {{ session('employee_lname') }}
{{ session('role_menus')}}
@endif
({{ Auth::user()->user_name }})! You are logged in.</p>

@else
<p>You are not logged in.</p>
<a href="{{route('login.index')}}">Click here to login</a>
@endauth
     
@endsection
