    <!--Navebar for all pages ...-->
    <nav class="navbar navbar-expand-lg " style="background-color:white">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}"><img
                    src="{{ asset('user/images/home-images/airplane-57-48.ico') }}" style="width:50px" /> Palestine <span
                    style="color:#ff4838 ;">Tourism</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <h4 class="Minu">List</h4>
                <span class="navbar-toggler-icon"></span>

            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item Nav-items">
                        <a class="nav-link into-Nav" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item  Nav-items Pages">
                        <a class="nav-link into-Nav" href="#">
                            Pages <i class="fa-solid fa-plus plus-icon"></i>
                        </a>
                        <ul class="dropdown-menu menu">
                            <li class="list-item"><i class="fa-solid fa-circle"></i> <a
                                    class="dropdown-item dropdown-item1" href="{{ url('login') }}">Login Page</a></li>
                            <li class="list-item"><i class="fa-solid fa-circle"></i> <a
                                    class="dropdown-item dropdown-item1" href="{{ url('/') }}">Home Page</a></li>
                            <li class="list-item"><i class="fa-solid fa-circle"></i> <a
                                    class="dropdown-item dropdown-item1" href="{{ url('/ReligiousTours') }}">Tours
                                    Page</a></li>
                            <li class="list-item"><i class="fa-solid fa-circle"></i> <a
                                    class="dropdown-item dropdown-item1" href="{{ url('BlogsHome') }}">Blogs Page</a>
                            </li>
                            <li class="list-item"><i class="fa-solid fa-circle"></i> <a
                                    class="dropdown-item dropdown-item1" href="#">Contact Us Page</a></li>
                        </ul>
                    </li>
                    <li class="nav-item Nav-items">
                        <a class="nav-link into-Nav" href="{{ url('ReligiousTours') }}">Tours</a>
                    </li>
                    <li class="nav-item Nav-items">
                        <a class="nav-link into-Nav" href="{{ url('BlogsHome') }}">Blogs</a>
                    </li>
                    <li class="nav-item  Nav-items Contact">
                        <a class="nav-link into-Nav" href="#">
                            Contact us <i class="fa-solid fa-plus plus-icon"></i>
                        </a>

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
                    <li class="nav-item Nav-items">
                        <a href="{{ url('/admin/dashboards') }}" class="nav-link into-Nav">Dashboard</a>
                    </li>



                <li class="nav-item Nav-items">
                    <a href="{{ url('/BlogDashboard') }}" class="nav-link into-Nav"> Blog Dashboard
                    </a>
                </li>
</ul>
            </div>
            <div class="d-flex">
                @guest

                    <a href="{{ url('login') }}" class="nav-link me-2 nav-item end-nav-items"> <i
                            class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                @endguest

                @auth

                    <div class="dropdown d-flex">
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" type="button" alt="user photo"
                            class="user__image w-25" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" />

                        <h4 class="dropdown-toggle mx-4 text-mainColor" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->userfname }}
                            {{ Auth::user()->userlname }}</h4>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li> <a href="{{ url('Myreservations') }}"class="nav-link nav-item end-nav-items m-2 fs-6">
                                    <i class="fa-solid fa-list-check pe-2"></i>My reservations</a>
                            </li>
                            <li> <a href="{{ url('logout') }}" class="nav-link nav-item end-nav-items m-2 fs-6">
                                    <i class="fa-solid fa-right-from-bracket pe-2"></i>Logout</a>
                            </li>

                            <li> <a href="{{ url('Myprofile') }}" class="nav-link nav-item end-nav-items m-2 fs-6">
                                    <i class="fa fa-user" aria-hidden="true"></i> My Profile</a>
                            </li>
                        </ul>
                    </div>

                </div>
            @endauth




        </div>
        </div>
        </div>

    </nav>
    <!--End Navebar-->
