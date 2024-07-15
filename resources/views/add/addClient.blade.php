@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Add New Organization</h2>
                <form action="{{Route('client.store')}}" method="POST">
                    @csrf
                    </div>
                    <div class="row mb-3">
                        <label for="company_name" class="col-sm-4 col-form-label text-end required-asterisk">Company Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="company_name" name="company_name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="contact" class="col-sm-4 col-form-label text-end required-asterisk">Contact Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="contact" name="contact" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-4 col-form-label text-end required-asterisk">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <label for="address" class="col-sm-4 col-form-label text-end">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="website" class="col-sm-4 col-form-label text-end">website</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="website" name="website" required>
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