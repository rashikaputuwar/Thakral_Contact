@extends('pages.sidebar')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Update User</h2>
                <form action="{{Route('employee.update',$employee->id)}}" method="POST">
                    @csrf 
                   @method('PUT')
    
                   <div class="row mb-3">
                    <label for="emp_code" class="col-sm-4 col-form-label text-end">Employee Code</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="emp_code" name="emp_code" value="{{$employee->emp_code}} " required>
                    </div>
                </div>

                    <div class="row mb-3">
                        <label for="first_name" class="col-sm-4 col-form-label text-end">First Name*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$employee->fname}} " required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="last_name" class="col-sm-4 col-form-label text-end">Last Name*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$employee->lname}} " required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="email" class="col-sm-4 col-form-label text-end">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" value="{{$employee->email}}" required>
                          
                        </div> 
                    </div>
    
                    <div class="row mb-3">
                        <label for="gender" class="col-sm-4 col-form-label text-end">Gender</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="gender" name="gender" value="{{$employee->gender}}" required>
                          
                        </div> 
                    </div>

                    <div class="row mb-3">
                        <label for="department" class="col-sm-4 col-form-label text-end">Department</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="department" name="department" value="{{$employee->dept_id}}" required>
                          
                        </div> 
                    </div>

                    <div class="row mb-3">
                        <label for="designation" class="col-sm-4 col-form-label text-end">Designation</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="designation" name="designation" value="{{$employee->desig_id}}" required>
                          
                        </div> 
                    </div>

                    <div class="row mb-3">
                        <label for="dob" class="col-sm-4 col-form-label text-end">Date of Birth</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="dob" name="dob" value="{{$employee->dob}}" required>
                          
                        </div> 
                    </div>

                    <div class="row mb-3">
                        <label for="joining_date" class="col-sm-4 col-form-label text-end">Joining Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="joining_date" name="joining_date" value="{{$employee->join_date}}" required>
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