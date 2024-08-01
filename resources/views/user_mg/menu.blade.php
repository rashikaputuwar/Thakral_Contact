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
                        <h2 class="display-6 text-center"> Menu Information</h2>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        @if ($hasAddPermission)
                        <a href="{{ route('menu.create') }}" class="btn btn-success btn-sm btn-add-user">Add Menu</a>
                        @endif
                     </div>

                        <table class="table table-bordered">
                            <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Menu</th>
                                {{-- <th>Status</th> --}}
                                <th>Action</th>            
                                {{-- <th>Button</th>             --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($menus as $id => $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->menu_name }}</td>
                                {{-- <td>{{ $menu->status }}</td> --}}
                                <td>
                                @if ($hasAddPermission)
                                    <a href="{{Route('menu.show',$menu->id)}}"><button class="btn btn-primary">View</button></a>
                                @endif
                                    @if ($hasAddPermission)
                                    <a> <button class="btn btn-primary">Update</button></a>
                                    @endif
                                </td>
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