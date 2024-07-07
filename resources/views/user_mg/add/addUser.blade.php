@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Add New User</h2>
                <form action="{{Route('add.User')}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="user_id" class="col-sm-4 col-form-label text-end">User Id*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="user_id" name="userid" required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="password" class="col-sm-4 col-form-label text-end">Password*</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="userpassword" required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="password_confirmation" class="col-sm-4 col-form-label text-end">Repeat password*</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="user_name" class="col-sm-4 col-form-label text-end">User Name*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="user_name" name="username" required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="employee_id" class="col-sm-4 col-form-label text-end">Employee Id</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="employee_id" name="employeeid" required>
                          
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="expiry_date" class="col-sm-4 col-form-label text-end">Expiry Date*</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="status" class="col-sm-4 col-form-label text-end">Status*</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="status" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Closed</option>
                                <option value="locked">Locked</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
- Add_ User   
@endsection