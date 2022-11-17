@extends('user.layout.master')
@section('head')
    {{-- <link rel="stylesheet" href="{{ asset('user/css/Dashboard-pages-css/ReligiousDashboard.css') }}"> --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <section class="user_data">
        <div class="container ">
            <div class="header-div py-5">
                <h3 class="dash-header mt-5">My Profile</h3>
            </div>
            <div class="row py-5">
                {{-- user data  --}}
                <div class="col-5" id="vayvo-progression-author-sidebar">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('storage/' . Auth::user()->image) }}" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ Auth::user()->created_at }}</h5>
                            <p class="card-text"> ..................... </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ Auth::user()->liveIn }}</li>
                            <li class="list-group-item">{{ Auth::user()->userfname }} {{ Auth::user()->userlname }}</li>
                            <li class="list-group-item"></li>
                        </ul>
                        <div class="card-body">
                            <a type="button" class="btn btn-primary"
                            data-bs-toggle="modal"data-bs-target="#exampleModal">Edit</a>

                        </div>
                    </div>
                    <div id="content-sidebar-info">
                        <div id="avatar-sidebar-large-profile"></div>
                        <div id="profile-sidebar-gradient"></div>

                        <!-- Modal -->
                        {{-- Button trigger modal --}}

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title m-auto" id="exampleModalLabel">Add New
                                            Religiousplace
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/updatemyprofile'.Auth::user()->id)}}" method='post'
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-flex align-items-center justify-content-between pt-4">
                                                <div class="fName">
                                                    <label class="signup-label fs-5  mt-1">First
                                                        Name</label>
                                                    <input class="input-group-text form-control signup-input  mt-1"
                                                        type="name" name="userfname" value="{{ old('userfname') }}"
                                                        placeholder="Your Name" />
                                                    <p id="name-error"></p>
                                                    @error('userfname')
                                                        <div class="alert alert-danger">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="lName">
                                                    <label class="signup-label fs-5  mt-1">Last Name</label>
                                                    <input class="input-group-text form-control signup-input  mt-1"
                                                        type="name" name="userlname" value="{{ old('userlname') }}"
                                                        placeholder="Your Name" />
                                                    <p id="name-error"></p>
                                                    @error('userlname')
                                                        <div class="alert alert-danger">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <label class="signup-label  mt-1">Email</label>
                                            <input class="input-group-text form-control signup-input  mt-1" type="email"
                                                name="email" value="{{ old('email') }}" placeholder="Your Email" />
                                            <p id="email-error"></p>

                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror

                                            <label class="signup-label  mt-1">Password</label>
                                            <input class="input-group-text form-control signup-input  mt-1" type="password"
                                                name="password" value="{{ old('password') }}"
                                                placeholder="Your Password" />
                                            <p id="pass-error"></p>

                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror

                                            <label class="signup-label  mt-1">Repeat Password</label>
                                            <input class="input-group-text form-control signup-input  mt-1" type="password"
                                                name="password_confirmation" value="{{ old('password_confirmation') }}"
                                                placeholder="Your Password" />
                                            <p id="pass-error"></p>

                                            @error('password_confirmation')
                                                <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror

                                            <label class="signup-label  mt-1">Live In</label>
                                            <select class="form-select" aria-label="Default select example" name="LiveIn"
                                                value="{{ old('LiveIn') }}">
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

                                            {{-- Female <input type="radio" name="useremail" /> --}}
                                            {{-- Male <input type="radio" name="useremail" /> --}}
                                            <label class="signup-label ">Your Image</label>
                                            <input class="text form-control signup-input mt-1"
                                                type="file"id="avatar" name="image"
                                                accept="image/png, image/jpeg" value="{{ old('image') }}" />

                                            <input class="btn btn-primary signup-btn  mt-5" type="submit" name="send"
                                                value="Update" />

                                        </form>
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>
                </div>

                {{-- user add bolgs --}}
                <div class="col-6 offset-1 py-5">
                    <h2>My blogs</h2>
                </div>
            </div>

    </section>
@endsection





@section('script')
    <script src="{{ asset('user/js/Dashboard-Pages-js/ReligiousDashboard.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endsection
