@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/Blogs.css') }}">
    {{-- <link rel="stylesheet" href="{{'node_modules/jquery/dist/jquery.js'}}"> --}}


    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.3/sweetalert2.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <div class=" Blogs container">
        <h1>Explore Blogs</h1>
        <div class="Explore-blogs container">

            <div class="row">
                @foreach ($blogs as $blog)
                    @if ($blog->status == '1')
                        <div class="Blog mt-5 col-5 mx-5">
                            <div class="d-flex" style="align-items: center; justify-content: flex-start;">
                                <img src="{{ asset("storage/".$blog->user->image)}}" class="profile-img" />
                                <h5 class="user-name pt-3">{{ $blog->user->userfname }} {{ $blog->user->userlname }}</h5>
                            </div>
                            <div class="container">
                                {{-- <p class="post-time">{{ $blog->created_at }}</p> --}}
                                <p class="post-time">{{Carbon\carbon::parse($blog->created_at)->format('d M Y') }}</p>

                                <h3 class="blog-title pb-2">{{ $blog->title }}</h3>

                                <div class="img_blog">
                                    <img class="Post-image" src={{ asset("storage/$blog->image") }} />
                                </div>
                                <div class="blog_info">
                                    <textarea class="text">{{ $blog->text }}</textarea>
                                </div>

                                <div class="Like">
                                    <div class="d-flex" style="align-items: center;">
                                        <p class="num likes">324</p>
                                        <i class="fa-regular fa-heart foot-icons" onclick="heart(this, 'likes')"></i>
                                    </div>
{{-- @foreach ( as ) --}}


                                    <div class="d-flex" style="align-items: center;">

                                        <p class="numComment">{{$comments->count()}}</p>

                                        <i id="comment" class="fa-regular fa-comment foot-icons comm_icon" onclick="opens()"></i>
                                    </div>

                                    <div class="d-flex" style="align-items: center;">
                                        <p class="num">12</p>
                                        <i class="fa-solid fa-share foot-icons"></i>
                                    </div>
                                </div>
{{-- @endforeach --}}


                                @foreach ($comments as $comment)
                                    <div class="comment">
                                        <div class="d-flex">
                                            <img src="{{ asset("storage/".$comment->user->image) }}" class="profile-img1" />

                                            <h6 class="user-name1">{{ $comment->user->userfname }} {{$comment->user->userlname}}</h6>
                                            <p class="post-time px-4">{{Carbon\carbon::parse($comment->created_at)->format('d M Y') }}</p>
</div>
                                        <p class="comment-text">{{ $comment->comment }}</p>
                                    </div>
                                @endforeach

                                <form class="d-flex mb-3" method="POST" action="{{ url("addComment") }}">
                                    @csrf
                                    <input type="text" name="comment" placeholder="Add Comment" class="form-control" />
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                    <input type="submit" name="sub" class="btn btn-success" value="Comment"
                                        style="background-color: var(--main-color) !important; border: 0;" />
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
    </div>


    <div class="My-Blogs" id="My-Blogs">
        <div class="inner-MyBlog">
            <h1 class="Add-new">Add New Blog?
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" class="btn btn-success me-1"
                    data-bs-target="#exampleModalblog" style="background-color: var(--main-color) !important; border: 0;">
                    <i class="fa-solid fa-blog"></i>
                </button>
            </h1>
            <h3 class="Add-new">My Blogs</h3>
        </div>
    </div>

    <!-- Modal Add-->
    <div class="modal fade" id="exampleModalblog" tabindex="-1" aria-labelledby="exampleModalLabelblog" aria-hidden="true">
        <div class="modal-dialog pt-5">
            <div class="modal-content mt-5">
                <div class="modal-header">
                    <h5 class="modal-title m-auto" id="exampleModalLabelblog">Add New Religious place</h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('/storeBlog') }}" class="Add-form" enctype="multipart/form-data">
                        @csrf
                        <label style="display:flex">
                            <p class="text-center" style="width:25%; margin-top: revert;">Title</p>
                            <div style="width:100%">

                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                <input name="title" placeholder="Blog Title" type="text" id="swal-input1"
                                    class="form-control  swal2-input " style="width:80%" />
                            </div>
                        </label>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}
                            </div>
                        @enderror

                        <label style="display:flex">
                            <p class="text-center" style="width:25%; margin-top: revert;">Text</p>
                            <div style="width:100%">
                                <input name="text" placeholder="Blog Text" type="text" id="swal-input2"
                                    class="form-control swal2-input" style="width:80%" />
                            </div>
                        </label>
                        @error('text')
                            <div class="alert alert-danger">{{ $message }}
                            </div>
                        @enderror

                        <label style="display:flex">
                            <p class="text-center" style="width:25%; margin-top: revert;">Image</p>
                            <input name="image" placeholder="BLog Image" type="file" id="swal-input4"
                                class="form-control swal2-input" style="width:80%" />
                        </label>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}
                            </div>
                        @enderror


                        <div class="text-center">
                            <input id="js-btn" type="submit" name="RelSub" value="Add Blog"
                                class="btn btn-primary mt-5" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- -------------------------------------------------------------- --}}
    <button onclick="slideMyBlog(this)" class="My-btn btn btn-primary"><i class="fa-solid fa-angles-right"></i></button>

    @endsection

@section('script')
    <script src="{{ asset('user/js/Blogs.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- <script src{{asset('user/js/jquery-3.6.0.min.js')}}></script> --}}

    {{-- @if ($errors->has('title') || $errors->has('text') || $errors->has('image'))
        <script>
            $(function() {
                $('#My-Blogs #modal').modal({
                    show: true
                });
            });
        </script>

    @endif --}}

    {{-- <script>
        $(document).ready(function(){
          $("#comment").click(function(){
            $(".comment").toggle();
          });
        });
        </script> --}}
@endsection
