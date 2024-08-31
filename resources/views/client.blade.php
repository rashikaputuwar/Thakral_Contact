@extends('pages.sidebar')
@section('content')
@php
    $roleMenus = session('role_menus', collect([]));
    // Check permissions for add, edit, and view actions
    $hasAddPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 1);
    $hasEditPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 4);
    $hasViewPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 5);
@endphp
    <div class="container">
        
        <div class="row-12">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-grow-1 justify-content-center">
                        <h3 class="display text-center"> Organization Information</h3>
                        </div>
                        @if ($hasAddPermission)
                    <a href="{{Route('client.createClient')}}" class="btn btn-success btn-sm btn-add-user"style="background-color: #186c6c; border-color: #186c6c; color: white;">
                        <i class="fas fa-plus"></i> Add </a>
                    @endif
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
                                    <span style="display: inline-block; width: 30px; height: 30px; background-color: rgb(26, 210, 60); text-align: center; line-height: 30px; border-radius: 5px;">
                                        <i class="fas fa-eye" style="color: white;"></i>
                                    </span>
                                </a>
                                @endif
                                @if($hasEditPermission)
                                <a href="{{Route('client.edit',$client->id)}}" class="btn btn-sm" title="Update">
                                    <span style="display: inline-block; width: 30px; height: 30px; background-color: rgb(56, 25, 213); text-align: center; line-height: 30px; border-radius: 5px;">
                                        <i class="fas fa-edit" style="color: white;"></i>
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