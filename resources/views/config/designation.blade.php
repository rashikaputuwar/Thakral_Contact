@extends('pages.sidebar')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-grow-1 justify-content-center">
                        <h3 class="display text-center"> Designation Details</h3>
                        </div>
                        <a href="{{Route('designation.create')}}" class="btn btn-success btn-sm btn-add-user" style="background-color: #186c6c; border-color: #186c6c; color: white;">
                            <i class="fas fa-plus"></i> Add 
                        </a>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead class="text-center">
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
                                    <a href="{{Route('designation.show',$designation->id)}}" class="btn btn-sm" title="View">
                                        <span style="display: inline-block; width: 30px; height: 30px; border-color: brown; text-align: center; line-height: 30px; border-radius: 5px;">
                                            <i class="fas fa-eye" style="color: brown;"></i>
                                        </span>
                                    </a>
                                    <a href="" class="btn btn-sm" title="Update">
                                        <span style="display: inline-block; width: 30px; height: 30px; border-color: brown; text-align: center; line-height: 30px; border-radius: 5px;">
                                            <i class="fas fa-edit" style="color: brown;"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>

                            </table>
                            </div>
                            <div class="d-flex justify-content-end mt-4 mb-3 pr-4">
                                {{ $designations->links('pagination::bootstrap-5') }}
                            </div>
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