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
                        <h2 class="display-6 text-center"> Permission Information</h2>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        @if ($hasAddPermission)
                        <a href="{{Route('button.create')}}" class="btn btn-success btn-sm btn-add-user">Add Button</a>
                        @endif
                     </div>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Button Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{$permission["id"]}}</td>
                                <td>{{$permission["button_name"]}}</td>
                                <td>{{$permission["status"]}}</td>
                                {{-- <td>
                                    <a><button class="btn btn-primary">View</button></a>
                                    <a> <button class="btn btn-warning text-white">Update</button></a>
                                </td> --}}
                                {{-- <td></td> --}}
                            </tr>
                           @endforeach
                        </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- adding title name --}}
@section('title')
- Role  
@endsection