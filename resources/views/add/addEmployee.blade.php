@extends('pages.sidebar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Add Department</h2>
            <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                </div>
                <div class="row mb-3">
                    <label for="emp code" class="col-sm-4 col-form-label text-end required-asterisk"> Employee Code</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="emp code" name="emp_code" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="first name" class="col-sm-4 col-form-label text-end required-asterisk">First Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="first name" name="first_name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="last name" class="col-sm-4 col-form-label text-end required-asterisk">Last Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="last name" name="last_name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="gender" class="col-sm-4 col-form-label text-end required-asterisk">Gender</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="dob" class="col-sm-4 col-form-label text-end required-asterisk">Date of Birth</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="designation" class="col-sm-4 col-form-label text-end required-asterisk">Designation</label>
                    <div class="col-sm-8">
                        {{-- <input type="text" class="form-control" id="designation" name="designation" required> --}}
                        <select name="designation">
                            @foreach($designations as $designation)
                                <option value="{{ $designation->id }}">{{ $designation->desig_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="department" class="col-sm-4 col-form-label text-end required-asterisk">Department</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="department" name="department" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="joining_date" class="col-sm-4 col-form-label text-end required-asterisk">Joining Date</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="joining_date" name="joining_date" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="photo" class="col-sm-4 col-form-label text-end ">Upload Photo</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" >
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