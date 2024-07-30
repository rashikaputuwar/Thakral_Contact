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
                <h2 class="text-center mb-4">Update User</h2>
                <form action="{{Route('employee.update',$employee->id)}}" method="POST">
                    @csrf 
                   @method('PUT')
    
                   <div class="row mb-3">
                    <label for="emp_code" class="col-sm-4 col-form-label text-end required-asterisk">Employee Code</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control auto-resize" id="emp_code" name="emp_code" value="{{$employee->emp_code}} " required>
                    </div>
                </div>

                    <div class="row mb-3">
                        <label for="first_name" class="col-sm-4 col-form-label text-end required-asterisk">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="first_name" name="first_name" value="{{$employee->fname}} " required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="last_name" class="col-sm-4 col-form-label text-end required-asterisk">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="last_name" name="last_name" value="{{$employee->lname}} " required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="email" class="col-sm-4 col-form-label text-end required-asterisk">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="email" name="email" value="{{$employee->email}}" required>
                          
                        </div> 
                    </div>

                    <div class="row mb-3">
                        <label for="gender" class="col-sm-4 col-form-label text-end required-asterisk">Gender</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="gender" name="gender" value="{{$employee->gender}}" required>
                          
                        </div> 
                    </div>
    
                    <div class="row mb-3">
                        <label for="dob" class="col-sm-4 col-form-label text-end required-asterisk">Date of Birth</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control auto-resize" id="dob" name="dob" value="{{$employee->dob}}" required>
                          
                        </div> 
                    </div>

                    <div class="row mb-3">
                        <label for="personal_contact" class="col-sm-4 col-form-label text-end required-asterisk">Personal Contact</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="personal_contact" name="personal_contact" value="{{$employee->personal_contact}}" required>
                          
                        </div> 
                    </div>
                    
                    <div class="row mb-3">
                        <label for="office_contact" class="col-sm-4 col-form-label text-end">Office Contact</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="office_contact" name="office_contact" value="{{$employee->office_contact}}">
                        </div> 
                    </div>

                  


                    <div class="row mb-3">
                        <label for="department" class="col-sm-4 col-form-label text-end required-asterisk">Department</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="department" name="department" value="{{$employee->dept_id}}" required>
                          
                        </div> 
                    </div>

                    <div class="row mb-3">
                        <label for="designation" class="col-sm-4 col-form-label text-end required-asterisk">Designation</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="designation" name="designation" value="{{$employee->desig_id}}" required>
                          
                        </div> 
                    </div>

                    <div class="row mb-3">
                        <label for="temp_address" class="col-sm-4 col-form-label text-end required-asterisk">Temporary Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="temp_address" name="temp_address" value="{{$employee->temp_address}}" required>
                          
                        </div> 
                    </div>

                    <div class="row mb-3">
                        <label for="perm_address" class="col-sm-4 col-form-label text-end">Permanent Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="perm_address" name="perm_address" value="{{$employee->perm_address}}">
                          
                        </div> 
                    </div>

                   

                    <div class="row mb-3">
                        <label for="joining_date" class="col-sm-4 col-form-label text-end required-asterisk">Joining Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control auto-resize" id="joining_date" name="joining_date" value="{{$employee->join_date}}" required>
                        </div>
                    </div> 

    
                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="Update" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-success">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>  
@endsection

@section('title')
Employee_Update
@endsection