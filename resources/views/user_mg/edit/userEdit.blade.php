@extends('pages.sidebar')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Update User</h2>
                <form action="" method="POST">
                    @csrf 
                   {{-- @method('PUT') --}}
    
                    <div class="row mb-3">
                        <label for="user_name" class="col-sm-4 col-form-label text-end">User Name*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name', $user->user_name ?? '') }}" required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="employee_id" class="col-sm-4 col-form-label text-end">Employee Id</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="employee_id" name="employeeid" value="{{ old('employeeid', $user->employee_id ?? '') }}" required>
                          
                        </div> 
                    </div>
                    <div class="row mb-3">
                        <label for="expiry_date" class="col-sm-4 col-form-label text-end">Expiry Date*</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ old('expiry_date', $user->expiry_date ?? '') }}" required>
                        </div>
                    </div> 
    
                    <div class="row mb-3">
                        <label for="status" class="col-sm-4 col-form-label text-end">Status*</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="status" name="status" value="{{ old('status', $user->status ?? '') }}" required>
                                <option value="active">Active</option>
                                <option value="inactive">Closed</option>
                                <option value="locked">Locked</option>
                            </select>
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
User_Update
@endsection