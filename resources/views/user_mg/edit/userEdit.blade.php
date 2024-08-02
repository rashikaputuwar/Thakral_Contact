@extends('pages.sidebar')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Update User</h2>
                <form action="{{Route('update.user',$data->id)}}" method="POST">
                    @csrf 
                   @method('PUT')
    
                    <div class="row mb-3">
                        <label for="user_name" class="col-sm-4 col-form-label text-end">User Name*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="user_name" name="user_name" value="{{$data->user_name}} " required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="employee_id" class="col-sm-4 col-form-label text-end">Employee Id</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="employee_id" name="employeeid" value="{{$data->employee_id}}" required>
                          
                        </div> 
                    </div>
                    <div class="row mb-3">
                        <label for="expiry_date" class="col-sm-4 col-form-label text-end">Expiry Date*</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{$data->expiry_date}}" required>
                        </div>
                    </div> 
    
                    <div class="row mb-3">
                        <label for="status" class="col-sm-4 col-form-label text-end">Status*</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="status" name="status" required>
                                <option value="Active" {{ old('status', $data->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ old('status', $data->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="Locked" {{ old('status', $data->status) == 'Locked' ? 'selected' : '' }}>Locked</option>
                                
                            </select>
                        </div>
                    </div>
                    
    
                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="Update" class="btn btn-primary" style="background-color: #186c6c; border-color: #186c6c; color: white;">Update</button>
                            {{-- <button type="reset" class="btn btn-success">Reset</button> --}}
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