@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/profile.css') }}">
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
@endsection

@section('content')
    <section class="user_data">
        <div class="container ">
            <div class="header-div py-5">
                <h1 class="dash-header mt-5 text-center">My Profile</h1>
            </div>
            <div class="row py-5">
                {{-- user data  --}}
                <div class="userInfo col-md-3" id="vayvo-progression-author-sidebar">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/' . Auth::user()->image) }}" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ Auth::user()->userfname }} {{ Auth::user()->userlname }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">{{ Auth::user()->email }}</li>
                            <li class="list-group-item fs-6">Last updated : {{ Auth::user()->created_at }}</li>
                            <li class="list-group-item">{{ Auth::user()->liveIn }}</li>
                        </ul>
                    </div>
                </div>

                <div class="edit-userInfo col-md-6 offset-md-1">
                    <div id="content-sidebar-info">
                        <div class="modal-body">
                            <form action="{{ url('/updatemyprofile', Auth::user()->id) }}" method='post'
                                enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fName d-flex">
                                        <label class="signup-label fs-6 mt-1 me-5">First Name</label>
                                        <input class="input-group-text form-control signup-input mt-1 w-75" type="name"
                                            name="userfname" value="{{ old('userfname', Auth::user()->userfname) }}"
                                            blogholder="Your Name" />
                                        <p id="name-error"></p>
                                        @error('userfname')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="lName">
                                        <label class="signup-label fs-6 mt-1 me-5">Last Name</label>
                                        <input class="input-group-text form-control signup-input mt-1 w-75" type="name"
                                            name="userlname" value="{{ old('userlname', Auth::user()->userlname) }}"
                                            blogholder="Your Name" />
                                        <p id="name-error"></p>
                                        @error('userlname')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="email py-2">
                                    <label class="col-2 signup-label mt-1 me-5">Email</label>
                                    <input class="col-6 input-group-text form-control signup-input  mt-1 w-75"
                                        type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                                        blogholder="Your Email" />
                                    <p id="email-error"></p>
                                </div>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @enderror

                                <div class="password py-2">
                                    <label class="col-2 signup-label mt-1 me-5">Password</label>
                                    <input class="col-6 input-group-text  form-control signup-input mt-1 w-75"
                                        type="password" name="password" blogholder="Your Password" />
                                    <p id="pass-error"></p>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @enderror

                                <div class="repet py-2">
                                    <label class="col-2 signup-label  mt-1 me-5">Repeat Password</label>
                                    <input class="col-6 input-group-text form-control signup-input mt-1 w-75"
                                        type="password" name="password_confirmation" blogholder="Your Password" />
                                    <p id="pass-error"></p>
                                </div>
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }} </div>
                                @enderror

                                <div class="d-flex align-items-center justify-content-between py-3">
                                    <div class="live d-flex align-items-center justify-content-between">
                                        <label class="signup-label mt-1 pe-3">Live In</label>
                                        <select class="form-select" aria-label="Default select example" name="LiveIn"
                                            value="{{ old('LiveIn') }}">
                                            <option value="1">Jerusalem</option>
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
                                    </div>
                                    {{-- Female <input type="radio" name="useremail" /> --}}
                                    {{-- Male <input type="radio" name="useremail" /> --}}
                                    <div class="img d-flex align-items-center justify-content-between">
                                        <label class="signup-label pe-3">Your Image</label>
                                        <input class="text form-control signup-input mt-1 w-75" type="file"id="avatar"
                                            name="image" accept="image/png, image/jpeg"
                                            value="{{ old('image', Auth::user()->image) }}" />
                                    </div>
                                </div>

                                <div class="update">
                                    <input class="btn btn-primary signup-btn  mt-5" type="submit" name="send"
                                        value="Update" />
                                </div>


                            </form>
                        </div>
                    </div>
                </div>


                {{-- </div>
                    </div>
                </div> --}}

                {{-- user add bolgs --}}


            </div>

    </section>
@endsection





@section('script')
    <script src="{{ asset('user/js/Dashboard-Pages-js/ReligiousDashboard.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = document.forms["myForm"]; // storing the form

            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal({
                        text: 'DELETE',
                        icon: "warning"
                    });
                }
            });
        });
    </script>
@endsection
