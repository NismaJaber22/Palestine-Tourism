<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/')}}" class="nav-link">Home</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
       </li> --}}

       <li class="nav-item  Nav-items Contact">
        {{-- <a class="nav-link into-Nav" href="{{url('#')}}">
            Contact us <i class="fa-solid fa-plus plus-icon"></i>
        </a> --}}

        <ul class="dropdown-menu menu1" style=" width: 52%; height:100vh ; border-radius: 0; border:0;">
            <li class="list-item"
                style="width:100% ; margin: auto; display:flex ; flex-direction: column;">
                <h1 style="color:#ff4838;"> Contact Us</h1>
                <form class="contact-form container" method="POST" style="width:100%;">
                    <label>Message Title</label>
                    <input type="text" name="titel" class="form-control mb-1" />
                    <label>Your Name</label>
                    <input type="text" name="Name" class="form-control mb-1" />
                    <label>Message</label>
                    <textarea style="height:30vh" name="msg" class="form-control mb-1"> </textarea>
                    <input type="submit" value="Send" class="btn  d-block book" name="send">
                </form>
            </li>
        </ul>
    </li>
      </ul>
{{-- ------------------------------- --}}
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> --}}

      <!-- Notifications Dropdown Menu -->
{{--
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> --}}

    </ul>
  </nav>
