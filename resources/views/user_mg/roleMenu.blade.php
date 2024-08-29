@extends('pages.sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-grow-1 justify-content-center">
                            <h2 class="display text-center">Role Menu</h2>
                        </div>
                        <a href="{{ route('rolesMenu.create') }}" class="btn btn-success btn-sm btn-add-user" style="background-color: #186c6c; border-color: #186c6c; color: white;">Add</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>Role</th>
                                        <th>Menu</th>
                                        <th>Permissions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($roles as $role)
                                    @php
                                        $menus = $role->menus->unique('id');
                                    @endphp
                                    @foreach ($menus as $menu)
                                        <tr>
                                            @if ($loop->first)
                                                <td rowspan="{{ $menus->count() }}">{{ $role->role_name }}</td>
                                            @endif
                                            <td>{{ $menu->menu_name }}</td>
                                            <td>
                                                @php
                                                    $permissions = $role->permissions->where('pivot.menu_id', $menu->id);
                                                @endphp
                                                @if ($permissions->isNotEmpty())
                                                    <ul>
                                                        @foreach ($permissions as $permission)
                                                            <li>{{ $permission->button_name }} </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    No permissions available
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{Route('roleMenu.show',$role->id)}}" class="btn btn-sm" title="View">
                                                    <span style="display: inline-block; width: 30px; height: 30px; background-color: rgb(26, 210, 60); text-align: center; line-height: 30px; border-radius: 5px;">
                                                        <i class="fas fa-eye" style="color: white;"></i>
                                                    </span>
                                                </a>
                                                <a href="{{Route('edit.User',$role->id)}}" class="btn btn-sm" title="Update">
                                                    <span style="display: inline-block; width: 30px; height: 30px; background-color: rgb(56, 25, 213); text-align: center; line-height: 30px; border-radius: 5px;">
                                                        <i class="fas fa-edit" style="color: white;"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($menus->isEmpty())
                                        <tr>
                                            <td>{{ $role->role_name }}</td>
                                            <td colspan="2">No menus assigned</td>
                                        </tr>
                                    @endif
                                @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3 pr-4">
                            {{ $roles->links('pagination::bootstrap-5') }}
                        </div>
                        {{-- <div class="d-flex justify-content-end  mt-4 mb-3 pr-4">
                            @if ($hasExportPermission)
                                <a href="{{ route('contact.export') }}" class="btn btn-info btn-sm " style="background-color: #4a90e2; border-color: #4a90e2; color: white; ">Export to Excel</a>
                            @endif
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Role Menu
@endsection



