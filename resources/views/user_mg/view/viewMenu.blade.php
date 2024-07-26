@extends('pages.sidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Menu Information Details</h2>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        
                     </div>

                        <table class="table table-bordered">
                            
                            <tr>
                                <th>Id</th>
                                <td>{{ $menus->id }}</td>
                                <th>Menu</th> 
                                <td>{{ $menus->menu_name }}</td>
                                {{-- <th>Status</th> --}}           
                            </tr>
                        </table>
                            
                        <div class="row">
                            <div class="col-sm-8 offset-sm-4">
                                <a href="/menu">
                                <button type="back" class="btn btn-primary">Back</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection

{{-- adding title name --}}
@section('title')
- Role  
@endsection