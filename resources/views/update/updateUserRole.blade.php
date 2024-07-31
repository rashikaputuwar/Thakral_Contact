@extends('pages.sidebar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Update User Role</h2>
            <form action="{{ route('userRole.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3 row">
                    <label for="user_name" class="col-sm-3 col-form-label text-end required-asterisk">User Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="user_name" name="username" value="{{ $user->employee->full_name }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="roles" class="col-sm-3 col-form-label text-end">Assign Roles:</label>
                    <div class="col-sm-9">
                        <div class="row">
                            @foreach($roles as $role)
                                <div class="row-md-4 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" 
                                            {{ in_array($role->id, $userRoles) ? 'checked' : '' }}>
                                        <label class="form-check-label">
                                            {{ $role->role_name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <!-- <button type="reset" class="btn btn-success">Reset</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('title')
User Role Update
@endsection
