@extends('pages.sidebar')


@section('content')
@auth
{{-- <p>Welcome, {{ Auth::user()->user_name }}! You are logged in.</p> --}}
<p>Welcome, {{ Auth::user()->employee->full_name }} ! You are logged in.</p>
@else
<p>You are not logged in.</p>
@endauth
     
@endsection
