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
                        <form action="{{ route('visitor.create') }}" method="POST">
                            @csrf
                            <input type="hidden" name="phone" value="{{ $phone }}">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="company">Company:</label>
                                <input type="text" class="form-control" id="company" name="company">
                            </div>
                            <div class="form-group">
                                <label for="visited_at">Time Visited:</label>
                                <input type="datetime-local" class="form-control" id="visited_at" name="visited_at" required>
                            </div>
                            <div class="form-group">
                                <label for="visiting">Visiting:</label>
                                <select class="form-control" id="visiting" name="visiting" required>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->full_name }} </option>
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
New Visitor
@endsection
