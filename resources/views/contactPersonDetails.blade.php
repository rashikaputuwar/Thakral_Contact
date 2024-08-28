@extends('pages.sidebar')
@section('content')
@php
    $roleMenus = session('role_menus', collect([]));

    // Check permissions for add, edit, and view actions
    $hasAddPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 1);
    $hasEditPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 4);
    $hasViewPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 5);
@endphp
    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-grow-1 justify-content-center">
                            <h2 class="display">Contact Person Details</h2>
                        </div>
                        @if ($hasAddPermission)
                        <a href="{{ Route('client.createContact') }}" class="btn btn-sm btn-add-user" style="background-color: #186c6c; border-color: #186c6c; color: white;">Add Contact Person</a>
                        @endif
                    </div>
                    <div class="card-body">
                        </div>
                        <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Associated Company</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contactPersons as $contactPerson)
                         <tr>
                            <td>{{ $contactPerson->id }}</td>
                            <td>{{ $contactPerson->first_name }}</td>
                            <td>{{ $contactPerson->last_name }}</td>
                            <td>{{ $contactPerson->contact_number}}</td>
                            <td>{{ $contactPerson->email}}</td>
                            <td>{{ $contactPerson->address}}</td>
                            <td>{{ $contactPerson->client->client_name }}</td>

                            
                            <td>
                                @if($hasViewPermission)
                                <a href="{{Route('contactPerson.show',$contactPerson->id)}}" class="btn btn-sm" title="View">
                                    <span style="display: inline-block; width: 30px; height: 30px; background-color: rgb(26, 210, 60); text-align: center; line-height: 30px; border-radius: 5px;">
                                        <i class="fas fa-eye" style="color: white;"></i>
                                    </span>
                                </a>
                                @endif
                                @if($hasEditPermission)
                                <a href="{{Route('contactPerson.edit',$contactPerson->id)}}" class="btn btn-sm" title="Update">
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
                        <div class="d-flex justify-content-end  mt-4" tyle="margin-top: 20px;">
                            @if ($hasExportPermission)
                                <a href="{{ route('contact.export') }}" class="btn btn-info btn-sm" style="background-color: #4a90e2; border-color: #4a90e2; color: white; ">Export to Excel</a>
                            @endif
                        </div>
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