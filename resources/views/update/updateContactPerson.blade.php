@extends('pages.sidebar')
@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Update Contact Person</h2>
            <form action="{{Route('contactPerson.update', $contactPerson->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="client id" class="col-sm-4 col-form-label text-end required-asterisk">Select
                        Company</label>
                    <div class="col-sm-8">
                        {{-- <input type="text" class="form-control" id="client id" name="client_id" required> --}}
                        <select class="form-control" id="client_id" name="client_id" required>
                            <option value="">---Select Company---</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->client_name }} </option>
                            @endforeach
                        </select>

                    </div>
                    </div>
                    <div class="row mb-3">
                        <label for="first name" class="col-sm-4 col-form-label text-end required-asterisk">First
                            Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="first name" name="first_name" value="{{$contactPerson->first_name}} "required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="last name" class="col-sm-4 col-form-label text-end required-asterisk">Last
                            Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="last name" name="last_name" value="{{$contactPerson->last_name}} "required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-4 col-form-label text-end required-asterisk">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" value="{{$contactPerson->email}} " required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="contact" class="col-sm-4 col-form-label text-end required-asterisk">Contact
                            Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{$contactPerson->contact_number}} " required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-sm-4 col-form-label text-end required-asterisk">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" name="address" value="{{$contactPerson->address}} " required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <button type="Update" class="btn btn-primary" style="background-color: #186c6c; border-color: #186c6c; color: white;">Update</button>
                            <!-- <button type="reset" class="btn btn-success">Reset</button> -->
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('title')
COntact_Person_Update
@endsection