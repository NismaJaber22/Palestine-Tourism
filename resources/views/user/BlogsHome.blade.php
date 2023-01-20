@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/Blogs.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.3/sweetalert2.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <div class=" Blogs container">


        {{-- modal for openion  --}}

        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1"
            data-bs-whatever="@mdo">Opinion </button>

        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form method="post" action="{{ url('review') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="pname" class="col-form-label">Name:</label>
                                <input type="opinion" class="form-control" name="pname" id="pname">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">opinion:</label>
                                <textarea class="form-control" name="opinion" id="message-text"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send message</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div> --}}
        {{-- ---------------------- --}}
        <h1>Explore Blogs</h1>

        <div class="Explore-blogs container">
            <div class="row">
                @foreach ($blogs as $blog)
                    @if ($blog->status == '1')
                        <div class="Blog mt-5 col-5 mx-5">
                            <div class="blogHeader d-flex justify-content-between">
                                <div class="d-flex w-50" style="align-items: center; justify-content: flex-start;">
                                    @if ($blog->user->image != null)
                                        <img src="{{ asset('storage/' . $blog->user->image) }}" class="profile-img" />
                                    @else
                                        <img src="{{ asset('user/images/avatar.PNG') }}" class="profile-img" />
                                    @endif
                                    <h5 class="user-name pt-3">{{ $blog->user->userfname }} {{ $blog->user->userlname }}
                                    </h5>
                                </div>
                                {{-- --------------------------------------------------------------------- --}}
                                @auth
                                    @if ($blog->user->id == Auth::user()->id)
                                        <div class="btn-group dropstart">
                                            <button type="button" class="btn btn-transperent " data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical fs-3"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                {{-- delete blog --}}
                                                <form name='myForm' method="post" action={{ url("deleteblog/$blog->id") }}>
                                                    @csrf
                                                    @method('DELETE')
                                                    <td style="width:10%;">
                                                        <button class="btn btn-primary w-100 mt-1" title='Delete'>
                                                            Delete
                                                        </button>
                                                    </td>
                                                </form>

                                                {{-- update blog --}}
                                                {{-- <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $blog->id }}">
                                                        Edit
                                                    </button> --}}
                                                <a href="#" class="btn btn-primary w-100">
                                                    Edit
                                                </a>
                                            </ul>
                                        </div>
                                    @endif
                                @endauth

                            </div>
                            {{-- ---------------------------------------------------------------------- --}}
                            <div class="container">
                                <p class="post-time">{{ Carbon\carbon::parse($blog->created_at)->format('d M Y') }}</p>
                                <h3 class="blog-title pb-2">{{ $blog->title }}</h3>
                                <div class="img_blog">
                                    <img class="Post-image" src={{ asset("storage/$blog->image") }} />
                                </div>
                                <div class="blog_info">
                                    <textarea class="text" disabled>{{ $blog->text }}</textarea>
                                </div>
                                <div class="Like">

                                    {{-- <div>
                                        <span class="">You think it is helpfull?</span>
                                        @if ($rating === 1)
                                          <a href="{{url('/likes/'.$articles->id)}}" class="btn btn-success btn-sm"><i class="fa fa-thumbs-up"></i></a>
                                        @endif
                                        @if ($rating === -1)
                                          <a href="{{url('/dislikes/'.$articles->id)}}" class="btn btn-danger  btn-sm"><i class="fa fa-thumbs-down"></i></a>
                                        @endif
                                      </div> --}}

                                    {{-- <form action="{{ url('like') }}" method="POST">

                                        @csrf
                                        <div class="d-flex LikeBlog" style="align-items: center;">
                                            <p class="num likes my-0">{{ $blog->likes->count() }}</p>
                                                <button type="submit">
                                                    <i class="fa-regular fa-heart foot-icons" onclick="heart(this, 'likes')"
                                                       name="like"></i>
                                                </button>
                                        </div>
                                    </form> --}}

                                    {{-- like --}}
                                    <form action="{{ url('like') }}" method="POST">
                                        @csrf
                                        <div class="form-check d-flex">
                                            <p class="num likes my-0">{{ $blog->likes->where('like', 1)->count() }}</p>
                                            {{-- <p class="num likes my-0">{{ $blog->likes->count() }}</p> --}}
                                            {{-- <input type="checkbox" class="form-check-input" id="like{{ $blog->id }}"
                                                name="like" value="1" {{ $blog->like === '1' ? ' checked' : '' }}> --}}

                                            @auth
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                            @endauth


                                            <i class="fa-regular fa-heart foot-icons" onclick="heart(this, 'likes')"></i>
                                            <button class="like" type="submit"></button>
                                        </div>
                                    </form>


                                    <div class="comments d-flex" style="align-items: center;">
                                        <p class="numComment my-0">{{ $blog->comments->count() }}</p>
                                        <i data-blogid={{$blog->id}} class="toggleComments fa-regular fa-comment foot-icons comm_icon"></i>
                                    </div>
                                    <div class="d-flex" style="align-items: center;">
                                        <p class="num my-0">12</p>
                                        <i class="fa-solid fa-share foot-icons"></i>
                                    </div>
                                </div>

                                {{-- comments --}}
                                <div id="blogcomments{{$blog->id}}" data-id="{{$blog->id}}">
                                @foreach ($blog->comments as $comment)
                                    <div class="comment">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    @if ($comment->user->image != null)
                                                        <img src="{{ asset('storage/' . $comment->user->image) }}"
                                                            alt="profile img" class="profile-img1" />
                                                    @else
                                                        <img src="{{ asset('user/images/avatar.PNG') }}" alt="profile img"
                                                            class="profile-img1" />
                                                    @endif
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="user-name1 px-3">
                                                        {{ $comment->user->userfname }}{{ $comment->user->userlname }}
                                                    </h6>
                                                </div>
                                            </div>

                                            <p class="post-time px-4 m-0">
                                                {{ Carbon\carbon::parse($comment->created_at)->format('d M Y') }}</p>
                                        </div>
                                        <p class="comment-text">{{ $comment->comment }}</p>

                                        @auth
                                            @if ($blog->user->id == Auth::user()->id)
                                                <form class="text-end" method="post"
                                                    action={{ url("deleteComment/$comment->id") }}>
                                                    @csrf
                                                    @method('DELETE')
                                                    <td style="width:10%;">
                                                        <button class="btn btn-gray text-danger fs-5">delete</button>
                                                    </td>
                                                </form>
                                            @endif
                                        @endauth
                                    </div>
                                @endforeach
                                </div>
                                <!-- end comments -->
                                @auth
                                    <form class="d-flex mb-3" method="POST" action="{{ url('addComment') }}">
                                        @csrf
                                        <input type="text" name="comment" blogholder="Add Comment"
                                            class="form-control mx-2" />
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        <input type="submit" name="sub" class="btn btn-success" value="Comment"
                                            style="background-color: var(--main-color) !important; border: 0;" />
                                    </form>
                                @endauth
                                {{-- add comments --}}

                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    {{-- add blogs --}}
    <div class="My-Blogs" id="My-Blogs">
        <div class="inner-MyBlog">
            <h1 class="Add-new">Add New Blog ?
                @auth
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" class="btn btn-success me-1"
                        data-bs-target="#exampleModalblog" style="background-color: var(--main-color) !important; border: 0;">
                        <i class="fa-solid fa-blog"></i>
                    </button>
                @endauth
                @guest
                    <button type="button" class="btn btn-warning" class="btn btn-success me-1"
                        style="background-color: var(--main-color) !important; border: 0;" tabindex="0"
                        data-bs-toggle="tooltip" title="please login to add Blog">
                        <i class="fa-solid fa-blog"></i>
                    </button>
                @endguest

            </h1>
            <h3 class="Add-new">My Blogs</h3>
            {{-- my blogs --}}
            @auth
                @foreach ($blogs as $blog)
                    @if (Auth::user()->id == $blog->user->id)
                        @if ($blog->status == '1')
                            <div class="Blog mt-5 mx-4">
                                <div class="blogHeader d-flex justify-content-between">
                                    <div class="d-flex w-50" style="align-items: center; justify-content: flex-start;">
                                        @if ($blog->user->image != null)
                                            <img src="{{ asset('storage/' . $blog->user->image) }}" class="profile-img" />
                                        @else
                                            <img src="{{ asset('user/images/avatar.PNG') }}" class="profile-img" />
                                        @endif
                                        <h5 class="user-name pt-3">{{ $blog->user->userfname }} {{ $blog->user->userlname }}
                                        </h5>
                                    </div>
                                    {{-- --------------------------------------------------------------------- --}}
                                    @if ($blog->user->id == Auth::user()->id)
                                        <div class="btn-group dropstart">
                                            <button type="button" class="btn btn-transperent " data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical fs-3"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <button type="button" class="btn btn-primary w-100"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $blog->id }}">
                                                        Edit
                                                    </button>
                                                </li>
                                                <div class="modal fade" id="exampleModal{{ $blog->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog pt-5">
                                                        <div class="modal-content mt-5">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title m-auto" id="exampleModalLabel">Update
                                                                    blogs</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post"
                                                                    action="{{ url("updateBlog/$blog->id") }}"
                                                                    class="Add-form" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <label style="display:flex">
                                                                        <p class="text-center"
                                                                            style="width:25%; margin-top: revert;">Title</p>
                                                                        <div style="width:100%">
                                                                            <input type="hidden" name="user_id"
                                                                                value="{{ Auth::user()->id }}" />

                                                                            <input name="title" blogholder="Blog Title"
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
                                                                            <input name="text" blogholder="Blog Text"
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
                                                                        <input name="image" blogholder="BLog Image"
                                                                            type="file" id="swal-input4"
                                                                            class="form-control swal2-input"
                                                                            style="width:80%" />
                                                                    </label>
                                                                    @error('image')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror

                                                                    <div class="text-center">
                                                                        <input id="js-btn" type="submit" name="RelSub"
                                                                            value="Update Blog"
                                                                            class="btn btn-primary mt-5" />
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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
                                    @endif
                                </div>
                                {{-- ---------------------------------------------------------------------- --}}
                                <div class="container">
                                    <p class="post-time">{{ Carbon\carbon::parse($blog->created_at)->format('d M Y') }}</p>
                                    <h3 class="blog-title pb-2">{{ $blog->title }}</h3>
                                    <div class="img_blog">
                                        <img class="Post-image" src={{ asset("storage/$blog->image") }} />
                                    </div>
                                    <div class="blog_info">
                                        <textarea class="text" disabled>{{ $blog->text }}</textarea>
                                    </div>
                                    <div class="Like">
                                        <div class="d-flex" style="align-items: center;">
                                            <p class="num likes">324</p>
                                            <i class="fa-regular fa-heart foot-icons" onclick="heart(this, 'likes')"></i>
                                        </div>
                                        <div class="d-flex" style="align-items: center;">
                                            <p class="numComment">{{ $blog->comments->count() }}</p>
                                            <i id="comment" class="fa-regular fa-comment foot-icons comm_icon"
                                                onclick="opens()"></i>
                                        </div>
                                        <div class="d-flex" style="align-items: center;">
                                            <p class="num">12</p>
                                            <i class="fa-solid fa-share foot-icons"></i>
                                        </div>
                                    </div>

                                    {{-- comments --}}
                                    @foreach ($blog->comments as $comment)
                                        <div class="comment">
                                            <div class="d-flex">
                                                <img src="{{ asset('storage/' . $comment->user->image) }}"
                                                    class="profile-img1" />

                                                <h6 class="user-name1">
                                                    {{ $comment->user->userfname }}{{ $comment->user->userlname }}</h6>
                                                <p class="post-time px-4">
                                                    {{ Carbon\carbon::parse($comment->created_at)->format('d M Y') }}</p>
                                            </div>
                                            <p class="comment-text">{{ $comment->comment }}</p>

                                            <form method="post" action={{ url("deleteComment/$comment->id") }}>
                                                @csrf
                                                @method('DELETE')
                                                <td style="width:10%;">
                                                    <button class="btn btn-danger">delete</button>
                                                </td>
                                            </form>
                                        </div>
                                    @endforeach

                                    {{-- add comments --}}
                                    <form class="d-flex mb-3" method="POST" action="{{ url('addComment') }}">
                                        @csrf
                                        <input type="text" name="comment" blogholder="Add Comment"
                                            class="form-control" />
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        <input type="submit" name="sub" class="btn btn-success" value="Comment"
                                            style="background-color: var(--main-color) !important; border: 0;" />
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endauth

        </div>
    </div>

    <!-- Modal Add Blog-->
    <div class="modal fade" id="exampleModalblog" tabindex="-1" aria-labelledby="exampleModalLabelblog"
        aria-hidden="true">
        <div class="modal-dialog pt-5">
            <div class="modal-content mt-5">
                <div class="modal-header">
                    <h5 class="modal-title m-auto" id="exampleModalLabelblog">Add New Blog</h5>
                </div>
                @auth
                    <div class="modal-body">
                        <form method="post" action="{{ url('/storeBlog') }}" class="Add-form"
                            enctype="multipart/form-data">
                            @csrf
                            <label style="display:flex">
                                <p class="text-center" style="width:25%; margin-top: revert;">Title</p>
                                <div style="width:100%">

                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <input name="title" blogholder="Blog Title" type="text" id="swal-input1"
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
                                    <input name="text" blogholder="Blog Text" type="text" id="swal-input2"
                                        class="form-control swal2-input" style="width:80%" />
                                </div>
                            </label>
                            @error('text')
                                <div class="alert alert-danger">{{ $message }}
                                </div>
                            @enderror

                            <label style="display:flex">
                                <p class="text-center" style="width:25%; margin-top: revert;">Image</p>
                                <input name="image" blogholder="BLog Image" type="file" id="swal-input4"
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
                @endauth

            </div>
        </div>
    </div>

    <section class="addReviews my-5 d-flex justify-content-center">
        <div class="addRev col-md-7">
            <h2 class="text-capitalize text-center text-secondary">write a review</h2>
            <div class="container">
                <form method="post" action="{{ url('review') }}">
                    @csrf
                    @auth
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endauth
                    <textarea class="form-control" name="opinion" id="message-text" placeholder="Reviews"></textarea>
                    @auth
                        <div class="footer d-flex">
                            <button value="" type="submit" class="btn bg-mainColor">post</button>
                        </div>
                    @endauth

                    @guest
                        <div class="footer d-flex">
                            <p class="btn bg-mainColor">post</p>
                        </div>
                    @endguest
                </form>
            </div>
        </div>
    </section>

    {{-- -------------------------------------------------------------- --}}
    <button onclick="slideMyBlog(this)" class="My-btn btn btn-primary"><i class="fa-solid fa-angles-right"></i></button>
@endsection

@section('script')
    <script src="{{ asset('user/js/Blogs.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{--  keep modal open if there are errors --}}
    @if ($errors->any())
        <script type="text/javascript">
            $(document).ready(function() {
                $('#exampleModalblog').modal('show');
            });
        </script>
    @endif
@endsection
