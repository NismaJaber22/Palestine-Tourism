<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div>
                <div class="image">
                    <img src="{{ asset('admin/assets/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image" />
                </div>
                <div class="info">
                    <a href="{{ url('admin/profile') }}" class="d-block">Alexander Pierce</a>
                </div>
            </div>


        </div>
        {{-- search --}}
        <div class="form-inline px-2">
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
        </div>

        <div class="bg-black my-2">
            <p class="p-3 text-gray text-uppercase">modules</p>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ url('/admin/index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-folder pr-2 pl-1"></i>
                        <p>Data
                            <i class="nav-icon fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview pl-2">
                        <li class="nav-item">
                          <li class="item">
                            <a href="{{ url('admin/user_data') }}" class="nav-link text-white">
                                <i class="nav-icon far fa-circle "></i>
                                <p>users Data</p>
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
                            <a href="{{ url('admin/add_category') }}" class="nav-link text-white">
                                <i class="nav-icon far fa-circle "></i>
                                <p>add category</p>
                            </a>
                          </li>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/profile') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Admin Profile</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
