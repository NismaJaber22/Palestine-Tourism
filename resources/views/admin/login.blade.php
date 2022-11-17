@include('admin.layout.head')

<div class="d-flex justify-content-center align-items-center my-5 ">
    <div class="login-box py-5">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>Login</b></a>
            </div>
            <div class="card-body">
                {{-- <p class="login-box-msg">Login</p> --}}

                <form action="../../index3.html" method="post" class="py-4">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block w-75">login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->
                <div class="d-flex justify-content-between ">
                    <p class="mb-1">
                        <a href="{{ url('admin/reset') }}">forgot password ?</a>
                    </p>
                    <p class="mb-0">
                        <a href="{{url('admin/register')}}" class="text-center">Register Now</a>
                    </p>
                </div>


                <p class="fs-5 text-center pt-2">Or login with</p>
                <div class="social-auth-links text-center mt-1 mb-3 d-flex justify-content-start">
                    <a href="#" class="text-primary">
                        <i class="fab fa-facebook mx-2"></i>
                    </a>
                    <a href="#" class="text-danger">
                        <i class="fab fa-google-plus mx-2"></i>
                    </a>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@include('admin.layout.script')
