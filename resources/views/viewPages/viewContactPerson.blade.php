@extends('pages.sidebar')
@section('content')
    <div class="row justify-content-center">

            <div class="col-md-8">
                <h2 class="text-center mb-4">Contact Person Details View</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Associated Company</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $contactPerson->id }}</td>
                            <td>{{ $contactPerson->first_name }}</td>
                            <td>{{ $contactPerson->last_name }}</td>
                            <td>{{ $contactPerson->contact_number}}</td>
                            <td>{{ $contactPerson->email}}</td>
                            <td>{{ $contactPerson->address}}</td>
                            <td>{{ $contactPerson->client->client_name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-4">
            <a href="/contact">
            <button type="back" class="btn btn-primary">Back</button></a>
        </div>
    </div>

@endsection

@section('title')
-Contact Person Details View
@endsection