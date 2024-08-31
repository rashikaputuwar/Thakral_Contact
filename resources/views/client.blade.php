@extends('pages.sidebar')
@section('content')
@php
    $roleMenus = session('role_menus', collect([]));
    // Check permissions for add, edit, and view actions
    $hasAddPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 1);
    $hasEditPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 4);
    $hasViewPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 5);
@endphp
    <div class="container mt-4">
        
        <div class="row">
            <div class= "col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="my-0"> Organization Information</h4>
                        <div class="d-flex align-items-center gap-2">

                            <form action="{{ route('client.search') }}" method="GET" class="d-flex align-items-center">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-search"></i> 
                                    </button>
                                </div>
                            </form>

                        @if ($hasAddPermission)
                    <a href="{{Route('client.createClient')}}" class="btn btn-success btn-sm btn-add-user"style="background-color: #186c6c; border-color: #186c6c; color: white;">
                        <i class="fas fa-plus"></i> Add </a>
                    @endif
                    </div>
                </div>
                    <div class="card-body">
                       
                        <table class="table table-bordered">
                            <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Company Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $id => $client)
                         <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->client_name }}</td>
                            <td>{{ $client->contact_number}}</td>
                            <td>{{ $client->email}}</td>
                            <td>{{ $client->address}}</td>
                            <td>{{ $client->website}}</td>
                            <td>
                                @if ($hasViewPermission)
                                <a href="{{Route('client.show',$client->id)}}" class="btn btn-sm" title="View">
                                    <span style="display: inline-block; width: 30px; height: 30px; border-color: brown; text-align: center; line-height: 30px; border-radius: 5px;">
                                        <i class="fas fa-eye" style="color: brown;"></i>
                                    </span>
                                </a>
                                @endif
                                @if($hasEditPermission)
                                <a href="{{Route('client.edit',$client->id)}}" class="btn btn-sm" title="Update">
                                    <span style="display: inline-block; width: 30px; height: 30px; border-color: brown; text-align: center; line-height: 30px; border-radius: 5px;">
                                        <i class="fas fa-edit" style="color: brown;"></i>
                                    </span>
                                </a>
                                @endif
                            </td>
                        </tr>
                             @endforeach
                        </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-4 mb-3 pr-4">
                        {{ $clients->links('pagination::bootstrap-5') }}
                    </div>
                    <div class="d-flex justify-content-end  mt-4 mb-3 pr-4" tyle="margin-top: 20px;">
                        @if ($hasExportPermission)
                        <a href="{{ route('client.export') }}" class="btn btn-info btn-sm" style="background-color: #107c41; border-color: #107c41; color: white;">Export to Excel</a>
                    @endif
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