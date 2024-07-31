@extends('pages.sidebar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Update Menu Details</h2>
            <form action="{{Route('menu.update', $menu->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="menuname" class="col-sm-4 col-form-label text-end required-asterisk">Name</label>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" id="menuname" name="menuname"
                            value="{{$menu->menu_name}} " required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="status" class="col-sm-4 col-form-label text-end required-asterisk">Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="status" name="status" required>
                            <option value="">---Select Status---</option>
                            <option value="active" {{ $menu->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $menu->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="permissions" class="col-sm-4 col-form-label text-end ">Permissions</label>
                    <div class="col-sm-8">

                        @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="permission{{$permission->id}}"
                                    name="permissions[]" value="{{$permission->id}}">
                                <label for="permission{{$permission->id}}"
                                    class="form-check-label">{{$permission->button_name}}</label>
                            </div>

                        @endforeach

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
Menu_Update
@endsection