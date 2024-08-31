@extends('pages.sidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8"> <!-- Increased column size from col-md-6 to col-md-8 -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">New Visitor</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('visitor.create') }}" method="POST">
                            @csrf
                            <input type="hidden" name="phone" value="{{ $phone }}">
                            
                            <div class="form-group">
                                <label for="name" class="required-asterisk">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="required-asterisk">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            
                            <div class="form-group">
                                <label for="company" class="required-asterisk">Company:</label>
                                <input type="text" class="form-control" id="company" name="company">
                            </div>
                            
                            <div class="form-group">
                                <label for="visited_at" class="required-asterisk">Time Visited:</label>
                                <input type="datetime-local" class="form-control" id="visited_at" name="visited_at" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="visiting" class="required-asterisk">Visiting:</label>
                                <select class="form-control" id="visiting" name="visiting" required>
                                    <option value="">---Select Employee---</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="background-color: #186c6c; border-color: #186c6c; color: white;">Save</button>
                            </div>
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
