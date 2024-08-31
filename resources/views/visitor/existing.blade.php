@extends('pages.sidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Visitor Information</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('visitor.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="phone" value="{{ $visitor->phone }}">
                            
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $visitor->name }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $visitor->email }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="company">Company:</label>
                                <input type="text" class="form-control" id="company" name="company" value="{{ $visitor->company }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="visited_at" class="required-asterisk">Time Visited</label>
                                <input type="datetime-local" class="form-control" id="visited_at" name="visited_at" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="visiting" class="required-asterisk">Visiting</label>
                                <select class="form-control" id="visiting" name="visiting" required>
                                    <option value="">---Select Employee---</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <br>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="background-color: #186c6c; border-color: #186c6c; color: white;">Update</button>
                            </div>
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


@section('title')
Visitor Information
@endsection
