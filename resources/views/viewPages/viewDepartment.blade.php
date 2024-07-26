@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Department View</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                        <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <td>{{ $department->id}}</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Department Name</th>
                            <td>{{ $department->dept_name}}</td>
                        </tr>
                    </tbody>
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
-View Department Page
@endsection


