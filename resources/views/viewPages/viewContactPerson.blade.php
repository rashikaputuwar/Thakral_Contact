@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Contact Person Details View</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                        <table class="table table-bordered">
                    <tr>
                            <th>ID</th>
                            <td>{{ $contactPerson->id }}</td>
                            <th>First Name</th>
                            <td>{{ $contactPerson->first_name }}</td>                           
                    </tr>
                    <tr>
                            <th>Last Name</th>
                            <td>{{ $contactPerson->last_name }}</td>
                            <th >Contact Number</th>
                            <td>{{ $contactPerson->contact_number}}</td>
                    </tr>
                    <tr>
                            <th>Email</th>
                            <td>{{ $contactPerson->email}}</td>
                            <th>Address</th>
                            <td>{{ $contactPerson->address}}</td>
                    </tr>
                    <tr>
                        <th>Associated Company</th>
                        <td>{{ $contactPerson->client->client_name }}</td>
                    </tr>
                </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <a href="/contact">
                            <button type="back" class="btn btn-primary">Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('title')
-Contact Person Details View
@endsection


