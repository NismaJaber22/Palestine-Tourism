@extends('admin.layout.master')

@section('page_name')
    Profile
@endsection

@section('main_page')
    Home
@endsection

@section('sub_page')
    Admin profile
@endsection


{{-- content --}}


@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

        <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                  <img style="width: 150px; height:150px; border-radius: 50%;" src="http://localhost/gradProject/film/admin/uploades/162001340_m.jpg " alt="Admin Image">
              </div>

              <h3 class="profile-username text-center"> hamsa </h3>

              <h3 class="profile-username text-center" style="font-size: 18px;"> h@gmail.com </h3>

              <h3 class="profile-username text-center" style="font-size: 18px;"> Suber Admin                <hr>
              <p class="text-muted text-center">2022-08-06 21:57:04</p>


            </h3></div>
        <!-- /.card-body -->
          </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-9">
          <div class="card">
        <!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">

             <h4> Edit your profile </h4>
             <p style="font-size: 13px;"> you should fill all file </p>
             <hr>
             <br>
                <form method="post" action="http://localhost/gradProject/film/admin/handlers/update_Admin.php" class="form-horizontal">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputName2" name="password" placeholder="password">
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">photo</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="inputExperience" name="photo" placeholder="my photo">
                      </div>
                  </div>

                  <div class="form-group row">
                     <div class="offset-sm-2 col-sm-10">
                          <input type="submit" class="btn btn-outline-info" name="edit" value="UPDATE DATA">

                          <input type="hidden" name="AId" value="18">

                    </div>
                  </div>
                </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div></div></section>

@endsection
