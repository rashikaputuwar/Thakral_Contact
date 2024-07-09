@extends('pages.sidebar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Add Department</h2>
            <form action="{{Route('department.store')}}" method="POST">
            @csrf
                </div>
                <div class="row mb-3">
                    <label for="emp code" class="col-sm-4 col-form-label text-end">Employee Code*</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="emp code" name="emp_code" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="first name" class="col-sm-4 col-form-label text-end">First Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="first name" name="first_name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="gender" class="col-sm-4 col-form-label text-end">Gender*</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="last name" class="col-sm-4 col-form-label text-end">Last Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="last name" name="last_name" required>
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

{{-- adding title name --}}
@section('title')
- Add_ Departmnet
@endsection