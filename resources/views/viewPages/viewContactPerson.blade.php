@extends('pages.sidebar')
@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="row justify-content-center">

            <div class="col-md-10">
                <h2 class="text-center mb-4">Contact Person Details View</h2>
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

@endsection

@section('title')
-Contact Person Details View
@endsection