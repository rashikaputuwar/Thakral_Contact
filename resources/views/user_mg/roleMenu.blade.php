@extends('pages.sidebar')
@section('content')
@php
    // Retrieve role_menus data from the session or default to an empty collection
    $roleMenus = session('role_menus', collect([]));
    
    $roleMenus = session('role_menus', collect([]));
    $hasAddPermission = $roleMenus->filter(function($item) {
        return $item->menu_id == 2 && $item->permission_id == 1;
    })->isNotEmpty();
    $hasEditPermission = $roleMenus->filter(function($item) {
        return $item->menu_id == 2 && $item->permission_id == 4;
    })->isNotEmpty();
    $hasViewPermission = $roleMenus->filter(function($item) {
        return $item->menu_id == 2 && $item->permission_id == 5;
    })->isNotEmpty();
  
@endphp
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Role Menu</h2>
                    </div>
                    <div class="card-body">
                        @if ($hasAddPermission)
                        <a href="{{ route('rolesMenu.create') }}" class="btn btn-success btn-sm btn-add-user">Add</a>
                        @endif
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
                                            @if ($hasAddPermission)
                                            <a href="{{Route('roleMenu.show',$role->id)}}" class="btn btn-primary btn-sm">View</a>
                                            @endif
                                            
                                            @if ($hasAddPermission)
                                            <a href="{{Route('edit.User',$role->id)}}" class="btn btn-primary btn-sm">Update</a>
                                            @endif
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Role Menu
@endsection



{{-- @extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Role Menu</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('roleMenu.create') }}" class="btn btn-success btn-sm btn-add-user">Add</a>
                         </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Menu</th>
                                    <th>Permissions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    @foreach ($role->menus as $menu)
                                        <tr>
                                            @if ($loop->first)
                                                <td rowspan="{{ count($role->menus) }}">{{ $role->role_name }}</td>
                                            @endif
                                            <td>{{ $menu->menu_name }} ({{ $menu->status }})</td>
                                            <td>
                                                <ul>
                                                    @foreach ($menu->permissions as $permission)
                                                        <li>{{ $permission->button_name }} ({{ $permission->status }})</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($role->menus->isEmpty())
                                        <tr>
                                            <td>{{ $role->role_name }}</td>
                                            <td colspan="2">No menus assigned</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
