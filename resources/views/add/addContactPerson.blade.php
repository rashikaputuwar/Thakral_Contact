@extends('pages.sidebar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Add Contact Person</h2>
            <form action="{{Route('contactPerson.store')}}" method="POST">
                @csrf

        </div>
        <div class="row mb-3">
            <label for="client id" class="col-sm-4 col-form-label text-end required-asterisk">Select Company</label>
            <div class="col-sm-8">
                {{-- <input type="text" class="form-control" id="client id" name="client_id" required> --}}
                <select class="form-control" id="client_id" name="client_id" required>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->client_name }} </option>
                    @endforeach
                </select>
            
            </div>
        </div>
        <div class="row mb-3">
            <label for="first name" class="col-sm-4 col-form-label text-end required-asterisk">First Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="first name" name="first_name" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="last name" class="col-sm-4 col-form-label text-end required-asterisk">Last Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="last name" name="last_name" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-4 col-form-label text-end required-asterisk">Email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="contact" class="col-sm-4 col-form-label text-end required-asterisk">Contact Number</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="contact" name="contact" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="address" class="col-sm-4 col-form-label text-end required-asterisk">Address</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-8 offset-sm-4">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="reset" class="btn btn-success">Reset</button>
            </div>
        </div>

        </form>
    </div>
</div>
</div>

@endsection

{{-- adding title name --}}
@section('title')
- Add_ User
@endsection