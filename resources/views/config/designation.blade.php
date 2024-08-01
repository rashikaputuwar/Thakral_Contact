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
                        <h2 class="display-6 text-center"> Designation Details</h2>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        @if ($hasAddPermission)
                        <a href="{{Route('designation.create')}}" class="btn btn-success btn-sm btn-add-user">Add Designation</a>
                        @endif    

                     </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Designation Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($designations as $id => $designation)
                         <tr>
                            <td>{{ $designation->id }}</td>
                            <td>{{ $designation->desig_name }}</td>
                            <td>
                            @if ($hasAddPermission)
                                <a href="{{Route('designation.show',$designation->id)}}" class="btn btn-primary btn-sm">View</a>
                                @endif 
                                @if ($hasAddPermission)   
                                <a href="" class="btn btn-primary btn-sm">Update</a>
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
User
@endsection