@extends('pages.sidebar')
@section('content')
    <div class="row justify-content-center">

            <div class="col-md-8">
                <h2 class="text-center mb-4">Designation View</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Designation Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $designation->id}}</td>
                            <td>{{ $designation->desig_name}}</td>
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

@endsection

@section('title')
-View Designation Page
@endsection