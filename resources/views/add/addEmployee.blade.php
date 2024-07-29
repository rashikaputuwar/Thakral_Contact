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
            <h2 class="text-center mb-4">Add Employee</h2>
            <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                </div>
                <div class="row mb-3">
                    <label for="emp code" class="col-sm-4 col-form-label text-end required-asterisk"> Employee Code</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control auto-resize" id="emp code" name="emp_code" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="first name" class="col-sm-4 col-form-label text-end required-asterisk">First Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control auto-resize" id="first name" name="first_name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="last name" class="col-sm-4 col-form-label text-end required-asterisk">Last Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control auto-resize" id="last name" name="last_name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-sm-4 col-form-label text-end required-asterisk">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control auto-resize" id="email" name="email" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="contact" class="col-sm-4 col-form-label text-end required-asterisk">Personal Contact Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control auto-resize" id="personal_contact" name="personal_contact" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="office_contact" class="col-sm-4 col-form-label text-end">Office Contact Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control auto-resize" id="office_contact" name="office_contact" required>
                    </div>
                </div>

                {{-- <div class="row mb-3">
                    <label for="extention_contact" class="col-sm-4 col-form-label text-end required-asterisk">Employee Extention
                        Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="extention_contact" name="extention_contact" required>
                    </div>
                </div>  --}}
                <div class="row mb-3">
                    <label for="gender" class="col-sm-4 col-form-label text-end required-asterisk">Gender</label>
                    <div class="col-sm-8">
                        <select class="form-control auto-resize" id="gender" name="gender" required>
                            <option value="">--Select Gender--</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="temp_address" class="col-sm-4 col-form-label text-end required-asterisk">Temporary Address</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control auto-resize" id="temp_address" name="temp_address" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="perm_address" class="col-sm-4 col-form-label text-end required-asterisk">Permanent Address</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control auto-resize" id="perm_address" name="perm_address" required>
                    </div>
                </div>
        
                <div class="row mb-3">
                    <label for="dob" class="col-sm-4 col-form-label text-end required-asterisk">Date of Birth</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control auto-resize" id="dob" name="dob" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="designation" class="col-sm-4 col-form-label text-end required-asterisk">Designation</label>
                    <div class="col-sm-8">
                        {{-- <input type="text" class="form-control" id="designation" name="designation" required> --}}
                        <select name="designation">
                            <option value="">--Select Designation--</option>
                            @foreach($designations as $designation)
                                <option value="{{ $designation->id }}">{{ $designation->desig_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="department" class="col-sm-4 col-form-label text-end required-asterisk">Department</label>
                    <div class="col-sm-8">
                        {{-- <input type="text" class="form-control" id="department" name="department" required> --}}
                        <select name="department">
                            <option value="">--Select Department--</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->dept_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="joining_date" class="col-sm-4 col-form-label text-end required-asterisk">Joining Date</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control auto-resize" id="joining_date" name="joining_date" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="photo" class="col-sm-4 col-form-label text-end ">Upload Photo</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control auto-resize" id="photo" name="photo" accept="image/*" >
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