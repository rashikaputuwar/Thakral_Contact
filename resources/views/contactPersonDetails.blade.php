@extends('pages.sidebar')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Contact Person Details</h2>
                    </div>

                    <div class="card-body">
                        <a href="{{Route('client.createContact')}}" class="btn btn-success btn-sm btn-add-user">Add Contact Person</a>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Company Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Associated Company</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contactPerson as $id => $contactPerson)
                         <tr>
                            <td>{{ $contactPerson->id }}</td>
                            <td>{{ $contactPerson->client_name }}</td>
                            <td>{{ $contactPerson->contact_number}}</td>
                            <td>{{ $contactPerson->email}}</td>
                            <td>{{ $contactPerson->address}}</td>
                           
                            <td>
                                <a href="" class="btn btn-primary btn-sm">View</a>
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
@endsection

{{-- adding title name --}}
@section('title')
User
@endsection