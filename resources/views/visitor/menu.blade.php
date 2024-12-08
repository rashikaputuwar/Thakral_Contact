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
                    <div class="card" style="width: 18rem; padding:5px; margin:10px;">
                        <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem; padding:5px; margin:10px;">
                        <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
Visitor Check-In
@endsection
