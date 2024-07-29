@extends('pages.sidebar')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Update Role</h2>
                <form action="{{Route('roles.update',$role->id)}}" method="POST">
                    @csrf 
                   @method('PUT')
    
                   <div class="row mb-3">
                        <label for="role_id" class="col-sm-4 col-form-label text-end required-asterisk">Role Id</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="role_id" name="role_id" value="{{$role->role_id}}" required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="text" class="col-sm-4 col-form-label text-end required-asterisk">Role Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="role_name" name="role_name" value="{{$role->role_name}}" required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="status" class="col-sm-4 col-form-label text-end required-asterisk">Status</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="status" name="status" value="{{$role->status}}"required>
                            <option value="yes" {{ $role->status == 'yes' ? 'selected' : '' }}>Yes</option>
                            <option value="no" {{ $role->status == 'no' ? 'selected' : '' }}>No</option>
                               
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="Update" class="btn btn-primary">Update</button>
                            <!-- <button type="reset" class="btn btn-success">Reset</button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>  
@endsection

@section('title')
Client_Update
@endsection