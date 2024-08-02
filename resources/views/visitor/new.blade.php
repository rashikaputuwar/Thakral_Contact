@extends('pages.sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center">New Visitor</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('visitor.showForm') }}" class="btn btn-primary btn-lg">New Visitor</a>

                        <a href="{{ route('visitor.update') }}" class="btn btn-primary btn-lg">Existing Visitor</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
New Visitor
@endsection
