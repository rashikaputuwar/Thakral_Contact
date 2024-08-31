@extends('pages.sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-grow-1 justify-content-center">
                            <h3 class="display text-center">Role Menu</h3>
                        </div>
                        <a href="{{ route('rolesMenu.create') }}" class="btn btn-success btn-sm btn-add-user" style="background-color: #186c6c; border-color: #186c6c; color: white;">
                            <i class="fas fa-plus"></i> Add </a>
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
                                                    <span style="display: inline-block; width: 30px; height: 30px; border-color: brown; text-align: center; line-height: 30px; border-radius: 5px;">
                                                        <i class="fas fa-eye" style="color: brown;"></i>
                                                    </span>
                                                </a>
                                                <a href="{{Route('edit.User',$role->id)}}" class="btn btn-sm" title="Update">
                                                    <span style="display: inline-block; width: 30px; height: 30px; border-color: brown; text-align: center; line-height: 30px; border-radius: 5px;">
                                                        <i class="fas fa-edit" style="color: brown;"></i>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Role Menu
@endsection




