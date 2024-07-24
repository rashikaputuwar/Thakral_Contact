@extends('pages.sidebar')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Update Organization Details</h2>
                <form action="{{Route('client.update',$client->id)}}" method="POST">
                    @csrf 
                   @method('PUT')
    
                   <div class="row mb-3">
                    <label for="client_name" class="col-sm-4 col-form-label text-end">Company Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control auto-resize" id="client_name" name="client_name" value="{{$client->client_name}} " required>
                    </div>
                </div>

                    <div class="row mb-3">
                        <label for="contact_number" class="col-sm-4 col-form-label text-end">Contact Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="contact_number" name="contact_number" value="{{$client->contact_number}} " required>
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="email" class="col-sm-4 col-form-label text-end">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="email" name="email" value="{{$client->email}}" required>
                          
                        </div> 
                    </div>

                    <div class="row mb-3">
                        <label for="address" class="col-sm-4 col-form-label text-end">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="address" name="address" value="{{$client->address}}" required>
                          
                        </div> 
                    </div>
    
                    <div class="row mb-3">
                        <label for="website" class="col-sm-4 col-form-label text-end">website</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control auto-resize" id="website" name="website" value="{{$client->website}}" required>
                          
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="Update" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-success">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>  
@endsection

@section('title')
Client_Update
@endsection