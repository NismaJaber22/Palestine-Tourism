@extends('user.layout.master')
@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/Dashboard-pages-css/ReligiousDashboard.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <div class="container conta">
        <div class="Dash-div container">
            <div class="header-div">
                <h3 class="dash-header">Blog Dashboard</h3>
            </div>
            <div class="card text-center">

                <div class="table-div">
                    <form method="get" action="{{ url('searchRel') }}" class="search-form">
                        <input type="search" name="search" class="form-control search-input"
                            placeholder="Enter item name" />
                        <input type="submit" class="btn search-submit" value="Search" name="sib" />
                    </form>


                    {{-- Add --}}
                    <div class="add-new-div">
                        <button type="button" data-bs-toggle="modal" class="btn btn-success me-1"
                            data-bs-target="#exampleModal">
                            <i class="fa-regular fa-square-plus"></i>
                        </button>
                    </div>

                    <!-- Modal Add-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title m-auto" id="exampleModalLabel">Add New Religious place</h5>
                                </div>
                                <div class="modal-body">


                                    <form method="post" action="{{ url('/admin/Blog') }}" class="Add-form"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label style="display:flex">
                                            <p style="width:25%; margin-top: revert;">Title</p>
                                            <div style="width:100%">
                                                <input name="title" placeholder="Blog Title" type="text"
                                                    id="swal-input1" class="form-control  swal2-input " style="width:80%" />
                                            </div>
                                        </label>

                                        <label style="display:flex">
                                            <p style="width:25%; margin-top: revert;">Text</p>
                                            <div style="width:100%">
                                                <input name="text" placeholder="Blog Text" type="text"
                                                    id="swal-input2" class="form-control swal2-input" style="width:80%" />
                                            </div>
                                        </label>

                                        <label style="display:flex">
                                            <p style="width:25%; margin-top: revert;">Image</p>
                                            <input name="image" placeholder="BLog Image" type="file" id="swal-input4"
                                                class="form-control swal2-input" style="width:80%" />
                                        </label>
                                        <input id="js-btn" type="submit" name="RelSub" value="Add Blog"
                                            class="btn btn-primary"
                                            style="width: 100px; margin-right: auto;  margin-left: auto; margin-top:40px;" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Text</th>
                            <th scope="col">Image</th>
                            <th scope="col">show</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>




                        {{ $i = 1 }}
                        @foreach ($blogs as $blog)
                            <tr>


                                <td scope="col">{{ $i++ }}</td>
                                <td scope="col">{{ $blog->title }}</td>

                                {{-- text --}}
                                <td style="margin:auto;"><button onclick="ShowText('{{ $blog->text }}')"
                                        class="btn btn-secondary btn-table"><i class="fa-solid fa-file-medical"></i>
                                    </button>
                                </td>

                                {{-- image --}}
                                <td style="margin:auto;">
                                    <button
                                        onclick="ShowImage('{{ asset('storage/' . $blog->image) }}','{{ $blog->title }}')"
                                        class="btn btn-secondary btn-table">
                                        <i class="fa-regular fa-image"></i>
                                    </button>
                                </td>

                                <td>
{{--
                                    <form action="{{ url('/editstatus') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">

                                        @csrf
                                        <div class="form-check">
                                            <input type="hidden" name="status" value="0" />
                                            <input checked data-toggle="toggle" data-on="Yes"
                                                @if (isset($blog->status) && $blog->status) checked="checked" @endif
                                                data-onstyle="primary" data-offstyle="info" type="checkbox" value="1"{{  ($cat->adopted == 1 ? ' checked' : '') }}
                                                name="status">
                                        </div>
                                    </form> --}}

                                    {{-- ----------------- --}}
                                    <div class="container mt-3">
                                    {{-- <a href="{{ url("/editstatus/$blog->id")}}"> aaaa</a> --}}
                                    <form action="{{ url("/editstatus/$blog->id")}}" method="POST">
                                            @csrf
                                            <div class="form-check">
                                                <button name="hidden" type="submit">submit</button>

                                                <input type="checkbox" class="form-check-input" id="status"
                                                    name="status" value="1" {{  ($blog->status === '1' ? ' checked' : '') }}
                                                         {{-- @if (isset($blog->status) && $blog->status) checked="checked" @endif --}}
>
                                                <label class="form-check-label" for="check1">Show</label>
                                             </div>

                                        </form>
                                    </div>
                                </td>
                                {{-- edit--------------------------------------- --}}
                                <td style="width:10%;">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info btn-table" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $blog->id }}">
                                        <i style="color:white ;" class="fa-solid fa-pen"></i>
                                    </button>


                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{ $blog->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" name="ed">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title m-auto" id="exampleModalLabel">Update</h5>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="post"
                                                        action="{{ url("/admin/updateBlog/$blog->id") }}"
                                                        class="update-form" enctype="multipart/form-data">
                                                        @csrf
                                                        <label style="display:flex">
                                                            <p style="width:25%; margin-top: revert;">Title</p>
                                                            <div style="width:100%">
                                                                <input name="title" placeholder="Blog Title"
                                                                    type="text" id="swal-input1"
                                                                    class="form-control  swal2-input "
                                                                    style="width:80%" />
                                                            </div>
                                                        </label>

                                                        <label style="display:flex">
                                                            <p style="width:25%; margin-top: revert;">Text</p>
                                                            <div style="width:100%">
                                                                <input name="text" placeholder="Blog Text"
                                                                    type="text" id="swal-input2"
                                                                    class="form-control swal2-input" style="width:80%" />
                                                            </div>
                                                        </label>

                                                        <label style="display:flex">
                                                            <p style="width:25%; margin-top: revert;">Image</p>
                                                            <input name="image" placeholder="BLog Image" type="file"
                                                                id="swal-input4" class="form-control swal2-input"
                                                                style="width:80%" />
                                                        </label>
                                                        <input id="js-btn" type="submit" name="RelSub"
                                                            value="Update Blog" class="btn btn-primary"
                                                            style="width: 100px; margin-right: auto;  margin-left: auto; margin-top:40px;" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                {{-- delete------------------------------------- --}}
                                <form name='myForm'method="post" action={{ url("admin/deleteblog/$blog->id") }}>
                                    @csrf
                                    @method('DELETE')
                                    <td style="width:10%;">
                                        <button class="btn btn-danger btn-table show-alert-delete-box" title='Delete'>
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </form>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            {{-- {{ $blogs->links() }} --}}

        </div>

    </div>
@endsection

@section('script')
    <script src="{{ asset('user/js/Dashboard-Pages-js/ReligiousDashboard.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = document.forms["myForm"]; // storing the form

            // var form =  $(this).closest("form");
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
