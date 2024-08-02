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
        
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Organization Information</h2>
                    </div>
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            @if ($hasAddPermission)
                        <a href="{{Route('client.createClient')}}" class="btn btn-success btn-sm btn-add-user">Add Client</a>
                        @endif
                     </div>
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
                            @foreach($client as $id => $client)
                         <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->client_name }}</td>
                            <td>{{ $client->contact_number}}</td>
                            <td>{{ $client->email}}</td>
                            <td>{{ $client->address}}</td>
                            <td>{{ $client->website}}</td>
                            <td>
                                @if ($hasViewPermission)
                                <a href="{{Route('client.show',$client->id)}}" class="btn btn-primary btn-sm">View</a>
                                @endif
                                @if($hasEditPermission)
                                <a href="{{Route('client.edit',$client->id)}}" class="btn btn-primary btn-sm">Update</a>
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