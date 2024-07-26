@extends('pages.sidebar')
@section('content')
    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display text-center"> Contact Person Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        <a href="{{Route('client.createContact')}}" class="btn btn-success btn-sm btn-add-user">Add Contact Person</a>
                        </div>
                        <div class="table-responsive">
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
                                <a href="{{Route('contactPerson.show',$contactPerson->id)}}" class="btn btn-primary btn-sm">View</a>
                                <a href="" class="btn btn-primary btn-sm">Update</a>
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
    </div>
@endsection

{{-- adding title name --}}
@section('title')
User
@endsection