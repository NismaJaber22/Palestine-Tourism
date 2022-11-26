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
                <h1 class="dash-header mt-5 text-center">My Profile</h1>
            </div>
            <div class="row py-5">
                {{-- user data  --}}
                <div class="col-md-4" id="vayvo-progression-author-sidebar">
                    <div class="card ms-5" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('storage/' . Auth::user()->image) }}" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ Auth::user()->userfname }} {{ Auth::user()->userlname }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">{{ Auth::user()->email }}</li>
                            <li class="list-group-item fs-6">Last updated : {{ Auth::user()->created_at }}</li>
                            <li class="list-group-item">{{ Auth::user()->liveIn }}</li>
                        </ul>
                        <div class="card-body">
                            <a type="button" class="btn btn-primary"
                                data-bs-toggle="modal"data-bs-target="#exampleModal{{ Auth::user()->id }}">Edit</a>

                        </div>
                    </div>
                    <div id="content-sidebar-info">
                        <div id="avatar-sidebar-large-profile"></div>
                        <div id="profile-sidebar-gradient"></div>

                        <!-- Modal -->
                        {{-- Button trigger modal --}}

                        <div class="modal fade" id="exampleModal{{ Auth::user()->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title m-auto" id="exampleModalLabel">Update profile
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/updatemyprofile',Auth::user()->id)}}" method='post'
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-flex align-items-center justify-content-between pt-4">
                                                <div class="fName">
                                                    <label class="signup-label fs-5  mt-1">FirstName</label>
                                                    <input class="input-group-text form-control signup-input  mt-1"
                                                        type="name" name="userfname"
                                                        value="{{ old('userfname', Auth::user()->userfname) }}"
                                                        blogholder="Your Name" />
                                                    <p id="name-error"></p>
                                                    @error('userfname')
                                                        <div class="alert alert-danger">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="lName">
                                                    <label class="signup-label fs-5  mt-1">Last Name</label>
                                                    <input class="input-group-text form-control signup-input  mt-1"
                                                        type="name" name="userlname"
                                                        value="{{ old('userlname', Auth::user()->userlname) }}"
                                                        blogholder="Your Name" />
                                                    <p id="name-error"></p>
                                                    @error('userlname')
                                                        <div class="alert alert-danger">{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <label class="signup-label  mt-1">Email</label>
                                            <input class="input-group-text form-control signup-input  mt-1" type="email"
                                                name="email" value="{{ old('email', Auth::user()->email) }}"
                                                blogholder="Your Email" />
                                            <p id="email-error"></p>

                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror

                                            <label class="signup-label  mt-1">Password</label>
                                            <input class="input-group-text form-control signup-input  mt-1" type="password"
                                                name="password" blogholder="Your Password" />
                                            <p id="pass-error"></p>

                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror

                                            <label class="signup-label  mt-1">Repeat Password</label>
                                            <input class="input-group-text form-control signup-input  mt-1" type="password"
                                                name="password_confirmation" blogholder="Your Password" />
                                            <p id="pass-error"></p>

                                            @error('password_confirmation')
                                                <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror

                                            <label class="signup-label  mt-1">Live In</label>
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

                                            {{-- Female <input type="radio" name="useremail" /> --}}
                                            {{-- Male <input type="radio" name="useremail" /> --}}
                                            <label class="signup-label ">Your Image</label>
                                            <input class="text form-control signup-input mt-1" type="file"id="avatar"
                                                name="image" accept="image/png, image/jpeg"
                                                value="{{ old('image', Auth::user()->image) }}" />

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
                <div class="col-md-7 offset-1">
                    <h2 class="pb-3 text-center">My blogs</h2>
                    @foreach ($blogs as $blog)
                        @if (Auth::user()->id == $blog->user->id)
                            @if ($blog->status == '1')
                                <div class="Blog border d-flex p-3 m-3">
                                    <div class="blog_img col-md-3">
                                        <img src="{{ asset("storage/$blog->image") }} " class="profile-img w-100" />
                                    </div>

                                    <div class="container">
                                        <small class="post-time">{{ $blog->created_at }}</small>

                                        <h3 class="blog-title py-2">{{ $blog->title }}</h3>

                                        <div class="blog_info">
                                            <p class="text">{{ $blog->text }}</p>
                                        </div>
                                        {{--  --}}
                                        <!-- Default dropstart button -->


                                        {{-- modal for update blog in profile --}}
                                        {{-- ****************************** --}}
                                        {{-- <form method="post"
                                        action="{{ url("/updateBlog/$blog->id") }}"
                                        class="update-form" enctype="multipart/form-data">
                                        @csrf --}}
                                        <div class="btn-group dropstart">
                                            <button type="button" class="btn btn-secondary " data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">

                                                <li>
                                                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{$blog->id}}">
                                                        Edit
                                                    </button>
                                                </li>

                                                <form name='myForm' method="post" action={{ url("deleteblog/$blog->id") }}>
                                                    @csrf
                                                    @method('DELETE')
                                                    <td style="width:10%;">
                                                        <button class="btn btn-primary w-100 mt-1" title='Delete'>
                                                            Delete
                                                        </button>
                                                    </td>
                                                </form>
                                            </ul>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$blog->id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog pt-5">
                                                <div class="modal-content mt-5">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title m-auto" id="exampleModalLabel">Update blogs</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ url("updateBlog/$blog->id") }}"
                                                            class="Add-form" enctype="multipart/form-data">
                                                            @csrf

                                                            {{-- <input type="text" value="{{$blog->id}}" /> --}}

                                                            <label style="display:flex">
                                                                <p class="text-center"
                                                                    style="width:25%; margin-top: revert;">Title</p>
                                                                <div style="width:100%">


                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ Auth::user()->id }}">

                                                                    <input name="title" placeholder="Blog Title"
                                                                        type="text" id="swal-input1"
                                                                        class="form-control  swal2-input "
                                                                        style="width:80%" />
                                                                </div>
                                                            </label>
                                                            @error('title')
                                                                <div class="alert alert-danger">{{ $message }}
                                                                </div>
                                                            @enderror

                                                            <label style="display:flex">
                                                                <p class="text-center"
                                                                    style="width:25%; margin-top: revert;">Text</p>
                                                                <div style="width:100%">
                                                                    <input name="text" placeholder="Blog Text"
                                                                        type="text" id="swal-input2"
                                                                        class="form-control swal2-input"
                                                                        style="width:80%" />
                                                                </div>
                                                            </label>
                                                            @error('text')
                                                                <div class="alert alert-danger">{{ $message }}
                                                                </div>
                                                            @enderror

                                                            <label style="display:flex">
                                                                <p class="text-center"
                                                                    style="width:25%; margin-top: revert;">Image</p>
                                                                <input name="image" placeholder="BLog Image"
                                                                    type="file" id="swal-input4"
                                                                    class="form-control swal2-input" style="width:80%" />
                                                            </label>
                                                            @error('image')
                                                                <div class="alert alert-danger">{{ $message }}
                                                                </div>
                                                            @enderror



                                                            <div class="text-center">
                                                                <input id="js-btn" type="submit" name="RelSub"
                                                                    value="Update Blog" class="btn btn-primary mt-5" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- </form> --}}
                                        {{-- -********************** --}}


                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>

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

            var form =  $(this).closest("form");
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
