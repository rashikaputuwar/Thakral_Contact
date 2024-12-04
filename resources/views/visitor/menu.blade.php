@extends('pages.sidebar')

@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="display text-center">Visitor Check-In</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
Visitor Check-In
@endsection
