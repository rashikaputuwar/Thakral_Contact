@extends('pages.sidebar')
@section('content')
    <div class="container">
        
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Organization Information</h2>
                    </div>
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        <a href="{{Route('client.createClient')}}" class="btn btn-success btn-sm btn-add-user">Add Client</a>
                       
                     </div>
                        <table class="table table-bordered">
                            <thead>
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
                            @foreach($clients as $id => $client)
                         <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->client_name }}</td>
                            <td>{{ $client->contact_number}}</td>
                            <td>{{ $client->email}}</td>
                            <td>{{ $client->address}}</td>
                            <td>{{ $client->website}}</td>
                            <td>
                                <a href="{{Route('client.show',$client->id)}}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{Route('client.edit',$client->id)}}" class="btn btn-primary btn-sm">Update</a>
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