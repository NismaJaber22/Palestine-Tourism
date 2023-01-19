<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @auth
                <div class="d-flex">
                    <div class="image">

                        @if (Auth::user()->image != null)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" type="button" alt="user photo"
                                class="user__image" aria-haspopup="true" aria-expanded="false" />
                        @else
                            <img src="{{ asset('user/images/avatar.PNG') }}" type="button" alt="user photo"
                                class="user__image" aria-haspopup="true" aria-expanded="false" />
                        @endif
                    </div>
                    <div class="info">
                        <a href="{{ url('Myprofile') }}" class="d-block">
                            <h4 class="text-mainColor" role="button" aria-expanded="false">{{ Auth::user()->userfname }}
                                {{ Auth::user()->userlname }}</h4>
                        </a>
                    </div>

                </div>
            @endauth

        </div>
        {{-- search --}}



        {{-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."
            title="Type in a name"> --}}



        {{-- ------------------------------------------------------------------------------------- --}}
        {{-- <div class="form-inline px-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search..."
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-fw fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="sidebar-search-results">
                <div class="list-group"><a href="#" class="list-group-item">
                        <div class="search-title"><strong class="text-light"></strong>N<strong
                                class="text-light"></strong>o<strong class="text-light"></strong> <strong
                                class="text-light"></strong>e<strong class="text-light"></strong>l<strong
                                class="text-light"></strong>e<strong class="text-light"></strong>m<strong
                                class="text-light"></strong>e<strong class="text-light"></strong>n<strong
                                class="text-light"></strong>t<strong class="text-light"></strong> <strong
                                class="text-light"></strong>f<strong class="text-light"></strong>o<strong
                                class="text-light"></strong>u<strong class="text-light"></strong>n<strong
                                class="text-light"></strong>d<strong class="text-light"></strong>!<strong
                                class="text-light"></strong></div>
                        <div class="search-path"></div>
                    </a></div>
            </div>
        </div> --}}

        <div class="bg-black my-2">
            <p class="p-3 text-gray text-uppercase">modules</p>
        </div>
        <!-- Sidebar Menu -->
        <nav id="myUL" class="mt-2">
            <ul id="myUL" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ url('/admin/dashboards') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item" id="myUL">
                    <a href="#" class="nav-link">
                        <i class="fa fa-folder pr-2 pl-1"></i>
                        <p>Data
                            <i class="nav-icon fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview pl-2">
                        <li class="nav-item">
                        <li class="item">
                            <a href="{{ url('ReligiousDashboard') }}" class="nav-link text-white">
                                <i class="nav-icon far fa-circle "></i>
                                <p>Religious Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="item">
                            <a href="{{ url('CulturalDashboard') }}" class="nav-link text-white">
                                <i class="nav-icon far fa-circle "></i>
                                <p>Cultural Dashboard</p>
                            </a>
                        </li>
                        <li class="item">
                            <a href="{{ url('LeisureDashboard') }}" class="nav-link text-white">
                                <i class="nav-icon far fa-circle "></i>
                                <p>Leisure Dashboard</p>
                            </a>
                        </li>
                        <li class="item">
                            <a href="{{ url('MedicalDashboard') }}" class="nav-link text-white">
                                <i class="nav-icon far fa-circle "></i>
                                <p>Medical Dashboard</p>
                            </a>
                        </li>
                        <li class="item">
                            <a href="{{ url('BlogDashboard') }}" class="nav-link text-white">
                                <i class="nav-icon far fa-circle "></i>
                                <p>Blog Dashboard</p>
                            </a>
                        </li>
                </li>
            </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-edit pr-2 pl-1"></i>
                    <p>Forms
                        <i class="nav-icon fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview pl-2">
                    <li class="nav-item">
                    <li class="item">
                        <a href="{{ route('show.city') }}" class="nav-link text-white">
                            <i class="nav-icon far fa-circle "></i>
                            <p>add city</p>
                        </a>
                    </li>
            </li>
            </ul>
            </li>

            <li class="nav-item">
                <a href="{{ url('Myprofile') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Admin Profile</p>
                </a>
            </li>

            <li> <a href="{{ url('logout') }}" class="nav-link nav-item end-nav-items m-2 fs-6">
                    <i class="fa-solid fa-right-from-bracket pe-2"></i>Logout</a>
            </li>

            </ul>

            <script>
                function myFunction() {
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    ul = document.getElementById("myUL");
                    li = ul.getElementsByTagName("li");
                    for (i = 0; i < li.length; i++) {
                        a = li[i].getElementsByTagName("a")[0];
                        txtValue = a.textContent || a.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            li[i].style.display = "";
                        } else {
                            li[i].style.display = "none";
                        }
                    }
                }
            </script>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


{{--
@section('script')

@endsection --}}
