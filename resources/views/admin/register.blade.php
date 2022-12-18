@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/signup.css') }}">
@endsection

@section('content')
    <div class="signup-background">
        <div class="signup-content">
            <h1 class="signup-header fs-1 pt-3">Sign Up</h1>

            {{--
        @if (session()->has('success'))
            <div class='alert alert-success w-75 text-center'><h2>{{ session()->get('success') }}</h2></div>
        @endif --}}


            <form action='{{ url('/register') }}' method='post' enctype="multipart/form-data">
                @csrf
                <div class="d-flex align-items-center justify-content-between pt-4">
                    <div class="fName">
                        <label class="signup-label fs-5  mt-1">First Name</label>
                        <input class="input-group-text form-control signup-input  mt-1" type="name" name="userfname"
                            value="{{ old('userfname') }}" placeholder="Your Name" />
                        <p id="name-error"></p>
                        @error('userfname')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>


                    <div class="lName">
                        <label class="signup-label fs-5  mt-1">Last Name</label>
                        <input class="input-group-text form-control signup-input  mt-1" type="name" name="userlname"
                            value="{{ old('userlname') }}" placeholder="Your Name" />
                        <p id="name-error"></p>
                        @error('userlname')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>


                </div>

                <label class="signup-label  mt-1">Email</label>
                <input class="input-group-text form-control signup-input  mt-1" type="email" name="email"
                    value="{{ old('email') }}" placeholder="Your Email" />
                <p id="email-error"></p>

                @error('email')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror

                <label class="signup-label  mt-1">Password</label>
                <input class="input-group-text form-control signup-input  mt-1" type="password" name="password"
                    value="{{ old('password') }}" placeholder="Your Password" />
                <p id="pass-error"></p>

                @error('password')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror

                <label class="signup-label  mt-1">Repeat Password</label>
                <input class="input-group-text form-control signup-input  mt-1" type="password" name="password_confirmation"
                    value="{{ old('password_confirmation') }}" placeholder="Your Password" />
                <p id="pass-error"></p>

                @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror

                <label class="signup-label  mt-1">Live In</label>
                <select class="form-select" aria-label="Default select example" name="LiveIn" value="{{ old('LiveIn') }}">
                    <option selected value="1">Jerusalem</option>
                    <option value="2">Nablus</option>
                    <option value="3">Jenin</option>
                    <option value="4">Tulkarm</option>
                    <option value="5">Hebron</option>
                    <option value="6">Bethlehem</option>
                    <option value="7">Ramallah</option>
                    <option value="8">Jericho</option>
                    <option value="9">Qalqilya</option>
                    <option value="10">Salfit</option>
                    <option value="11">Tubas</option>
                </select>

                <label class="signup-label  mt-3">Your Type</label>
                <select class="form-select" aria-label="Default select example" name="is_admin" value="">
                    <option selected value="1">Admin</option>
                    <option selected value="0">User</option>
                </select>


                {{-- <div class="form-check form-check-inline">
                    Female <input type="radio" name="useremail" />
                </div>

                <div class="form-check form-check-inline">
                    Male <input type="radio" name="useremail" />
                </div> --}}

                <label class="signup-label ">Your Image</label>
                <input class="text form-control signup-input mt-1" type="file"id="avatar" name="image"
                    accept="image/png, image/jpeg" value="{{ old('image') }}" />

                <input class="btn btn-primary signup-btn  mt-5" type="submit" name="send" value="Sign up" />




            </form>
            <p>If you have created an account <a href="{{ url('login') }}" class="go-signup">Login?</a></p>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('user/css/signup.css') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endsection
