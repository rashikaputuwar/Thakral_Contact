@extends('pages.sidebar')
@section('content')
    <div class="row justify-content-center">

            <div class="col-md-10">
                <h2 class="text-center mb-4">Organization View</h2>
                <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $client->id}}</td>
                            <th>Organization Name</th>
                            <td>{{ $client->client_name }}</td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>{{ $client->contact_number}}</td>
                            <th>Email</th>
                            <td>{{ $client->email}}</td>
                        </tr>
                        <tr>
                            <th>Address</th> 
                            <td>{{ $client->address}}</td>
                            <th>Website</th>
                            <td>{{ $client->website}}</td>
                        </tr>
                </table>
            </div>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-4">
            <a href="/client">
            <button type="back" class="btn btn-primary">Back</button></a>
        </div>
    </div>

@endsection

@section('title')
-Organization View
@endsection