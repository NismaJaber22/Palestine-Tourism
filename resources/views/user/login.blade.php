@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/login.css') }}">
@endsection

@section('content')
<div class="login-background">
    <div class="login-content">
     <h1 class="login-header">Login</h1>

     @if (session()->has('success'))
     <div class='alert alert-success w-75 text-center'><h2>{{ session()->get('success') }}</h2></div>
 @endif
     <form method="post" action="{{url('login')}}">
        @csrf
         <label class="login-label">Email</label>
         <input onkeyup="email_validation(this)" class="input-group-text form-control login-input" type="email" name="email" placeholder="Your Email"/>
         <p id="email-error"></p>
         <label  class="login-label">Password</label>
         <input onkeyup="password_validation(this)" class="input-group-text form-control login-input" type="password" name="password"  placeholder="Your Password" />
         <p id="pass-error"></p>
         <label>remember me</label>
         <input type="checkbox" name="remember"  />
         <input id="js-btn" class="btn btn-primary login-btn disabled" type="submit" name="send" value="Login" />
     </form>
     <p>If you are a new user, you can <a href="{{url('signup')}}" class="go-signup">Sign up?</a></p>
    </div>
 </div>

@endsection

@section('script')
    <script src="{{ asset('user/js/login.js') }}"></script>
@endsection
