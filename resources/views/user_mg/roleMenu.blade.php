@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Role Menu </h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{Route('roleMenu.create')}}" class="btn btn-success btn-sm btn-add-user">Add</a>
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
                                    <tr>
                                        <td rowspan="{{ count($role->menus) + 1 }}">{{ $role->role_name }}</td>
                                    </tr>
                                    @foreach ($role->menus as $menu)
                                        <tr>
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
