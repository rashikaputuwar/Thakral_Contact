@extends('pages.sidebar')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Designation Details</h2>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        <a href="{{Route('designation.create')}}" class="btn btn-success btn-sm btn-add-user" style="background-color: #186c6c; border-color: #186c6c; color: white;">Add Designation</a>

                     </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Designation Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($designations as $id => $designation)
                         <tr>
                            <td>{{ $designation->id }}</td>
                            <td>{{ $designation->desig_name }}</td>
                            <td>
                                <a href="{{Route('designation.show',$designation->id)}}" class="btn btn-primary btn-sm" style="background-color: rgb(125,125,235); border-color: rgb(125,125,235); color: white;">View</a>
                                <a href="" class="btn btn-primary btn-sm" style="background-color: rgb(125,125,235); border-color: rgb(125,125,235); color: white;">Update</a>
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