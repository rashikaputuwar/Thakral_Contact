@extends('pages.sidebar')

@section('content')
<div class="login-container">
    <form method="POST" action="{{route('login.match')}}" class="login-form">
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
        <div class="user_name">
            <h3>User Login</h3>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="user_name" class="form-control" id="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <div class="reset-container">
            <label class="reset-label">
            <a href="" class="reset-link">Forget Password?</a>
        </label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<style>
    .user_name{
        display: flex;
        justify-content: center;
    }
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60vh;
        /* background: #fff;  */
        font-family:'Poppins', sans-serif;
    }

    .reset-link{
        font-weight: normal;
        color:   #12245c;
      
    }
    .reset-container{
        margin-bottom: 10px;
        display: flex;
        justify-content: flex-end;
    }
    .login-form {
        max-width: 500px;
        width: 100%;
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .login-form .form-group {
        margin-bottom: 15px;
    }

    .login-form label {
        font-weight: bold;
        color: #333;
    }

    .login-form .form-control {
        border-radius: 4px;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 16px;
        color: #333;
        width: 100%;
    }

    .login-form .form-control:focus {
        border-color: #2ebf91;
        box-shadow: 0 0 8px rgba(46, 191, 145, 0.2);
    }

    .login-form .btn-primary {
        display: block;
        width: 50%;
        padding: 10px;
        background-color:  #12245c;
        border: none;
        border-radius: 4px;
        font-size: 18px;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin: 0 auto; /* Center the button horizontally */
    }

    .login-form .btn-primary:hover {
        background-color:  #12245c;
    }

    .alert {
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 4px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .alert-danger ul {
        list-style-type: none;
        padding-left: 0;
    }

    .alert-danger li {
        margin: 5px 0;
    }
</style>

@endsection

{{-- @extends('pages.sidebar')
@section('content')
<div style="display: flex; justify-content: center; align-items: center;  height: 50vh;">
<form method="POST" action="{{route('login.match')}}" style="max-width: 400px; width: 100%; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.5);">
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
  @endsection --}}