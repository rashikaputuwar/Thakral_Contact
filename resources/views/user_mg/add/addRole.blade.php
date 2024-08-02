@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Add New Role</h2>
                <form action="{{route('roles.store')}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="role_id" class="col-sm-4 col-form-label text-end required-asterisk">Role Id</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="role_id" name="roleid" required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="text" class="col-sm-4 col-form-label text-end required-asterisk">Role Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="role_name" name="rolename" required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="status" class="col-sm-4 col-form-label text-end required-asterisk">Status</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="status" name="status" required>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                               
                            </select>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="submit" class="btn btn-primary" style="background-color: #186c6c; border-color: #186c6c; color: white;">Add</button>
<button type="reset" class="btn btn-success" style="background-color: #186c6c; border-color: #186c6c; color: white;">Reset</button>

                            {{-- <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-success">Reset</button> --}}
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