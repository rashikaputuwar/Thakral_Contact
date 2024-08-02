@extends('pages.sidebar')


@section('content')
@auth
<p>Welcome, {{ Auth::user()->user_name }}! You are logged in.</p>
<p>Welcome, {{ session('employee_fname') }} {{ session('employee_lname') }}! You are logged in.</p>
    <ul>
        @foreach(session('userRoles', []) as $role)
            <li>{{ $role }}</li>
        @endforeach
    </ul>
@else
    <p>You are not logged in.</p>
@endauth
     
@endsection
