@extends('pages.sidebar')
@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <h2 class="text-center text-complementary">Add Menu</h2>
            <form action="{{Route('rolesMenu.store')}}" method="post">
                @csrf
                <div class="form-group mb-4">
                    <label for="roleid" class="form-label">Role</label>
                    <select class="form-control" id="role_id" name="role_id" required>
                        <option value="">---Select Role---</option>
                        @foreach($rolesWithOutPermissions as $role)
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form_group mb-4">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="">---Select Status---</option>
                        <option value="active">Active</option>
                        <option value="inactive">Closed</option>
                    </select>
                </div>

                <!-- Menus and Permissions  -->
                <div class="form-group mb-4">
                    <div class="menus">
                        @foreach ($menus as $menu)
                        <div class="menu-item mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input parent-checkbox" id="menu{{$menu->id}}" name="menus[]" value="{{$menu->id}}">
                                <label for="menu{{$menu->id}}" class="form-check-label">{{$menu->menu_name}}</label>
                            </div>
                            <div class="permissions ms-4">
                                {{-- Child checkboxes --}}
                                @foreach ($menu->permissions as $permission)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input child-checkbox" id="permission{{$permission->id}}_{{$menu->id}}" name="permissions[{{$menu->id}}][]" value="{{$permission->id}}">
                                    <label for="permission{{$permission->id}}_{{$menu->id}}" class="form-check-label">{{$permission->button_name}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle parent checkbox change event
        document.querySelectorAll('.parent-checkbox').forEach(function(parentCheckbox) {
            parentCheckbox.addEventListener('change', function() {
                // Get the associated child checkboxes
                const childCheckboxes = this.closest('.menu-item').querySelectorAll('.child-checkbox');
                
                // Set the checked property of child checkboxes to match parent checkbox
                childCheckboxes.forEach(function(childCheckbox) {
                    childCheckbox.checked = parentCheckbox.checked;
                });
            });
        });
    });
</script>

@endsection

{{-- Adding title name --}}
@section('title')
Add Role Menu
@endsection
