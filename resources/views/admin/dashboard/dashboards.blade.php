@extends('admin.layout.master')

@section('page_name')
    Dashboard
@endsection

@section('main_page')
    Home
@endsection

@section('sub_page')
    new page
@endsection

@section('head')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/Dashboard-pages-css/main_dashboards.css') }}">
@endsection
{{-- content --}}

@section('content')
    <div class="d-flex justify-content-center">
        <div class="Dashboards-div">
            <div class="row">
                <div class="ml-4 Dash-content col-5">
                    <img src="{{ asset('user/images/Dashboards-images/Religious.jpg') }}" class="Dash-image" />
                    <div class="Dash-name">
                        <h2 class="Dash-h2">Religious Dashboard</h2>
                        <h4><span class="Dash-h4">{{ $relcount }}</span> Items</h4>
                        <p>There are many tourist places in Palestine.
                            Watching is a sanctuary for worshipers of every religion,
                            so tourism is not limited to Islamic monuments only.</p>
                        <a href="{{ url('ReligiousDashboard') }}" class="btn btn-open">Open <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="Dash-content col-5 offset-1">
                    <img src="{{ asset('user/images/Dashboards-images/Cultural.jpg') }}" class="Dash-image" />
                    <div class="Dash-name">
                        <h2 class="Dash-h2">Cultural Dashboard</h2>
                        <h4><span class="Dash-h4">{{ $culcount }}</span>Items</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis tenetur nostrum quidem minus
                            ipsam
                            eius quo debitis cupiditate explicabo aspernatur, consequuntur necessitatibus. Neque eum illo
                            ullam
                            rem! Tempora, commodi aliquam? </p>
                        <a href="{{ url('CulturalDashboard') }}" class="btn btn-open">Open <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="ml-4 Dash-content col-5">
                    <img src="{{ asset('user/images/Dashboards-images/Leisure.jpg') }}" class="Dash-image" />
                    <div class="Dash-name">
                        <h2 class="Dash-h2">Leisure Dashboard</h2>
                        <h4><span class="Dash-h4">{{ $leicount }}</span>Items</h4>
                        <p>Every year, the list of the most attractive areas for tourists is renewed, by examining many
                            factors,
                            the most important of which is the location itself, the services and preparations provided by
                            the country
                            to visitors, in addition to the general atmosphere, climate, and the total cost of the trip.
                        </p>
                        <a href="{{ url('LeisureDashboard') }}" class="btn btn-open">Open <i
                                class="fa fa-arrow-right"></i></a>

                    </div>
                </div>

                <div class="Dash-content col-5 offset-1">
                    <img src="{{ asset('user/images/Dashboards-images/Medical.jpg') }}" class="Dash-image" />
                    <div class="Dash-name">
                        <h2 class="Dash-h2">Medical Dashboard</h2>
                        <h4><span class="Dash-h4">{{ $medcount }}</span>Items</h4>
                        <p>Tourism means physiotherapy, which contains natural elements that contain natural diseases that
                            contain natural
                            diseases that contain natural diseases that contain natural diseases that contain natural
                            diseases that contain
                            natural diseases that contain natural diseases that contain It contains physiotherapy and
                            mineral salts that help
                            get rid of natural diseases that contain natural diseases and nerve diseases. </p>
                        <a href="{{ url('MedicalDashboard') }}" class="btn btn-open">Open <i
                                class="fa fa-arrow-right"></i></a>

                    </div>
                </div>

                <div class="ml-4 Dash-content col-5 offset-1">
                    <img src="{{ asset('user/images/Dashboards-images/Blog.jpg') }}" class="Dash-image" />
                    <div class="Dash-name">
                        <h2 class="Dash-h2">Blog Dashboard</h2>
                        <h4><span class="Dash-h4">{{ $blogs->count() }}</span>Items</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis tenetur nostrum quidem minus
                            ipsam
                            eius quo debitis cupiditate explicabo aspernatur, consequuntur necessitatibus. Neque eum illo
                            ullam
                            rem! Tempora, commodi aliquam? </p>
                        <a href="{{ url('BlogDashboard') }}" class="btn btn-open">Open
                            <i class="fa fa-arrow-right"></i></a>

                    </div>
                </div>

                {{-- <div class="Dash-content col-5 offset-1">
                    <img src="{{ asset('user/images/Dashboards-images/Blog.jpg') }}" class="Dash-image" />
                    <div class="Dash-name">
                        <h2 class="Dash-h2">Blog Dashboard</h2>
                        <h4><span class="Dash-h4">{{ $user->count() }}</span>Items</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis tenetur nostrum quidem minus
                            ipsam
                            eius quo debitis cupiditate explicabo aspernatur, consequuntur necessitatibus. Neque eum illo
                            ullam
                            rem! Tempora, commodi aliquam? </p>
                        <a href="{{ route('user Dashboard') }}" class="btn btn-open">Open
                            <i class="fa fa-arrow-right"></i></a>

                    </div>
                </div> --}}

            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('user/js/Dashboard-Pages-js/dashboards.js') }}"></script>
@endsection
