@extends('pages.sidebar')
@section('content')
<form method="POST" action="{{route('login.check')}}">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="user_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
      
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
    </div>

    <button type="submit" class="btn btn-primary">login</button>
  </form>
  @endsection