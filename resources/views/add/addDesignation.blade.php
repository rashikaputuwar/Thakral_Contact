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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Add New Designation</h2>
                <form action="{{Route('designation.store')}}" method="POST">
                    @csrf
                    </div>
                    <div class="row mb-3">
                        <label for="designationname" class="col-sm-4 col-form-label text-end">Designation Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="designation_name" name="desig_name" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="reset" class="btn btn-success">Reset</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection