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
                    <div class="card-body">
                        <form action="{{ route('visitor.handleForm') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="text" class="form-control auto-resize" id="phone" name="phone" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" style="background-color: #186c6c; border-color: #186c6c; color: white;">Check</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
Visitor Check-In
@endsection
