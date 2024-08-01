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
{{-- <a href="/newuser" class="btn btn-success btn-sm btn-add-user">Add Users</a> --}}
    <div class="container">
        
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Users Information</h2>
                    </div>
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        @if ($hasAddPermission)  
                        <a href="{{Route('create.user')}}" class="btn btn-success btn-sm btn-add-user">Add Users</a>
                        @endif
                     </div>
                        <table class="table table-bordered">
                            <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                {{-- <th>User ID</th> --}}
                                <th>User Name</th>
                                <th>Employee Name</th>
                                <th>PW Expiry Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $id => $user)
                         <tr>
                            <td>{{ $user->id }}</td>
                            {{-- <td>{{ $user->user_id}}</td> --}}
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->employee->fname}} {{ $user->employee->lname}}</td>
                            <td>{{ $user->expiry_date }}</td>
                            <td>{{ $user->status }}</td>
                            <td>
                                 @if ($hasAddPermission)
                                 <a href="{{Route('showUser',$user->id)}}" class="btn btn-primary btn-sm">View</a>
                                 @endif
                                 @if ($hasAddPermission)
                                 <a href="{{Route('edit.User',$user->id)}}" class="btn btn-primary btn-sm">Update</a>
                                 @endif
                            </td>
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
-User   
@endsection