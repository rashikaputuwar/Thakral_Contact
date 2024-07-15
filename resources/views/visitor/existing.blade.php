@extends('pages.sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Visitor Information</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('visitor.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="phone" value="{{ $visitor->phone }}">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $visitor->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $visitor->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" id="company" name="company" value="{{ $visitor->company }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="visited_at" class="required-asterisk">Time Visited</label>
                                <input type="datetime-local" class="form-control" id="visited_at" name="visited_at" required>
                            </div>
                            <div class="form-group">
                                <label for="visiting"  class="required-asterisk">Visiting</label>
                                <select class="form-control" id="visiting" name="visiting" required>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
Visitor Information
@endsection
