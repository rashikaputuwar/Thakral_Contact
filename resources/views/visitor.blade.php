@extends('pages.sidebar')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Visitor Information</h2>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                        {{-- <a href="{{Route('designation.create')}}" class="btn btn-success btn-sm btn-add-user"></a> --}}
                        <form action="" method="GET">
                            @csrf
                            <div>
                                <label for="phone">Phone Number:</label>
                                <input type="tel" id="phone" name="phone">
                                <button type="submit">Search</button>
                            </div>

                            <div></div>
                        </form>
                        
                        {{-- @if(isset($users))
                            <h2>Search Results:</h2>
                            <ul>
                                @foreach($users as $user)
                                    <li>{{ $user->name }} (Phone: {{ $user->phone }})</li>
                                @endforeach
                            </ul>
                        @endif --}}
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