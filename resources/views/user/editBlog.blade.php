@extends('user.layout.master')

@section('content')
    <div class="modal-dialog pt-5">
        <div class="modal-content mt-5">
            <div class="modal-header">
                <h5 class="modal-title m-auto">Update blogs</h5>
            </div>

            <div class="modal-body">
                <form method="post" action="" class="Add-form" enctype="multipart/form-data">
                    @csrf
                    <label style="display:flex">
                        <p class="text-center" style="width:25%; margin-top: revert;">Title</p>
                        <div style="width:100%">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

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
                        <input id="js-btn" type="submit" name="RelSub" value="Update Blog"
                            class="btn btn-primary mt-5" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
