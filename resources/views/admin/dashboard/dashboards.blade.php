@extends('admin.layout.master')

@section('main_page')
    Home
@endsection

@section('sub_page')
    new page
@endsection

@section('head')
    <link rel="stylesheet" href="{{ asset('user/css/Dashboard-pages-css/dashboards.css') }}">
@endsection
{{-- content --}}


@section('content')
<div class="d-flex justify-content-center">
    <div class="Dashboards-div">

        <div class="row">
            <div class="Dash-content col-5">
                <img src="{{ asset('user/images/Dashboards-images/Religious.jpg') }}" class="Dash-image" />
                <div class="Dash-name">
                    <h2 class="Dash-h2">Religious Dashboard</h2>
                    <h4><span class="Dash-h4">{{$places->count()}}</span> Items</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis tenetur nostrum quidem minus ipsam
                        eius quo debitis cupiditate explicabo aspernatur, consequuntur necessitatibus. Neque eum illo ullam
                        rem! Tempora, commodi aliquam? </p>
                    <a href="{{ url('ReligiousDashboard') }}" class="btn btn-open">Open <i
                            class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="Dash-content col-5 offset-1">
                <img src="{{ asset('user/images/Dashboards-images/Cultural.jpg') }}" class="Dash-image" />
                <div class="Dash-name">
                    <h2 class="Dash-h2">Cultural Dashboard</h2>
                    <h4><span class="Dash-h4">32</span>Items</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis tenetur nostrum quidem minus ipsam
                        eius quo debitis cupiditate explicabo aspernatur, consequuntur necessitatibus. Neque eum illo ullam
                        rem! Tempora, commodi aliquam? </p>
                    <a href="{{ url('CulturalDashboard') }}" class="btn btn-open">Open <i
                            class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="Dash-content col-5">
                <img src="{{ asset('user/images/Dashboards-images/Leisure.jpg') }}" class="Dash-image" />
                <div class="Dash-name">
                    <h2 class="Dash-h2">Leisure Dashboard</h2>
                    <h4><span class="Dash-h4">15</span> Items</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis tenetur nostrum quidem minus ipsam
                        eius quo debitis cupiditate explicabo aspernatur, consequuntur necessitatibus. Neque eum illo ullam
                        rem! Tempora, commodi aliquam? </p>
                    <a href="{{ url('LeisureDashboard') }}" class="btn btn-open">Open <i
                            class="fa-solid fa-arrow-right"></i></a>

                </div>
            </div>

            <div class="Dash-content col-5 offset-1">
                <img src="{{ asset('user/images/Dashboards-images/Medical.jpg') }}" class="Dash-image" />
                <div class="Dash-name">
                    <h2 class="Dash-h2">Medical Dashboard</h2>
                    <h4><span class="Dash-h4">68</span>Items</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis tenetur nostrum quidem minus ipsam
                        eius quo debitis cupiditate explicabo aspernatur, consequuntur necessitatibus. Neque eum illo ullam
                        rem! Tempora, commodi aliquam? </p>
                    <a href="{{ url('MedicalDashboard') }}" class="btn btn-open">Open <i
                            class="fa-solid fa-arrow-right"></i></a>

                </div>
            </div>

            <div class="Dash-content col-5 offset-1">
                <img src="{{ asset('user/images/Dashboards-images/Blog.jpg') }}" class="Dash-image" />
                <div class="Dash-name">
                    <h2 class="Dash-h2">Blog Dashboard</h2>
                    <h4><span class="Dash-h4">qqqqqq</span>Items</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis tenetur nostrum quidem minus ipsam
                        eius quo debitis cupiditate explicabo aspernatur, consequuntur necessitatibus. Neque eum illo ullam
                        rem! Tempora, commodi aliquam? </p>
                    <a href="{{ url('BlogDashboard') }}" class="btn btn-open">Open
                        <i class="fa-solid fa-arrow-right"></i></a>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection


@section('script')
    <script src="{{ asset('user/js/Dashboard-Pages-js/dashboards.js') }}"></script>
@endsection
