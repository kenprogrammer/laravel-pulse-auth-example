@extends('pulse-auth.layouts.master')

@section('content')
  <h2 class="text-center mb-4">Login</h2>
   @if(Session::has('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
   @endif
  <form method="post" action="{{ route('login') }}">
   @csrf
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="Enter Your username">
       @if($errors->has('username'))
            <span style="color:red">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
       @endif
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your password">

       @if($errors->has('password'))
            <span style="color:red">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="checkbox">
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember_me">Remember Me</label>
    </div>
    <button type="submit" name="submit" class="btn btn-success btn-block">Login</button>
  </form>
@endsection