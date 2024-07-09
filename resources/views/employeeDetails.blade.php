@extends('pages.sidebar')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Employees Details</h2>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        <a href="" class="btn btn-success btn-sm btn-add-user">Add Employee</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee Code</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
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
                                <a href="" class="btn btn-primary btn-sm">View</a>
                                <a href="" class="btn btn-primary btn-sm">Update</a>
                            </td>
                        </tr>
                             @endforeach
                        </tbody> --}}

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- adding title name --}}
@section('title')
Employee
@endsection