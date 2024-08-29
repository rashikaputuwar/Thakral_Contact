@extends('pages.sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="display text-center">Visitor Information</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('visitor.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="phone" value="{{ $visitor->phone }}">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                {{ $visitor->name }}
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                {{ $visitor->email }}
                            </div>
                            <div class="form-group">
                                <label for="company">Company:</label>
                                {{ $visitor->company }}
                            </div>
                            <div class="form-group">
                                <label for="visited_at" class="required-asterisk">Time Visited</label>
                                <input type="datetime-local" class="form-control" id="visited_at" name="visited_at" required>
                            </div>
                            <div class="form-group">
                                <label for="visiting"  class="required-asterisk">Visiting</label>
                                <select class="form-control" id="visiting" name="visiting" required>
                                    <option value="">---Select Employee---</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
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
