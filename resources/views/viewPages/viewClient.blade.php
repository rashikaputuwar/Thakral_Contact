@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Organization View</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
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
                </div>
            </div>
        </div>
    </div>

@endsection

@section('title')
-Organization View
@endsection


