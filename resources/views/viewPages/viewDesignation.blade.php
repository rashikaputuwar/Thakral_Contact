@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> User Information Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                        <table class="table table-bordered">
                    
                        <tr>
                            <th>Id</th>
                            <td>{{ $designation->id}}</td>
                        </tr>
                   
                        
                        <tr>
                            <th>Designation Name</th>
                            <td>{{ $designation->desig_name}}</td>
                        </tr>
                   
                </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <a href="/designation">
                            <button type="back" class="btn btn-primary">Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('title')
-View Designation Page
@endsection


